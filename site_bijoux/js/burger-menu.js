const burgerMenu = document.getElementById("burger-menu");
const navList = document.querySelector(".nav-list");

burgerMenu.addEventListener("click", () => {
  navList.classList.toggle("show");
});
