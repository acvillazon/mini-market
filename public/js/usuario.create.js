function passEqual() {
	let pass = document.getElementById("inputPassword");
	let pass_ = document.getElementById("inputPassword_");
	let btn_submit = document.getElementById("btn_submit");

	if (pass_.value != pass.value) {
		pass_.classList.add("is-invalid");
		pass.classList.add("is-invalid");
		btn_submit.disabled = true;
	} else {
		pass_.classList.remove("is-invalid");
		pass.classList.remove("is-invalid");
		btn_submit.disabled = false;
	}
}
