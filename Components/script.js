/**  Navbar Section  **/

/* Toggle menu on mobile devices */
const menuCheckbox = document.getElementById("check");
const navbar = document.querySelector(".navbar");
if (menuCheckbox) {
  menuCheckbox.addEventListener("change", () => {
    navbar.classList.toggle("active");
  });
}
// Close menu when clicking outside
window.addEventListener("click", (e) => {
  if (
    !navbar.contains(e.target) &&
    !document.getElementById("menu-icon").contains(e.target)
  ) {
    navbar.classList.remove("active");
    if (menuCheckbox.checked) {
      menuCheckbox.checked = false;
    }
  }
});
// Close menu when scrolling
window.addEventListener("scroll", () => {
  navbar.classList.remove("active");
  if (menuCheckbox.checked) {
    menuCheckbox.checked = false;
  }
});



/**  Home Section  **/
