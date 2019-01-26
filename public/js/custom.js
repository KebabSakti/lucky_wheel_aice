$(function(){
	
$('body').on('submit', '.form-add-prize', function(e){
	e.preventDefault();

	item = $('select[name="kode_produk[]"]');

	if(item.val().length > 2){
		alert('Maksimal 12 item yang boleh dipilih');
	}else{
		console.log($(this));
	}
});
	
});