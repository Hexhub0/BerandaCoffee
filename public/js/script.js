// Toggle Class Active untuk humburger menu
const navbarNav = document.querySelector(".navbar-nav");

// Ketika hamburger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// Toggle Class Active untuk search form
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");

document.querySelector("#search-button").onclick = (e) => {
  searchForm.classList.toggle("active");
  searchBox.focus();
  e.preventDefault();
};

// Toggle Class Active untuk Shopping Cart
const shoppingCart = document.querySelector(".shopping-cart");
document.querySelector("#shopping-cart-button").onclick = (e) => {
  shoppingCart.classList.toggle("active");
  e.preventDefault();
};

// Klik di luar elemen
const hm = document.querySelector("#hamburger-menu");
const sb = document.querySelector("#search-button");
const sc = document.querySelector("#shopping-cart-button");

document.addEventListener("click", function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }

  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove("active");
  }

  if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
    shoppingCart.classList.remove("active");
  }
});

const USER_ID =
  localStorage.getItem("user_id") ||
  (() => {
    const id =
      "user_" + Date.now() + "_" + Math.random().toString(36).substr(2, 9);
    localStorage.setItem("user_id", id);
    return id;
  })();

document.addEventListener("DOMContentLoaded", () => {
  const detailButtons = document.querySelectorAll(".item-detail-button");
  const modal = document.querySelector("#item-detail-modal");

  if (!modal || !detailButtons.length) return;

  const modalImg = modal.querySelector("img");
  const modalTitle = modal.querySelector("h3");
  const modalDesc = modal.querySelector("p");
  const modalPrice = modal.querySelector(".product-price");
  const modalStars = modal.querySelector(".product-stars");

  let currentItemId = null;
  let currentItemType = null;

  // ===== HELPER =====
  function createStars(rating) {
    let html = "";
    for (let i = 1; i <= 5; i++) {
      html += `
        <svg width="20" height="20"
          ${i <= rating ? 'fill="currentColor"' : 'fill="none"'}
          stroke="currentColor" stroke-width="2">
          <use href="img/feather-sprite.svg#star" />
        </svg>`;
    }
    return html;
  }

  // ===== OPEN MODAL =====
  detailButtons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();

      currentItemId = parseInt(btn.dataset.id);
      currentItemType = btn.dataset.type;

      modalImg.src = btn.dataset.img;
      modalTitle.textContent = btn.dataset.name;
      modalDesc.textContent = btn.dataset.desc;
      modalPrice.textContent = btn.dataset.price;

      const avg = Alpine.store("ratings")
        .getAverageRating(currentItemId, currentItemType);

      const userRating = Alpine.store("ratings")
        .getUserRating(currentItemId, currentItemType, USER_ID);

      modalStars.innerHTML = createStars(
        userRating || Math.round(avg)
      );

      modal.style.display = "block";
      feather.replace();
    });
  });

  // ===== CLICK RATING (MODAL ONLY) =====
  modal.querySelectorAll(".modal-rate-star").forEach((star) => {
    star.addEventListener("click", function () {
      if (!currentItemId || !currentItemType) return;

      const rating = parseInt(this.dataset.rating);

      Alpine.store("ratings").addOrUpdateRating(
        currentItemId,
        rating,
        currentItemType,
        USER_ID
      );

      const avg = Alpine.store("ratings")
        .getAverageRating(currentItemId, currentItemType);

      const count = Alpine.store("ratings")
        .getRatingCount(currentItemId, currentItemType);

      modalStars.innerHTML = createStars(Math.round(avg));

      const ratingInfo = modal.querySelector(".rating-info span");
      if (ratingInfo) ratingInfo.textContent = `${count} rating`;
    });
  });

  // ===== CLOSE MODAL =====
  modal.querySelector(".close-icon")?.addEventListener("click", () => {
    modal.style.display = "none";
    currentItemId = null;
    currentItemType = null;
  });

  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
      currentItemId = null;
      currentItemType = null;
    }
  });
});

// Listen to favorites and ratings updates to trigger re-render
window.addEventListener("favorites-updated", () => {
  // Alpine akan otomatis re-render karena reactive data
  console.log("Favorites updated");
});

window.addEventListener("ratings-updated", () => {
  // Alpine akan otomatis re-render karena reactive data
  console.log("Ratings updated");
});
