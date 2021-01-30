// Match Password
const register = function () {
  this.formRegister = function () {
    document
      .getElementById("confirm_password")
      .addEventListener("change", (e) => {
        const confirmPassword = e.target;
        const orignalPassword = document.getElementById("password");
        if (confirmPassword.value.localeCompare(orignalPassword.value) === 0) {
          confirmPassword.className = "form-control mb-2 is-valid";
          orignalPassword.className = "form-control mb-2 is-valid";
        } else {
          confirmPassword.className = "form-control mb-2 is-invalid";
          orignalPassword.className = "form-control mb-2 is-invalid";
        }
      });
  };
};
// OBJECT for Register
const registerObj = new register();
registerObj.formRegister();
