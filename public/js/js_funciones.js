function myFunction(){
	var x = document.getElementById("myDIV");

	if(x.style.display === "none"){
		x.style.display = "block";
	}else{
		x.style.display = "none";
	}
}
function readURL(input){
	if(input.files && input.files[0]){
		var reader = new FileReader();
		reader.onload = (event)=>{
			$('#imagenmuestra').attr('src',event.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$('#imagen').change(function(){
	readURL(this);
})