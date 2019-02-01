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

	//select prizes
	$('.select2-prizes').select2({
		maximumSelectionLength: 12
	});

	//add prizes btn func
	var produk = [];
	var percentage = [];
	$('body').on('click','.add-hadiah', function(){
		var cont = $('.daftar-hadiah-kontainer');
		var action = $(this).data('ajx-action');

		console.log(produk);

		$.ajax({
			url : action,
			data : {kode:produk, percentage:percentage},
			method : 'GET'
		}).done(function(data){
			cont.append(data);
		});
	});

	$('body').on('change keyup', '.prize-kode, .prize-percent', function(){
		produk = [];
		percentage = [];

		var item = $('.prize-kode');
		var percent = $('.prize-percent');

		item.each(function(){
			produk.push($(this).children("option:selected").val());
		});

		percent.each(function(){
			percentage.push($(this).val());
		});

		console.log(produk+' '+percentage);
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
        });
    });
	
});