$(function(){
	$('#idselall').click(function(){
		if(this.checked){
			$('input[name=id]').attr('checked',true);
		}else{
			$('input[name=id]').attr('checked',false);
		}
	})
})

function jump_link(){
	var page = $('#d_page').val();
	var url = $('#d_page').attr('url');
	location.href = url+'/p/'+page+'html';
}

