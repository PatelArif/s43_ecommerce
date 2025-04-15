function showpw() {
    var input = $($(".toggle-password").attr("toggle"));

    if (input.attr("type") == "password") {
        $("#toggle-password").removeClass("fa-eye");
        $("#toggle-password").addClass("fa-eye-slash");
        input.attr("type", "text");
    } else {
        $("#toggle-password").removeClass("fa-eye-slash");
        $("#toggle-password").addClass("fa-eye");
        input.attr("type", "password");
    }
}

function showconfirmpw() {
    var input = $($(".toggle-con-password").attr("toggle"));

    if (input.attr("type") == "password") {
        $("#toggle-con-password").removeClass("fa-eye");
        $("#toggle-con-password").addClass("fa-eye-slash");
        input.attr("type", "text");
    } else {
        $("#toggle-con-password").addClass("fa-eye");
        input.attr("type", "password");
        $("#toggle-con-password").removeClass("fa-eye-slash");
    }
}
// close password show
const container = document.querySelector(".container");
const registerBtn = document.querySelector(".register-btn");
const loginBtn = document.querySelector(".login-btn");

registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});
