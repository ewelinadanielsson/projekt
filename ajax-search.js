window.onload=function(){
var form = document.getElementById('searchform');
form.onsubmit=function( e ){
	//e.stop();
	e.preventDefault();
	jQuery.ajax('http://localhost/minwp?s='+document.getElementById('pattern').value,{
		complete: function( res ) {

			var placeholder=document.getElementById('result');
			placeholder.innerHTML="";
			placeholder.innerHTML=res.responseText;
		}
	});
}
}