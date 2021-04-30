document.getElementById("t4").addEventListener("keyup", (e) => {
  const confirmPassword = e.target;
  const orignalPassword = document.getElementById("t3");
  if (confirmPassword.value.localeCompare(orignalPassword.value) === 0) {
    confirmPassword.className = "form-control is-valid";
    orignalPassword.className = "form-control is-valid";
  } else {
    confirmPassword.className = "form-control is-invalid";
    orignalPassword.className = "form-control is-invalid";
  }
});
