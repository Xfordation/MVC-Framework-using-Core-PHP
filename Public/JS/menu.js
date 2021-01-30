const menu = function () {
  this.toggleMenu = function () {
    //   Show the form on the click of the Button
    const menuButton = document.getElementById("menu-open");
    const closeButton = document.getElementById("menu-close");
    menuButton.addEventListener("click", (e) => {
      const formContainer = document.getElementById("formContainer");
      formContainer.style.display = "block";
      menuButton.style.display = "none";
      closeButton.style.display = "block";
    });
    closeButton.addEventListener("click", (e) => {
      const formContainer = document.getElementById("formContainer");
      formContainer.style.display = "none";
      menuButton.style.display = "block";
      closeButton.style.display = "none";
    });
  };
};
// OBJECT for Menu
const menuObject = new menu();
menuObject.toggleMenu();
