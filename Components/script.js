/** Page Loader  **/
document.addEventListener('DOMContentLoaded', function () {
  const loader = document.querySelector('.page-loader');

  // Hide loader after content is loaded
  window.addEventListener('load', function () {
    setTimeout(function () {
      loader.classList.add('fade-out');
    }, 800);
  });
});



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


// City Autocomplete
document.addEventListener('DOMContentLoaded', function () {
  const cityInput = document.getElementById('city');
  let cities = [];

  // Create autocomplete container
  const autocompleteContainer = document.createElement('div');
  autocompleteContainer.className = 'city-autocomplete';
  cityInput.parentNode.appendChild(autocompleteContainer);

  // Fetch cities from JSON file
  fetch('Components/cities.json')
    .then(response => response.json())
    .then(data => {
      cities = data.cities;
    })
    .catch(error => console.error('Error loading cities:', error));

  // Filter cities based on input
  cityInput.addEventListener('input', function () {
    const inputValue = this.value.toLowerCase();

    if (inputValue.length === 0) {
      autocompleteContainer.innerHTML = '';
      autocompleteContainer.classList.remove('show');
      return;
    }

    const matchedCities = cities.filter(city =>
      city.toLowerCase().startsWith(inputValue)
    );

    if (matchedCities.length > 0) {
      displayCities(matchedCities);
    } else {
      autocompleteContainer.innerHTML = '';
      autocompleteContainer.classList.remove('show');
    }
  });

  // Display matched cities
  function displayCities(matchedCities) {
    autocompleteContainer.innerHTML = '';

    matchedCities.forEach(city => {
      const cityElement = document.createElement('div');
      cityElement.className = 'city-item';
      cityElement.textContent = city;

      cityElement.addEventListener('click', function () {
        cityInput.value = city;
        autocompleteContainer.innerHTML = '';
        autocompleteContainer.classList.remove('show');
      });

      autocompleteContainer.appendChild(cityElement);
    });

    autocompleteContainer.classList.add('show');
  }

  // Hide autocomplete when clicking outside
  document.addEventListener('click', function (e) {
    if (e.target !== cityInput) {
      autocompleteContainer.classList.remove('show');
    }
  });
});



/**  Features Section  **/

// Auto Scrolling 
document.addEventListener('DOMContentLoaded', function () {
  const carousel = document.querySelector('.features-content');
  const cards = document.querySelectorAll('.features-content .card');

  if (!carousel || cards.length === 0) return;

  // Clone cards for infinite scrolling effect
  cards.forEach(card => {
    const clone = card.cloneNode(true);
    carousel.appendChild(clone);
  });

  let position = 0;
  const cardWidth = cards[0].offsetWidth + 30; // Card width + gap
  const totalOriginalCards = cards.length;
  let direction = -1; // -1 for left, 1 for right
  let speed = 0.7; // Initial speed

  function moveCarousel() {
    position += direction * speed;

    // Reset position when we've scrolled one card width
    if (Math.abs(position) >= totalOriginalCards * cardWidth) {
      position = 0;
    }
    carousel.style.transform = `translateX(${position}px)`;
  }

  // Start auto-sliding with easing
  let intervalId = setInterval(moveCarousel, 20);

  // Navigation button functionality
  document.querySelector('.prev-btn').addEventListener('click', () => {
    direction = 1; // Go right
    speed = 5;
    setTimeout(() => speed = 0.7, 500)
  });

  document.querySelector('.next-btn').addEventListener('click', () => {
    direction = -1; // Go left
    speed = 5;
    setTimeout(() => speed = 0.7, 500);
  });

  // Pause sliding on hover with smooth stop and start
  carousel.addEventListener('mouseenter', () => {
    clearInterval(intervalId);
  });

  // Resume sliding when mouse leaves
  carousel.addEventListener('mouseleave', () => {
    intervalId = setInterval(moveCarousel, 20);
  });

  // Adjust carousel on window resize
  window.addEventListener('resize', function () {
    position = 0;
    carousel.style.transform = `translateX(0)`;
  });

  // Add parallax effect to cards
  cards.forEach(card => {
    card.addEventListener('mousemove', e => {
      const { left, top, width, height } = card.getBoundingClientRect();
      const x = e.clientX - left;
      const y = e.clientY - top;

      const deltaX = (x - width / 2) / (width / 2);
      const deltaY = (y - height / 2) / (height / 2);

      card.style.transform = `
    translateY(-10px)
    perspective(600px)
    rotateX(${deltaY * 5}deg)
    rotateY(${-deltaX * 5}deg)
  `;
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = '';
    });
  });
});



/**  Vehicles Section  **/
document.addEventListener('DOMContentLoaded', function () {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const vehicleCards = document.querySelectorAll('.vehicle-card');
  const searchInput = document.getElementById('vehicle-search');

  // Filter by category (motorcycle/scooty)
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      // Remove active class from all buttons
      filterBtns.forEach(b => b.classList.remove('active'));
      // Add active class to clicked button
      this.classList.add('active');

      const filterValue = this.getAttribute('data-filter');

      vehicleCards.forEach(card => {
        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});
