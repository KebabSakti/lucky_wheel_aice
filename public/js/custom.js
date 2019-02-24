$(function(){

	//winning percentage
	if($('.select2-prizes').length > 0){
		var elem = $('select[name="kode_produk[]"]');
		var percentage = $('.win-percentage');

		setPercentage(elem.val().length);

		$('body').on('change', 'select[name="kode_produk[]"]', function(){
			setPercentage(elem.val().length);
		});

		function setPercentage(val){
			winPercentage = val / 12 * 100;
			percentage.text(Math.floor(winPercentage));
		}
	}

	//add prizes btn func
	var produk = [];
	var percentage = [];
	$('body').on('click','.add-hadiah', function(){
		var btn = $(this);
		var cont = $('.daftar-hadiah-kontainer');
		var action = $(this).data('ajx-action');

		$.ajax({
			url : action,
			data : {kode:produk, percentage:percentage},
			method : 'GET',
			beforeSend : function(){
				btn.prop('disabled', true).text('Loading..');
			}
		}).done(function(data){
			cont.append(data);

			btn.prop('disabled', false).text('Tambah');
		});
	});

	//remove prizes btn
	$('body').on('click', '.prize-hapus', function(){
		var winPercentage = $('.win-percentage');

		$(this).parent().parent().remove();
	});

	//auto dismiss alert msg
	if($('.alert').length > 0){
		setTimeout(function() {
			$('.alert').alert('close');
		}, 5000);
	}

	//delete btn rule
	$('body').on('click', '.del-btn', function(){
		delBtn = $(this);

		if(confirm('Data akan dihapus, lanjutkan?')){
			return true;
		}else{
			return false;
		}
	});

	//ajax btn rule
	$('body').on('click', 'a.ajax-btn', function (e) {
		e.preventDefault();

		var modalMain = $('#modal_main');
		var modalTitle = $('.modal-title');
		var modalBody = $('.modal-body')

		elem = $(this);

		var action = elem.data('ajx-action');
		var title = elem.data('ajx-title');

		$.get(action, function (data) {

			modalTitle.html(title)
			modalBody.html(data)

			modalMain.modal('toggle');

			//dinamic func
			dynaFunction();
        });
    });

	//dt init
    if($('.dt').length > 0){
    	/* Custom filtering function which will search data in column four between two values */
    	var dtMin = moment().startOf('month').utc('GMT+8').format('DD/MM/YYYY');
        var dtMax = moment().endOf('month').utc('GMT+8').format('DD/MM/YYYY');
        var x = parseInt($('.dt').data('rg'));

		$.fn.dataTable.ext.search.push(
		    function( settings, data, dataIndex ) {
		        var dte = data[x]; // use data for the age column
		 
		        if (dtMax >= dte && dtMin <= dte)
		        {
		            return true;
		        }

		        return false;
		    }
		);

    	var table = $('.dt').DataTable({
	    	dom: 'Bfrtip',
	    	buttons: [
	        	'copy', 'excel', 'pdf','print'
	    	],
	    	"footerCallback": function( tfoot, data, start, end, display ) {
			    var api = this.api();
			    $( api.column( 5 ).footer() ).html(
			        api.column( 5 ).data().reduce( function ( a, b ) {
			            return parseInt(a) + parseInt(b);
			        }, 0 )
			    );
			  }
	    });
    }

    if($('.dr').length > 0){
    	$('.dr').daterangepicker({
    		startDate : moment().startOf('month').utc('GMT+8').format('DD/MM/YYYY'),
    		endDate : moment().endOf('month').utc('GMT+8').format('DD/MM/YYYY')
    	}).on('apply.daterangepicker', function(ev, picker) {

		  dtMin = picker.startDate.format('DD/MM/YYYY');
		  dtMax = picker.endDate.format('DD/MM/YYYY');

		  table.draw();
		});
    }

    function dynaFunction(){
    	//select prizes
		if($('.select2-prizes').length > 0){
			var selectPrizes = $('.select2-prizes');

			//init
			selectPrizes.select2({
				maximumSelectionLength: 11,
				allowClear : true,
				placeholder : 'Set Hadiah'
			});

			//get data on selected
			selectPrizes.on('select2:select select2:unselect', function(e){
				var cont = $('.daftar-hadiah-kontainer');
				var action = cont.data('ajx-action');

				kode_produk = e.params.data.id;
				nama_produk = e.params.data.text;

				if(e.type == "select2:select"){
					$.ajax({
						url : action,
						data : {kode:kode_produk, nama:nama_produk},
						method : 'GET'
					}).done(function(ret){
						cont.append(ret);
					});
				}else{
					elm = $('#'+kode_produk);
					elm.remove();
				}
			});
		}
    }
	
});