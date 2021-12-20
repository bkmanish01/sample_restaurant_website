/* Contact form validation */
var form = document.getElementById("contact");

form.addEventListener('submit', function(e){
	e.preventDefault();

	var user_name = document.getElementById("username").value;
	var user_phone = document.getElementById("userphone").value;
	var user_email = document.getElementById("useremail").value;
	var user_message = document.getElementById("usermessage").value;
	var emailpattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

	if(user_name === "") {
		var error_message = document.getElementById("errName");
		error_message.innerText = " Please enter your name";
		return false;
	}
	if(user_phone ==="" && user_phone.length < 10){
		var error_message = document.getElementById("errPhone");
		error_message.innerText = " Please enter valid phone";
		return false;
	}
	if(isNaN(user_phone)){
		var error_message = document.getElementById("errPhone");
		error_message.innerText = " Please enter valid phone";
		return false;
	}
	if(user_email ===""){
		var error_message = document.getElementById("errEmail");
		error_message.innerText = " Please enter valid email";
		return false;
	}
	
	if(user_message ===""){
		var error_message = document.getElementById("errMessage");
		error_message.innerText = " Please enter message";
		return false;
	}
	else{
		alert("Submit succefully!!!");
		$('#contact')[0].reset();
		$('.m_error').hide();
		return true;
	}
});



	

	
