/**  Navbar Section  **/

// Toggle menu on mobile devices 
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

// Set minimum date to today for date pickers
const today = new Date().toISOString().split('T')[0];
document.getElementById('pickup-date').setAttribute('min', today);
document.getElementById('dropoff-date').setAttribute('min', today);

// When pickup date changes, update minimum dropoff date
document.getElementById('pickup-date').addEventListener('change', function () {
  document.getElementById('dropoff-date').setAttribute('min', this.value);

  // If dropoff date is before new pickup date, update it
  if (document.getElementById('dropoff-date').value < this.value) {
    document.getElementById('dropoff-date').value = this.value;
  }
});


// clickable Search icon
const searchForm = document.querySelector('.search-form');
const searchIcon = document.querySelector('.search-icon');

searchIcon.addEventListener('click', () => {
  searchForm.submit();
});
