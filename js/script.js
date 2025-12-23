// Navbar Toggle
const navbarNav = document.querySelector(".navbar-nav");
const hamburgerMenu = document.querySelector("#hamburger-menu");

// Toggle hamburger menu
if (hamburgerMenu) {
  hamburgerMenu.onclick = (e) => {
    navbarNav.classList.toggle("active");
    e.preventDefault();
  };
}

// Search Form Toggle
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
const searchButton = document.querySelector("#search-button");

if (searchButton) {
  searchButton.onclick = (e) => {
    searchForm.classList.toggle("active");
    searchBox.focus();
    e.preventDefault();
  };
}

// Shopping Cart Toggle
const shoppingCart = document.querySelector(".shopping-cart");
const shoppingCartButton = document.querySelector("#shopping-cart-button");

if (shoppingCartButton) {
  shoppingCartButton.onclick = (e) => {
    shoppingCart.classList.toggle("active");
    e.preventDefault();
  };
}

// Close menu/search/cart when clicking outside
document.addEventListener("click", function (e) {
  const isClickInsideNav = navbarNav.contains(e.target);
  const isClickHamburger = hamburgerMenu && hamburgerMenu.contains(e.target);
  const isClickSearchForm = searchForm.contains(e.target);
  const isClickSearchButton = searchButton && searchButton.contains(e.target);
  const isClickCart = shoppingCart.contains(e.target);
  const isClickCartButton =
    shoppingCartButton && shoppingCartButton.contains(e.target);

  if (!isClickInsideNav && !isClickHamburger && navbarNav) {
    navbarNav.classList.remove("active");
  }

  if (!isClickSearchForm && !isClickSearchButton && searchForm) {
    searchForm.classList.remove("active");
  }

  if (!isClickCart && !isClickCartButton && shoppingCart) {
    shoppingCart.classList.remove("active");
  }
});

// Modal Box Item Detail
const itemDetailModal = document.querySelector("#item-detail-modal");
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".item-detail-button");

  if (btn) {
    e.preventDefault();

    // Get data from button attributes
    const itemId = btn.dataset.id;
    const itemType = btn.dataset.type;
    const itemName = btn.dataset.name;
    const itemDesc = btn.dataset.desc;
    const itemImg = btn.dataset.img;
    const itemPrice = btn.dataset.price;

    console.log("Opening modal for:", itemName, "Image:", itemImg); // Debug

    // Update modal content
    if (itemDetailModal) {
      const modalImg = itemDetailModal.querySelector("img");
      const modalTitle = itemDetailModal.querySelector(".product-content h3");
      const modalDesc = itemDetailModal.querySelector(".product-content p");
      const modalPrice = itemDetailModal.querySelector(".product-price");

      if (modalImg) {
        modalImg.src = itemImg;
        modalImg.alt = itemName;
      }
      if (modalTitle) modalTitle.textContent = itemName;
      if (modalDesc) modalDesc.textContent = itemDesc;
      if (modalPrice) modalPrice.textContent = itemPrice;

      // Update stars based on rating
      updateModalRating(itemId, itemType);

      // Store current item data in modal
      itemDetailModal.dataset.itemId = itemId;
      itemDetailModal.dataset.itemType = itemType;

      // Show modal
      itemDetailModal.style.display = "flex";

      // Replace feather icons
      if (typeof feather !== "undefined") {
        feather.replace();
      }
    }
  }
});

// Close modal
const closeIcon = document.querySelector(".modal .close-icon");
if (closeIcon) {
  closeIcon.onclick = (e) => {
    e.preventDefault();
    if (itemDetailModal) {
      itemDetailModal.style.display = "none";
    }
  };
}

// Close modal when clicking outside
if (itemDetailModal) {
  window.onclick = (e) => {
    if (e.target === itemDetailModal) {
      itemDetailModal.style.display = "none";
    }
  };
}

// Update modal rating display
function updateModalRating(itemId, itemType) {
  if (typeof Alpine === "undefined" || !Alpine.store("ratings")) return;

  const ratingsStore = Alpine.store("ratings");
  const avgRating = ratingsStore.getAverageRating(itemId, itemType);
  const ratingCount = ratingsStore.getRatingCount(itemId, itemType);

  // Update star display
  const stars = itemDetailModal.querySelectorAll(".product-stars i");
  stars.forEach((star, index) => {
    if (index < Math.round(avgRating)) {
      star.classList.add("star-full");
    } else {
      star.classList.remove("star-full");
    }
  });

  // Update rating count
  const ratingInfo = itemDetailModal.querySelector(".rating-info span");
  if (ratingInfo) {
    ratingInfo.textContent = `(${ratingCount} rating)`;
  }

  // Re-initialize feather icons
  if (typeof feather !== "undefined") {
    feather.replace();
  }
}

