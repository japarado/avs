var pwd = document.getElementById("password");
var eye = document.getElementById("eye");

eye.addEventListener("click",togglePass);

function togglePass() {
	eye.classList.toggle("active");

	(password.type == "password") ? password.type = "text" :
		password.type = "password";
}
