document.addEventListener("alpine:init", () => {
  Alpine.data("products", () => ({
    items: [
      {
        id: 1,
        name: "Tocal Beans",
        img: "1.jpg",
        price: 50000,
        desc: "Biji kopi arabika pilihan dengan karakter rasa halus, sedikit fruity, cocok untuk seduhan harian.",
      },
      {
        id: 2,
        name: "Tocal Matcha",
        img: "2.jpg",
        price: 80000,
        desc: "Perpaduan matcha premium dan kopi lembut, rasa creamy manis dengan hint pahit yang seimbang.",
      },
      {
        id: 3,
        name: "Tocal Cappuccino",
        img: "3.jpg",
        price: 45000,
        desc: "Kopi dengan foam susu lembut, cocok untuk kamu yang suka kopi tidak terlalu strong.",
      },
      {
        id: 4,
        name: "Tocal Espresso",
        img: "4.jpg",
        price: 60000,
        desc: "Espresso pekat dengan body kuat dan aroma tajam, pas untuk penikmat kopi serius.",
      },
    ],
    menuItems: [
      {
        id: 10,
        name: "Espresso",
        img: "1.jpg",
        price: 15000,
        desc: "Kopi murni dengan rasa kuat dan aroma yang khas, dibuat dari biji kopi pilihan.",
        category: "menu",
      },
      {
        id: 11,
        name: "Latte Coffee",
        img: "2.jpg",
        price: 20000,
        desc: "Perpaduan sempurna antara espresso dan susu steamed dengan lapisan foam.",
        category: "menu",
      },
      {
        id: 12,
        name: "Matcha Coffee",
        img: "3.jpg",
        price: 25000,
        desc: "Kombinasi unik matcha premium dengan kopi, memberikan rasa yang segar.",
        category: "menu",
      },
      {
        id: 13,
        name: "Cappuccino Coffee",
        img: "4.jpg",
        price: 22000,
        desc: "Espresso dengan foam susu yang tebal dan creamy, cocok untuk pecinta kopi susu.",
        category: "menu",
      },
      {
        id: 14,
        name: "Affogato Coffee",
        img: "5.jpg",
        price: 24000,
        desc: "Es krim vanilla yang disiram espresso panas, perpaduan panas dan dingin yang sempurna.",
        category: "menu",
      },
      {
        id: 15,
        name: "Beranda Coffee",
        img: "6.jpg",
        price: 25000,
        desc: "Signature drink kami dengan racikan khusus yang hanya bisa kamu temukan di sini.",
        category: "menu",
      },
    ],

    // Method untuk mendapatkan menu items yang sudah disortir
    get sortedMenuItems() {
      return this.sortByFavorites(this.menuItems, "menu");
    },

    // Method untuk mendapatkan product items yang sudah disortir
    get sortedItems() {
      return this.sortByFavorites(this.items, "product");
    },

    // Method untuk sorting berdasarkan favorit
    sortByFavorites(items, type) {
      const favorites = Alpine.store("favorites");
      return [...items].sort((a, b) => {
        const aIsFav = favorites.isFavorited(a, type);
        const bIsFav = favorites.isFavorited(b, type);

        if (aIsFav && !bIsFav) return -1;
        if (!aIsFav && bIsFav) return 1;
        return 0;
      });
    },

    createStars(rating) {
      let starsHTML = "";
      for (let i = 1; i <= 5; i++) {
        const isFilled = i <= rating;
        starsHTML += `
          <svg
            width="20"
            height="20"
            ${isFilled ? 'fill="currentColor"' : 'fill="none"'}
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <use href="img/feather-sprite.svg#star" />
          </svg>
        `;
      }
      return starsHTML;
    },
  }));

  // Alpine.store("cart")
  Alpine.store("cart", {
    items: [],
    total: 0,
    quantity: 0,

    rupiah(number) {
      return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
      }).format(number);
    },

    add(newItem) {
      const imgPath = newItem.category ? "menu" : "products";
      const itemType = newItem.category ? "menu" : "product";

      const cartItem = this.items.find(
        (item) => item.id === newItem.id && item.type === itemType
      );

      if (!cartItem) {
        this.items.push({
          ...newItem,
          quantity: 1,
          total: newItem.price,
          type: itemType,
          imgPath: imgPath,
        });
        this.quantity++;
        this.total += newItem.price;
      } else {
        this.items = this.items.map((item) => {
          if (item.id !== newItem.id || item.type !== itemType) return item;

          item.quantity++;
          item.total = item.price * item.quantity;
          this.quantity++;
          this.total += item.price;
          return item;
        });
      }
    },

    remove(id) {
      const cartItem = this.items.find((item) => item.id === id);

      if (cartItem.quantity > 1) {
        this.items = this.items.map((item) => {
          if (item.id !== id) return item;

          item.quantity--;
          item.total = item.price * item.quantity;
          this.quantity--;
          this.total -= item.price;
          return item;
        });
      } else {
        this.items = this.items.filter((item) => item.id !== id);
        this.quantity--;
        this.total -= cartItem.price;
      }
    },
  });

  // Store untuk favorites (digunakan untuk sorting saja)
  Alpine.store("favorites", {
    items: [],

    init() {
      const saved = localStorage.getItem("berandaCoffeeFavorites");
      if (saved) {
        try {
          this.items = JSON.parse(saved);
        } catch (e) {
          console.error("Error loading favorites:", e);
          this.items = [];
        }
      }
    },

    toggle(item, type) {
      const itemType = type || (item.category ? "menu" : "product");
      const key = `${item.id}-${itemType}`;
      const existingIndex = this.items.findIndex(
        (i) => `${i.id}-${i.type}` === key
      );

      if (existingIndex >= 0) {
        this.items.splice(existingIndex, 1);
      } else {
        this.items.push({
          id: item.id,
          type: itemType,
          timestamp: Date.now(),
        });
      }

      this.saveToLocalStorage();

      // Trigger re-render dengan dispatch event
      window.dispatchEvent(new CustomEvent("favorites-updated"));
    },

    isFavorited(item, type) {
      const itemType = type || (item.category ? "menu" : "product");
      const key = `${item.id}-${itemType}`;
      return this.items.some((i) => `${i.id}-${i.type}` === key);
    },

    saveToLocalStorage() {
      try {
        localStorage.setItem(
          "berandaCoffeeFavorites",
          JSON.stringify(this.items)
        );
      } catch (e) {
        console.error("Error saving favorites:", e);
      }
    },
  });

  // Store untuk ratings global
  Alpine.store("ratings", {
  menuRatings: {},
  productRatings: {},

  init() {
    const saved = localStorage.getItem("berandaCoffeeRatings");
    if (saved) {
      const data = JSON.parse(saved);
      this.menuRatings = data.menuRatings || {};
      this.productRatings = data.productRatings || {};
    }
  },

  addOrUpdateRating(itemId, rating, itemType, userId) {
    const store =
      itemType === "menu" ? this.menuRatings : this.productRatings;
    const id = Number(itemId);

    if (!store[id]) {
      store[id] = {
        ratingsByUser: {},
        total: 0,
        count: 0,
        average: 0,
      };
    }

    const item = store[id];

    if (item.ratingsByUser[userId]) {
      const oldRating = item.ratingsByUser[userId];
      item.total = item.total - oldRating + rating;
      item.ratingsByUser[userId] = rating;
    } else {
      item.ratingsByUser[userId] = rating;
      item.total += rating;
      item.count++;
    }

    item.average = item.total / item.count;
    this.saveToLocalStorage();
    window.dispatchEvent(new Event("ratings-updated"));
  },

  getAverageRating(itemId, itemType) {
    const store =
      itemType === "menu" ? this.menuRatings : this.productRatings;
    return store[itemId]?.average || 0;
  },

  getRatingCount(itemId, itemType) {
    const store =
      itemType === "menu" ? this.menuRatings : this.productRatings;
    return store[itemId]?.count || 0;
  },

  getUserRating(itemId, itemType, userId) {
    const store =
      itemType === "menu" ? this.menuRatings : this.productRatings;
    return store[itemId]?.ratingsByUser?.[userId] || 0;
  },

  saveToLocalStorage() {
    localStorage.setItem(
      "berandaCoffeeRatings",
      JSON.stringify({
        menuRatings: this.menuRatings,
        productRatings: this.productRatings,
      })
    );
  },


    getAverageRating(itemId, itemType) {
      const store =
        itemType === "menu" ? this.menuRatings : this.productRatings;
      const id = typeof itemId === "string" ? parseInt(itemId) : itemId;
      return store[id] ? store[id].average : 0;
    },

    getRatingCount(itemId, itemType) {
      const store =
        itemType === "menu" ? this.menuRatings : this.productRatings;
      const id = typeof itemId === "string" ? parseInt(itemId) : itemId;
      return store[id] ? store[id].count : 0;
    },

    saveToLocalStorage() {
      try {
        const data = {
          menuRatings: this.menuRatings,
          productRatings: this.productRatings,
        };
        localStorage.setItem("berandaCoffeeRatings", JSON.stringify(data));
      } catch (e) {
        console.error("Error saving ratings:", e);
      }
    },
  });
});

