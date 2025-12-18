<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda Coffee</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,700;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
      <symbol id="heart" viewBox="0 0 24 24">
        <path
          d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"
        ></path>
      </symbol>
    </svg>

    <!-- My Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Alpine JS -->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>

    <!-- App -->
    <script src="js/app.js" async></script>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar" x-data>
      <a href="#" class="navbar-logo">Beranda<span>Coffee</span>.</a>

      <div class="navbar-nav">
        <a href="/">Beranda</a>
        <a href="#about">Tentang Kami</a>
        <a href="/menu">Menu</a>
        <a href="#products">Produk Kami</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="navbar-extra">
        <a href="/login" id="login-button" class="login-btn">
          <i data-feather="log-in"></i>
          <span>Login</span>
        </a>
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart-button"
          ><i data-feather="shopping-cart"></i
          ><span
            class="quantity-badge"
            x-show="$store.cart.quantity"
            x-text="$store.cart.quantity"
          ></span
        ></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>

      <!-- Search Form start -->
      <div class="search-form">
        <input type="search" id="search-box" placeholder="Search Here..." />
        <label for="search-box"><i data-feather="search"></i></label>
      </div>
      <!-- Search Form end -->

      <!-- Shopping Cart start -->
      <div class="shopping-cart">
        <template x-for="(item, index) in $store.cart.items" x-keys="index">
          <div class="cart-item">
            <img
              :src="`img/${item.imgPath || 'products'}/${item.img}`"
              :alt="item.name"
            />
            <div class="item-detail">
              <h3 x-text="item.name"></h3>
              <div class="item-price">
                <span x-text="$store.cart.rupiah(item.price)"></span> &times;
                <button id="remove" @click="$store.cart.remove(item.id)">
                  &minus;
                </button>
                <span x-text="item.quantity"></span>
                <button id="add" @click="$store.cart.add(item)">&plus;</button>
                &equals;
                <span x-text="$store.cart.rupiah(item.total)"></span>
              </div>
            </div>
          </div>
        </template>

        <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem">
          Keranjang Kosong
        </h4>
        <h4 x-show="$store.cart.items.length">
          Total : <span x-text="$store.cart.rupiah($store.cart.total)"></span>
        </h4>
        <div class="form-container" x-show="$store.cart.items.length">
          <form action="" id="checkoutForm">
            <input
              type="hidden"
              name="items"
              x-model="JSON.stringify($store.cart.items)"
            />
            <input type="hidden" name="total" x-model="$store.cart.total" />

            <h5>Customer Detail</h5>

            <label for="name">
              <span>Name</span>
              <input
                type="text"
                name="name"
                id="name"
                placeholder="Your name"
                required
              />
            </label>

            <label for="email">
              <span>Email</span>
              <input
                type="email"
                name="email"
                id="email"
                placeholder="your@email.com"
                required
              />
            </label>

            <label for="phone">
              <span>Phone</span>
              <input
                type="tel"
                name="phone"
                id="phone"
                placeholder="Your phone number"
                autocomplete="off"
                required
              />
            </label>

            <button
              class="checkout-button disabled"
              type="submit"
              id="checkout-button"
              value="checkout"
            >
              Checkout
            </button>
          </form>
        </div>
      </div>
      <!-- Shopping Cart end -->
    </nav>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>Mari Nikmati<span> Secangkir Kopi</span></h1>
        <p>
          Apapun suasana hati Kamu, kopi kami selalu siap menemani hari-hari mu
          dengan rasa yang tak terlupakan, dan cinta rasa di setiap tegukan nya.
        </p>
      </main>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="about">
      <h2><span>Tentang</span> Kami</h2>

      <div class="row">
        <div class="about-img">
          <img src="img/tentang-kami.jpg" alt="Tentang kami" />
        </div>
        <div class="content">
          <h3>Kenapa Memilih Kopi Kami?</h3>
          <p>
            Harga kaki lima kualitas bintang lima dengan rasa yang bisa
            menggunggah selera, membuat kopi kami menjadi pilihan utama bagi
            para pecinta kopi.
          </p>
          <p>
            Dibuat dengan menggunakan biji kopi pilihan yang diolah dengan
            teknik terbaik, dengan sentuhan cinta dan dedikasi, membuat kopi
            kami memiliki cita rasa yang unik dan memikat. Kami percaya bahwa
            setiap tegukan kopi kami memberikan pengalaman yang tak terlupakan.
          </p>
        </div>
      </div>
    </section>
    <!-- About Section end -->

    <!-- Menu Section start -->
    <section id="menu" class="menu" x-data="products">
      <h2><span>Menu</span> Kami</h2>
        <p>
          Semoga menu kopi andalan kami dapat menemani hari-hari mu dan memberikan
          kenikmatan yang tak terlupakan.
        </p>

        <div class="row">
          <template x-for="item in sortedMenuItems" :key="item.id">
            <div class="menu-card">
              <div class="menu-card-header">
                <img
                  :src="`img/menu/${item.img}`"
                  :alt="item.name"
                  class="menu-card-img"
                />

                <div class="menu-card-actions">
                  <!-- FAVORITE -->
                  <a
                    href="#"
                    @click.prevent="$store.favorites.toggle(item, 'menu')"
                    class="menu-action-btn favorite-btn"
                    :class="{ 'favorited': $store.favorites.isFavorited(item, 'menu') }"
                    :title="$store.favorites.isFavorited(item, 'menu')
                    ? 'Hapus dari Favorit'
                    : 'Tambah ke Favorit'"
                  >
                    <svg
                      width="16"
                      height="16"
                      :fill="$store.favorites.isFavorited(item, 'menu')
                      ? 'currentColor'
                      : 'none'"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <use href="img/feather-sprite.svg#heart" />
                    </svg>
                  </a>

                  <!-- CART -->
                  <a
                    href="#"
                    @click.prevent="$store.cart.add(item)"
                    class="menu-action-btn"
                    title="Tambah ke Keranjang"
                  >
                    <svg
                      width="16"
                      height="16"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <use href="img/feather-sprite.svg#shopping-cart" />
                    </svg>
                  </a>

                  <!-- DETAIL (TANPA DATA RATING) -->
                  <a
                    href="#"
                    class="menu-action-btn item-detail-button"
                    :data-id="item.id"
                    :data-type="'menu'"
                    :data-name="item.name"
                    :data-desc="item.desc"
                    :data-img="`img/menu/${item.img}`"
                    :data-price="$store.cart.rupiah(item.price)"
                    title="Lihat Detail"
                  >
                    <svg
                      width="16"
                      height="16"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <use href="img/feather-sprite.svg#eye" />
                    </svg>
                  </a>
                </div>
              </div>

              <div class="menu-card-content">
                <h3 class="menu-card-title" x-text="item.name"></h3>
              <p class="menu-card-desc" x-text="item.desc"></p>

              <!-- ⭐ RATING DISPLAY (READ ONLY) -->
              <div class="menu-rating-section">
                <div class="rating-stars">
                  <template x-for="i in 5" :key="i">
                    <svg
                      width="14"
                      height="14"
                      :fill="i <= Math.round(
                      $store.ratings.getAverageRating(item.id, 'menu')
                      ) ? 'currentColor' : 'none'"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <use href="img/feather-sprite.svg#star" />
                    </svg>
                  </template>

                  <span
                    class="rating-text"
                    x-text="'(' + $store.ratings.getRatingCount(item.id, 'menu') + ')'"
                  ></span>
                </div>
              </div>

              <div class="menu-card-footer">
                <p
                  class="menu-item-price"
                  x-text="$store.cart.rupiah(item.price)"
                ></p>
              </div>
            </div>
          </div>
        </template>
      </div>
    </section>
    <!-- Menu end -->

    <!-- Products Section start -->
    <section id="products" class="products" x-data="products">
      <h2><span>Produk</span> Kami</h2>
      <p>
      Produk unggulan kami berupa biji kopi terbaik yang dipetik dari
      perkebunan dataran tinggi, menghasilkan cita rasa yang kaya dan aroma
      yang menggugah selera.
      </p>

      <div class="row">
        <template x-for="item in sortedItems" :key="item.id">
          <div class="product-card">
            <div class="product-icons">
              <!-- FAVORITE -->
              <a
                href="#"
                @click.prevent="$store.favorites.toggle(item, 'product')"
                class="favorite-btn"
                :class="{ 'favorited': $store.favorites.isFavorited(item, 'product') }"
                :title="$store.favorites.isFavorited(item, 'product')
                ? 'Hapus dari Favorit'
                : 'Tambah ke Favorit'"
              >
                <svg
                  width="24"
                  height="24"
                  :fill="$store.favorites.isFavorited(item, 'product')
                    ? 'currentColor'
                    : 'none'"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <use href="img/feather-sprite.svg#heart" />
                </svg>
              </a>

              <!-- CART -->
                <a href="#" @click.prevent="$store.cart.add(item)">
                  <svg
                    width="24"
                    height="24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <use href="img/feather-sprite.svg#shopping-cart" />
                  </svg>
                </a>

                <!-- DETAIL (TANPA DATA RATING) -->
                <a
                  href="#"
                  class="item-detail-button"
                  :data-id="item.id"
                  :data-type="'product'"
                  :data-name="item.name"
                  :data-desc="item.desc"
                  :data-img="`img/products/${item.img}`"
                  :data-price="$store.cart.rupiah(item.price)"
                  title="Lihat Detail"
                >
                  <svg
                    width="24"
                    height="24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <use href="img/feather-sprite.svg#eye" />
                  </svg>
                </a>
              </div>

              <div class="product-image">
                <img :src="`img/products/${item.img}`" :alt="item.name" />
              </div>

              <div class="product-content">
                <h3 x-text="item.name"></h3>

                <!-- ⭐ RATING DISPLAY (READ ONLY) -->
                <div class="product-stars">
                  <template x-for="i in 5" :key="i">
                    <svg
                      width="18"
                      height="18"
                      :fill="i <= Math.round(
                      $store.ratings.getAverageRating(item.id, 'product')
                      ) ? 'currentColor' : 'none'"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <use href="img/feather-sprite.svg#star" />
                    </svg>
                  </template>
                </div>

                <div
                  class="rating-count"
                  x-text="'(' + $store.ratings.getRatingCount(item.id, 'product') + ' rating)'"
                ></div>

                <div class="product-price">
                  <span x-text="$store.cart.rupiah(item.price)"></span>
                </div>
              </div>
            </div>
          </template>
        </div>
      </section>
    <!-- Products Section end -->

    <!-- Contact Section start -->
    <section id="contact" class="contact">
      <h2><span>Kontak</span> Kami</h2>
      <p>
        Saran dan kritik dari Anda sangat berarti bagi kami untuk meningkatkan
        layanan dan produk kami. Jangan ragu untuk menghubungi kami melalui form
        di bawah ini.
      </p>

      <div class="row">
        <div class="contact-container">
          <div class="form-container">
            <h3>Kirim Ulasan</h3>
            <form action="" id="ulasanForm">
              <div class="input-group">
                <i data-feather="user"></i>
                <input
                  type="text"
                  placeholder="Nama Lengkap"
                  id="ulasanName"
                  required
                />
                <span class="input-focus"></span>
              </div>
              <div class="input-group">
                <i data-feather="mail"></i>
                <input
                  type="email"
                  placeholder="Email"
                  id="ulasanEmail"
                  required
                />
                <span class="input-focus"></span>
              </div>
              <div class="input-group-3">
                <i data-feather="message-square"></i>
                <textarea
                  placeholder="Kirim Ulasan Anda Di Sini"
                  id="ulasanText"
                  required
                ></textarea>
                <span class="input-focus"></span>
              </div>
              <button type="submit" class="btn" id="btnUlasan">
                <i data-feather="send"></i>
                Kirim Ulasan
              </button>
            </form>
          </div>

          <div class="map-container">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.184885024379!2d112.71637438561984!3d-7.333122273329611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7aa0e99023%3A0xc98468576e20f7fc!2sBeranda%20Kita%20(Kos%20dan%20Kedai%20Kopi)!5e0!3m2!1sid!2sid!4v1763293534996!5m2!1sid!2sid"
              width="100%"
              height="100%"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              class="map"
            ></iframe>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section end -->

    <!-- Footer start -->
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-col">
          <h3>Tentang Kami</h3>
          <p>
            Kami adalah penyedia kopi premium dengan cita rasa terbaik. Nikmati
            pengalaman kopi mu yang berbeda di setiap harinya.
          </p>
        </div>
        <div class="footer-col">
          <h3>Link</h3>
          <ul>
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#products">Produk Kami</a></li>
            <li><a href="#contact">Kontak</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h3>Situs</h3>
          <ul>
            <li><a href="#">Coffee Shop</a></li>
            <li><a href="#">Premium Beans</a></li>
            <li><a href="#">Brew Academy</a></li>
            <li><a href="#">Coffee Blogs</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h3>Hubungi Kami</h3>
          <p>Email: Berandacoffee@gmail.com</p>
          <p>Phone: +62 812-3456-7890</p>

          <div class="footer-social">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2025 BerandaCoffee. All Rights Reserved.</p>
      </div>
    </footer>
    <!-- Footer end -->

    <!-- Modal Box Item Detail start -->
    <div class="modal" id="item-detail-modal">
      <div class="modal-container">
        <button type="button" class="close-icon" style="background-color: white;">✕</button>
        <div class="modal-content">
          <img src="img/Products/1.jpg" alt="Product 1" />
          <div class="product-content">
            <h3>Product 1</h3>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe,
              sint quam! Debitis aliquam totam fuga officiis optio voluptas
              ipsum earum beatae, sunt ut, soluta sed!
            </p>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
            </div>
            <div class="rating-info">
              <span>(0 rating)</span>
            </div>

            <!-- Rating Section di Modal -->
            <div class="modal-rating-section">
              <span
                style="
                  font-size: 1rem;
                  color: #666;
                  display: block;
                  margin-bottom: 0.5rem;
                "
                >Beri Rating Anda:</span
              >
              <div class="rate-stars" style="justify-content: flex-start">
                <svg
                  width="20"
                  height="20"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="rate-star modal-rate-star"
                  data-rating="1"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="20"
                  height="20"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="rate-star modal-rate-star"
                  data-rating="2"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="20"
                  height="20"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="rate-star modal-rate-star"
                  data-rating="3"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="20"
                  height="20"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="rate-star modal-rate-star"
                  data-rating="4"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="20"
                  height="20"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="rate-star modal-rate-star"
                  data-rating="5"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
              </div>
            </div>

            <div class="product-price">IDR 30K</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Box Item Detail end -->

    <script>
      feather.replace();

      // Form submission handling
      document
        .getElementById("ulasanForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          const name = document.getElementById("ulasanName").value.trim();
          const email = document.getElementById("ulasanEmail").value.trim();
          const message = document.getElementById("ulasanText").value.trim();

          if (!name || !email || !message) {
            alert("Harap lengkapi semua field sebelum mengirim ulasan.");
            return;
          }

          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailRegex.test(email)) {
            alert("Harap masukkan alamat email yang valid.");
            return;
          }

          alert("Terima kasih! Ulasan Anda telah berhasil dikirim.");
          this.reset();
        });
    </script>

    <!-- My Javascript -->
    <script src="/js/script.js"></script>
  </body>
</html>
