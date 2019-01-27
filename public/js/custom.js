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