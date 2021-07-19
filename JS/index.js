var slideIndex=1;
var myTimer;

window.addEventListener("load", function(){
	showSlides(slideIndex);
	myTimer = setInterval(function(){
		changeImg(1)
	},4000);
});

function changeImg(value){
	clearInterval(myTimer);
	if(value<0)	showSlides(slideIndex -= 1);
	else showSlides(slideIndex += 1);

	if(value === -1) {
		myTimer = setInterval(() => {
			changeImg(value+2)
		},4000);
	}else{ 
		myTimer = setInterval(() => {
			changeImg(value+1)
		},4000);
	}
}

function showSlides(n){
	var i;
	var slides = document.getElementsByClassName("slide");
	console.log(slides.length);
	if(n>slides.length) slideIndex = 1;
	if(n<1) slideIndex = slides.length;
	for(i=0; i<slides.length; i++){
		slides[i].style.display = "none";
	}
	slides[slideIndex-1].style.display = "block";
}

function deleteAccount(){
	result = window.confirm("Deseas eliminar tu cuenta: ")
	if(result){
		window.location.href = 'deleteAccount.php?result='+result
	}else{
		window.alert("No se ha eliminado la cuenta :)")
	}
}