// Modal Rating Stars Click Handler
document.addEventListener("DOMContentLoaded", function () {
  const modalRateStars = document.querySelectorAll(".modal-rate-star");

  modalRateStars.forEach((star) => {
    star.addEventListener("click", function () {
      if (typeof Alpine === "undefined" || !Alpine.store("ratings")) return;

      const rating = parseInt(this.dataset.rating);
      const itemId = itemDetailModal.dataset.itemId;
      const itemType = itemDetailModal.dataset.itemType;

      if (itemId && itemType) {
        // Add rating
        Alpine.store("ratings").addRating(itemId, itemType, rating);

        // Visual feedback
        modalRateStars.forEach((s, index) => {
          if (index < rating) {
            s.setAttribute("fill", "currentColor");
          } else {
            s.setAttribute("fill", "none");
          }
        });

        // Update modal rating display
        updateModalRating(itemId, itemType);

        // Show success message
        alert(`Terima kasih! Anda memberikan rating ${rating} bintang.`);
      }
    });

    // Hover effect
    star.addEventListener("mouseenter", function () {
      const rating = parseInt(this.dataset.rating);
      modalRateStars.forEach((s, index) => {
        if (index < rating) {
          s.setAttribute("fill", "currentColor");
        } else {
          s.setAttribute("fill", "none");
        }
      });
    });
  });

  // Reset stars on mouse leave
  const rateStarsContainer = document.querySelector(
    ".modal-rating-section .rate-stars"
  );
  if (rateStarsContainer) {
    rateStarsContainer.addEventListener("mouseleave", function () {
      if (typeof Alpine === "undefined" || !Alpine.store("ratings")) return;

      const itemId = itemDetailModal.dataset.itemId;
      const itemType = itemDetailModal.dataset.itemType;

      // Reset rating stars visual
      const rateStars = itemDetailModal.querySelectorAll(".modal-rate-star");
      rateStars.forEach((star) => {
        star.setAttribute("fill", "none");
      });

      if (itemId && itemType) {
        const userRating = Alpine.store("ratings").getUserRating(
          itemId,
          itemType
        );
        modalRateStars.forEach((s, index) => {
          if (index < userRating) {
            s.setAttribute("fill", "currentColor");
          } else {
            s.setAttribute("fill", "none");
          }
        });
      }
    });
  }
});

// Search functionality (optional enhancement)
if (searchBox) {
  searchBox.addEventListener("input", function (e) {
    const searchTerm = e.target.value.toLowerCase();
    console.log("Searching for:", searchTerm);
  });
}

// Add smooth scroll behavior
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    const href = this.getAttribute("href");
    if (href !== "#" && document.querySelector(href)) {
      e.preventDefault();
      document.querySelector(href).scrollIntoView({
        behavior: "smooth",
      });
    }
  });
});

// Replace feather icons on page load
if (typeof feather !== "undefined") {
  feather.replace();
}

// Refresh feather icons periodically for dynamically added content
setInterval(() => {
  if (typeof feather !== "undefined") {
    feather.replace();
  }
}, 1000);

// Profile Dropdown Toggle
const profileBtn = document.getElementById("profile-button");
const profileDropdown = document.getElementById("profile-dropdown");

if (profileBtn && profileDropdown) {
  profileBtn.addEventListener("click", function (e) {
    e.stopPropagation();
    profileDropdown.classList.toggle("active");
  });

  // Close dropdown when clicking outside
  document.addEventListener("click", function (e) {
    if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
      profileDropdown.classList.remove("active");
    }
  });
}

// Fungsi untuk membaca parameter URL
function getUrlParameter(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
  var results = regex.exec(location.search);
  return results === null
    ? ""
    : decodeURIComponent(results[1].replace(/\+/g, " "));
}

// User Manager
const UserManager = {
  currentUser: {
    username: "Guest User",
    email: "guest@example.com",
    isLoggedIn: false,
  },

  init() {
    const savedUser = localStorage.getItem("berandaCoffeeUser");
    if (savedUser) {
      this.currentUser = JSON.parse(savedUser);
      this.updateProfileUI();
    }
  },

  login(username, email) {
    this.currentUser = {
      username: username || "User",
      email: email || "user@example.com",
      isLoggedIn: true,
    };
    localStorage.setItem("berandaCoffeeUser", JSON.stringify(this.currentUser));
    this.updateProfileUI();
  },

  logout() {
    this.currentUser = {
      username: "Guest User",
      email: "guest@example.com",
      isLoggedIn: false,
    };
    localStorage.removeItem("berandaCoffeeUser");
    this.updateProfileUI();
    alert("Anda telah logout.");
  },

  updateProfileUI() {
    const usernameEl = document.getElementById("profile-username");
    const emailEl = document.getElementById("profile-email");

    if (usernameEl) usernameEl.textContent = this.currentUser.username;
    if (emailEl) emailEl.textContent = this.currentUser.email;
  },
};

// Inisialisasi saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
  UserManager.init();

  // Logout button handler
  const logoutBtn = document.getElementById("logout-btn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", function (e) {
      e.preventDefault();
      UserManager.logout();
    });
  }
});

// Close modal handler alternative
document.addEventListener("click", function (e) {
  if (
    e.target.classList.contains("close-icon") ||
    e.target.closest(".close-icon")
  ) {
    const modal = document.getElementById("item-detail-modal");
    if (modal) {
      modal.style.display = "none";
    }
  }
});
