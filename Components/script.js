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



/**  Features Section  **/

// 
// Add this code to your script.js file

/**  Features Section Carousel  **/
// document.addEventListener('DOMContentLoaded', function() {
//   const carousel = document.querySelector('.features-content');
//   const cards = document.querySelectorAll('.features-content .card');
  
//   if (!carousel || cards.length === 0) return;
  
//   // Clone cards for infinite scrolling effect
//   cards.forEach(card => {
//     const clone = card.cloneNode(true);
//     carousel.appendChild(clone);
//   });
  
//   let position = 0;
//   const cardWidth = cards[0].offsetWidth + 30; // Card width + gap
//   const totalOriginalCards = cards.length;
  
//   function moveCarousel() {
//     position -= 1; // Move 1px at a time for smooth animation
    
//     // Reset position when we've scrolled one card width
//     if (Math.abs(position) >= totalOriginalCards * cardWidth) {
//       position = 0;
//     }
    
//     carousel.style.transform = `translateX(${position}px)`;
//   }
  
//   // Start auto-sliding
//   let intervalId = setInterval(moveCarousel, 30);
  
//   // Pause sliding on hover
//   carousel.addEventListener('mouseenter', () => {
//     clearInterval(intervalId);
//   });
  
//   // Resume sliding when mouse leaves
//   carousel.addEventListener('mouseleave', () => {
//     intervalId = setInterval(moveCarousel, 30);
//   });
  
//   // Adjust carousel on window resize
//   window.addEventListener('resize', function() {
//     position = 0;
//     carousel.style.transform = `translateX(0)`;
//   });
// });


/**  Features Section Carousel  **/
document.addEventListener('DOMContentLoaded', function() {
  const carousel = document.querySelector('.features-content');
  const cards = document.querySelectorAll('.features-content .card');
  
  if (!carousel || cards.length === 0) return;
  
  // Clone cards for infinite scrolling effect
  cards.forEach(card => {
    const clone = card.cloneNode(true);
    carousel.appendChild(clone);
  });
  
  // Add feature icons to cards
  const featureIcons = [
    '💰', '🌍', '🔒', '🚗', '✓', '💯'
  ];
  
  document.querySelectorAll('.features-content .card').forEach((card, index) => {
    const iconIndex = index % featureIcons.length;
    const titleElement = card.querySelector('.features-title');
    
    if (titleElement && !titleElement.querySelector('.feature-icon')) {
      const iconSpan = document.createElement('span');
      iconSpan.className = 'feature-icon';
      iconSpan.textContent = featureIcons[iconIndex] + ' ';
      titleElement.prepend(iconSpan);
    }
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
  
  // Add navigation buttons
  const featuresSection = document.querySelector('.features');
  const navContainer = document.createElement('div');
  navContainer.className = 'features-nav';
  navContainer.innerHTML = `
    <button class="nav-btn prev-btn">❮</button>
    <button class="nav-btn next-btn">❯</button>
  `;
  featuresSection.appendChild(navContainer);
  
  // Style navigation buttons
  const style = document.createElement('style');
  style.textContent = `
    .features-nav {
      position: absolute;
      width: 100%;
      top: 50%;
      left: 0;
      display: flex;
      justify-content: space-between;
      padding: 0 20px;
      z-index: 10;
    }
    .nav-btn {
      background-color: rgba(228, 214, 161, 0.2);
      color: var(--accent-color);
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      cursor: pointer;
      transition: all 0.3s ease;
      opacity: 0.7;
    }
    .nav-btn:hover {
      background-color: var(--accent-color-hover);
      color: #000;
      opacity: 1;
    }
    .feature-icon {
      font-size: 1.4rem;
      margin-right: 8px;
      vertical-align: middle;
    }
    @media (max-width: 768px) {
      .nav-btn {
        width: 30px;
        height: 30px;
        font-size: 1rem;
      }
    }
  `;
  document.head.appendChild(style);
  
  // Navigation button functionality
  document.querySelector('.prev-btn').addEventListener('click', () => {
    direction = 1; // Go right
    speed = 3;
    setTimeout(() => speed = 0.7, 500);
  });
  
  document.querySelector('.next-btn').addEventListener('click', () => {
    direction = -1; // Go left
    speed = 3;
    setTimeout(() => speed = 0.7, 500);
  });
  
  // Pause sliding on hover with smooth stop and start
  carousel.addEventListener('mouseenter', () => {
    clearInterval(intervalId);
    
    // Slow down to stop
    const slowDown = setInterval(() => {
      speed *= 0.9;
      if (speed < 0.1) {
        clearInterval(slowDown);
        speed = 0;
      }
    }, 50);
  });
  
  // Resume sliding when mouse leaves
  carousel.addEventListener('mouseleave', () => {
    if (intervalId) clearInterval(intervalId);
    
    // Gradually increase speed
    speed = 0.1;
    const speedUp = setInterval(() => {
      speed *= 1.2;
      if (speed > 0.7) {
        clearInterval(speedUp);
        speed = 0.7;
      }
    }, 50);
    
    intervalId = setInterval(moveCarousel, 20);
  });
  
  // Adjust carousel on window resize
  window.addEventListener('resize', function() {
    position = 0;
    carousel.style.transform = `translateX(0)`;
  });
  
  // Add parallax effect to cards
  document.querySelectorAll('.features-content .card').forEach(card => {
    card.addEventListener('mousemove', function(e) {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      
      const deltaX = (x - centerX) / centerX;
      const deltaY = (y - centerY) / centerY;
      
      card.style.transform = `translateY(-10px) perspective(600px) rotateX(${deltaY * 5}deg) rotateY(${-deltaX * 5}deg)`;
    });
    
    card.addEventListener('mouseleave', function() {
      card.style.transform = '';
    });
  });
});