const checkBoxPassword = document.getElementById("password-show-hide");
const labelShowHidePassword = document.querySelector(".show-hide-password");
const formPassword = document.getElementById("password");

checkBoxPassword.addEventListener("click", () => {
    if (checkBoxPassword.checked == true) {
        formPassword.type = "text";
    } else {
        formPassword.type = "password";
    }
});
