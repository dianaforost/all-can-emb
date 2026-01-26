const menu = document.querySelector(".header__content__container");
const openButton = document.querySelector(".burger");
// const closeButton = document.querySelector(".header__menu__close-button");

// Burger menu
openButton.addEventListener("click", function () {
  menu.classList.toggle("open");
  changeMobileMenuPosition();
  document.documentElement.style.overflow = "hidden";
  menu.addEventListener("click", closeByBgdClick);
  // closeButton.addEventListener("click", hideMenu);
});

function changeMobileMenuPosition() {
  if (window.innerWidth > 724 && window.innerWidth < 769) {
    const left = (window.innerWidth - 688) / 2;
    menu.style.left = `-${left}px`;
  } else menu.style.left = "-1px";
}
function lookForRisizeChanges() {
  if (window.innerWidth > 1150) {
    hideMenu();
  }
}
window.addEventListener("resize", throttle(lookForRisizeChanges, 200));

function hideMenu() {
  menu.classList.remove("open");
  // closeButton.removeEventListener("click", hideMenu);
  menu.removeEventListener("click", closeByBgdClick);
  document.documentElement.style.overflow = "auto";
}
function closeByBgdClick(e) {
  if (e.target === menu) {
    hideMenu();
  }
}
function redirectToPage(url) {
  window.location.href = url;
}
