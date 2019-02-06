$(function(){

	//winning percentage
	/*
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

	//select prizes
	$('.select2-prizes').select2({
		maximumSelectionLength: 12
	});
	*/

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

		winPercentage.text(getPercentageValue());
	});

	$('body').on('keyup change', '.prize-percent', function(e){
		var element = $(this);
		var winPercentage = $('.win-percentage');
		var percentageValue = getPercentageValue();

		if(percentageValue > 100){
			alert('Persentase kemenangan tidak boleh melebihi 100%');
			winPercentage.text(100);
		}else{
			winPercentage.text(percentageValue);
		}
	});

	function getPercentageValue(){
		percentage = [];

		$('.prize-percent').each(function(){
			percentage.push(parseInt($(this).val()));
		});

		if(percentage.length > 0){
			percentageValue = percentage.reduce(function(t,n){return t+n});
		}else{
			percentageValue = 0;
		}

		return percentageValue;
	}

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
        });
    });

    var table = $('.dt').DataTable({
    	dom: 'Bfrtip',
    	buttons: [
        	'copy', 'excel', 'pdf','print'
    	]
    });
	
});