// VALIDASI FORM FIXED
const checkoutButton = document.querySelector("#checkout-button");
if (checkoutButton) {
  checkoutButton.disabled = true;

  const form = document.querySelector("#checkoutForm");

  if (form) {
    form.addEventListener("keyup", function () {
      let filled = true;

      for (let i = 0; i < form.elements.length; i++) {
        const el = form.elements[i];
        if (el.type === "hidden" || el.type === "submit") continue;

        if (el.value.trim() === "") {
          filled = false;
          break;
        }
      }

      if (filled) {
        checkoutButton.disabled = false;
        checkoutButton.classList.remove("disabled");
      } else {
        checkoutButton.disabled = true;
        checkoutButton.classList.add("disabled");
      }
    });

    // CHECKOUT WHATSAPP
    checkoutButton.addEventListener("click", function (e) {
      e.preventDefault();

      const formData = new FormData(form);
      const data = new URLSearchParams(formData);
      const objData = Object.fromEntries(data);

      const message = formMessage(objData);

      window.open(
        "https://wa.me/6289513639378?text=" + encodeURIComponent(message),
        "_blank"
      );
    });
  }
}

// FORMAT PESAN WA (FIXED)
const formMessage = (obj) => {
  try {
    const items = JSON.parse(obj.items);
    const cart = Alpine.store("cart");

    const itemList = items
      .map(
        (item) => `${item.name} (${item.quantity} x ${cart.rupiah(item.price)})`
      )
      .join("\n");

    return `Data Customer
Nama: ${obj.name}
Email: ${obj.email}
No HP: ${obj.phone}

Data Pesanan:
${itemList}

Total: ${cart.rupiah(obj.total)}
Terima kasih.`;
  } catch (error) {
    console.error("Error formatting message:", error);
    return `Data Customer
Nama: ${obj.name}
Email: ${obj.email}
No HP: ${obj.phone}

Error memproses pesanan.`;
  }
};