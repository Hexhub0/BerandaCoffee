document.addEventListener("alpine:init", () => {
  Alpine.data("menuProduct", () => ({
    menuItems: [
      {
        id: 1,
        name: "Espresso",
        img: "menu/1.jpg",
        price: 15000,
        desc: "Kopi murni dengan rasa kuat dan aroma khas",
      },
      {
        id: 2,
        name: "Latte",
        img: "menu/2.jpg",
        price: 20000,
        desc: "Espresso dengan susu lembut dan creamy",
      },
    ],

    products: [
      {
        id: 101,
        name: "Tocal Beans",
        img: "products/1.jpg",
        price: 50000,
        desc: "Biji kopi arabika pilihan",
      },
      {
        id: 102,
        name: "Tocal Espresso Pack",
        img: "products/2.jpg",
        price: 60000,
        desc: "Espresso blend premium",
      },
    ],

    formatRupiah(value) {
      return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
      }).format(value);
    },
  }));
});