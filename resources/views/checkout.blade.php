<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout - Beranda Coffee</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,700;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Alpine JS -->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>

    <!-- App -->
    <script src="src/app.js" async></script>

    <style>
      .checkout-page {
        padding-top: 10rem;
        min-height: 100vh;
        background: linear-gradient(135deg, #f8f4f0 0%, #ede5dd 100%);
        padding-bottom: 4rem;
      }

      .checkout-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 7%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
      }

      .checkout-section {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      }

      .section-title {
        font-size: 2rem;
        color: #2c1810;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid var(--primary);
        display: flex;
        align-items: center;
        gap: 0.8rem;
      }

      .form-group {
        margin-bottom: 2rem;
      }

      .form-group label {
        display: block;
        font-size: 1.1rem;
        color: #2c1810;
        margin-bottom: 0.8rem;
        font-weight: 600;
      }

      .form-group label span {
        color: #e74c3c;
      }

      .form-group input,
      .form-group select {
        width: 100%;
        padding: 1.2rem;
        font-size: 1.1rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        transition: all 0.3s ease;
        font-family: "Poppins", sans-serif;
        background: #f9f9f9;
      }

      .form-group input:focus,
      .form-group select:focus {
        outline: none;
        border-color: var(--primary);
        background: white;
        box-shadow: 0 4px 12px rgba(182, 137, 91, 0.2);
      }

      .payment-methods {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
      }

      .payment-option {
        position: relative;
      }

      .payment-option input[type="radio"] {
        position: absolute;
        opacity: 0;
      }

      .payment-label {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.2rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #f9f9f9;
      }

      .payment-option input[type="radio"]:checked + .payment-label {
        border-color: var(--primary);
        background: rgba(182, 137, 91, 0.1);
        box-shadow: 0 4px 12px rgba(182, 137, 91, 0.2);
      }

      .payment-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 8px;
        color: var(--primary);
      }

      .payment-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c1810;
      }

      /* Bank Selection */
      .bank-selection {
        margin-top: 1.5rem;
        padding: 1.5rem;
        background: #f9f9f9;
        border-radius: 10px;
        border: 2px solid #e0e0e0;
      }

      .bank-selection h4 {
        font-size: 1.2rem;
        color: #2c1810;
        margin-bottom: 1rem;
      }

      .bank-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
      }

      .bank-option {
        position: relative;
      }

      .bank-option input[type="radio"] {
        position: absolute;
        opacity: 0;
      }

      .bank-label {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
      }

      .bank-option input[type="radio"]:checked + .bank-label {
        border-color: var(--primary);
        background: rgba(182, 137, 91, 0.1);
        box-shadow: 0 4px 12px rgba(182, 137, 91, 0.2);
      }

      .bank-logo {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
        color: var(--primary);
        border: 1px solid #e0e0e0;
      }

      .bank-name {
        font-size: 1rem;
        font-weight: 600;
        color: #2c1810;
      }

      /* Virtual Account Display */
      .va-display {
        margin-top: 1.5rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, #2c1810 0%, #1a0f0a 100%);
        border-radius: 10px;
        color: white;
      }

      .va-display h4 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: var(--primary);
      }

      .va-number {
        font-size: 1.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        text-align: center;
        margin-bottom: 1rem;
      }

      .va-info {
        font-size: 0.95rem;
        color: #e0d0c0;
        line-height: 1.6;
      }

      .va-info p {
        margin-bottom: 0.5rem;
      }

      .va-info strong {
        color: var(--primary);
      }

      .order-item {
        display: flex;
        gap: 1.5rem;
        padding: 1.5rem 0;
        border-bottom: 1px solid #e0e0e0;
      }

      .order-item:last-child {
        border-bottom: none;
      }

      .order-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
      }

      .order-item-details {
        flex: 1;
      }

      .order-item-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: #2c1810;
        margin-bottom: 0.5rem;
      }

      .order-item-price {
        font-size: 1rem;
        color: #666;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      .order-item-quantity {
        background: rgba(182, 137, 91, 0.1);
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-weight: 600;
        color: var(--primary);
      }

      .order-summary {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 3px solid #e0e0e0;
      }

      .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        font-size: 1.1rem;
      }

      .summary-row.total {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary);
        padding-top: 1rem;
        border-top: 2px dashed #e0e0e0;
      }

      .checkout-btn {
        width: 100%;
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--primary) 0%, #a67a50 100%);
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 1.3rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        margin-top: 2rem;
        box-shadow: 0 8px 25px rgba(182, 137, 91, 0.4);
      }

      .checkout-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(182, 137, 91, 0.6);
      }

      .checkout-btn:disabled {
        background: #999;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
      }

      .empty-cart {
        text-align: center;
        padding: 4rem 2rem;
        color: #666;
      }

      .empty-cart i {
        width: 80px;
        height: 80px;
        color: #ccc;
        margin-bottom: 1rem;
      }

      .empty-cart h3 {
        font-size: 1.8rem;
        margin-bottom: 1rem;
        color: #2c1810;
      }

      .empty-cart a {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        background: var(--primary);
        color: white;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        margin-top: 1rem;
        transition: all 0.3s ease;
      }

      .empty-cart a:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(182, 137, 91, 0.4);
      }

      /* Receipt Modal */
      .receipt-modal {
        display: none;
        position: fixed;
        z-index: 10000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        align-items: center;
        justify-content: center;
      }

      .receipt-modal.active {
        display: flex;
      }

      .receipt-container {
        background: white;
        max-width: 500px;
        width: 90%;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        max-height: 90vh;
        overflow-y: auto;
      }

      .receipt-header {
        background: linear-gradient(135deg, var(--primary) 0%, #a67a50 100%);
        color: white;
        padding: 2rem;
        text-align: center;
      }

      .receipt-header h2 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
      }

      .receipt-header p {
        font-size: 1rem;
        opacity: 0.9;
      }

      .receipt-body {
        padding: 2rem;
      }

      .receipt-section {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px dashed #e0e0e0;
      }

      .receipt-section:last-child {
        border-bottom: none;
      }

      .receipt-section h3 {
        font-size: 1.3rem;
        color: #2c1810;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      .receipt-info-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.8rem;
        font-size: 1.05rem;
      }

      .receipt-info-label {
        color: #666;
        font-weight: 500;
      }

      .receipt-info-value {
        color: #2c1810;
        font-weight: 600;
        text-align: right;
      }

      .receipt-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.8rem;
        padding: 0.5rem 0;
      }

      .receipt-item-name {
        flex: 1;
        color: #2c1810;
        font-weight: 600;
      }

      .receipt-item-qty {
        color: #666;
        margin: 0 1rem;
      }

      .receipt-item-price {
        color: var(--primary);
        font-weight: 700;
      }

      .receipt-total {
        display: flex;
        justify-content: space-between;
        padding: 1rem;
        background: rgba(182, 137, 91, 0.1);
        border-radius: 10px;
        margin-top: 1rem;
      }

      .receipt-total-label {
        font-size: 1.3rem;
        font-weight: 700;
        color: #2c1810;
      }

      .receipt-total-value {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary);
      }

      .receipt-footer {
        padding: 2rem;
        background: #f9f9f9;
        text-align: center;
      }

      .receipt-actions {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
      }

      .receipt-btn {
        flex: 1;
        padding: 1rem;
        border: none;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
      }

      .receipt-btn-print {
        background: linear-gradient(135deg, var(--primary) 0%, #a67a50 100%);
        color: white;
      }

      .receipt-btn-print:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(182, 137, 91, 0.4);
      }

      .receipt-btn-close {
        background: #e74c3c;
        color: white;
      }

      .receipt-btn-close:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
      }

      .receipt-note {
        font-size: 0.95rem;
        color: #666;
        line-height: 1.6;
      }

      .receipt-qr {
        margin: 1.5rem 0;
        text-align: center;
      }

      .receipt-qr-placeholder {
        width: 150px;
        height: 150px;
        margin: 0 auto;
        background: #f0f0f0;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #999;
        font-size: 3rem;
      }

      .status-badge {
        display: inline-block;
        padding: 0.5rem 1.2rem;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.9rem;
        margin-top: 1rem;
      }

      .status-pending {
        background: #fff3cd;
        color: #856404;
        border: 2px solid #ffc107;
      }

      .status-completed {
        background: #d1e7dd;
        color: #0f5132;
        border: 2px solid #198754;
      }

      .payment-instruction-box p {
        margin-top: 1rem;
        padding: 1rem;
        border-radius: 8px;
        border-left: 4px solid;
      }

      .payment-instruction-box p {
        color: inherit;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      .payment-instruction-box i {
        width: 16px;
        height: 16px;
      }

      .instruction-cash {
        background: #fff3cd;
        border-left-color: #ffc107;
        color: #856404;
      }

      .instruction-online {
        background: #d1ecf1;
        border-left-color: #0dcaf0;
        color: #055160;
      }

      /* Success Notification */
      .success-notification {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        background: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        z-index: 10001;
        text-align: center;
        max-width: 400px;
        width: 90%;
        transition: transform 0.3s ease;
      }

      .success-notification.show {
        transform: translate(-50%, -50%) scale(1);
      }

      .success-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #4caf50 0%, #45a049 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        animation: scaleIn 0.5s ease;
      }

      .success-icon i {
        width: 40px;
        height: 40px;
        color: white;
      }

      @keyframes scaleIn {
        0% {
          transform: scale(0);
        }
        50% {
          transform: scale(1.2);
        }
        100% {
          transform: scale(1);
        }
      }

      .success-notification h3 {
        font-size: 1.8rem;
        color: #2c1810;
        margin-bottom: 1rem;
      }

      .success-notification p {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 1.5rem;
        line-height: 1.6;
      }

      .success-btn {
        padding: 0.8rem 2rem;
        background: linear-gradient(135deg, var(--primary) 0%, #a67a50 100%);
        color: white;
        border: none;
        border-radius: 30px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .success-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(182, 137, 91, 0.4);
      }

      .notification-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 10000;
      }

      .notification-overlay.show {
        display: block;
      }

      @media print {
        body * {
          visibility: hidden;
        }
        .receipt-container,
        .receipt-container * {
          visibility: visible;
        }
        .receipt-container {
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          max-height: none;
        }
        .receipt-footer {
          display: none;
        }
      }

      @media (max-width: 768px) {
        .checkout-container {
          grid-template-columns: 1fr;
          gap: 2rem;
        }

        .payment-methods {
          grid-template-columns: 1fr;
        }

        .bank-grid {
          grid-template-columns: 1fr;
        }

        .checkout-page {
          padding-top: 8rem;
        }

        .receipt-container {
          width: 95%;
        }

        .receipt-actions {
          flex-direction: column;
        }
      }

      @media (max-width: 450px) {
        .section-title {
          font-size: 1.6rem;
        }

        .payment-methods {
          grid-template-columns: 1fr;
        }

        .va-number {
          font-size: 1.4rem;
          letter-spacing: 1px;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar" x-data>
      <a href="index.html" class="navbar-logo">Beranda<span>Coffee</span>.</a>

      <div class="navbar-nav">
        <a href="index.html">Beranda</a>
        <a href="menu.html">Menu</a>
        <a href="products.html">Produk Kami</a>
        <a href="order-history.html">Riwayat Pesanan</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="shopping-cart-button">
          <i data-feather="shopping-cart"></i>
          <span
            class="quantity-badge"
            x-show="$store.cart.quantity"
            x-text="$store.cart.quantity"
          ></span>
        </a>
        <!-- Profile Button -->
        <div class="profile-dropdown">
          <button class="profile-btn" id="profile-button">
            <i data-feather="user"></i>
          </button>
          <div class="profile-dropdown-content" id="profile-dropdown">
            <div class="profile-info">
              <h4 id="profile-username">Guest User</h4>
              <p id="profile-email">guest@example.com</p>
            </div>
            <div class="profile-actions">
              <a href="#" class="profile-action-item logout" id="logout-btn">
                <i data-feather="log-out"></i>
                <span>Log Out</span>
              </a>
            </div>
          </div>
        </div>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>

    <!-- Checkout Page -->
    <section class="checkout-page" x-data="checkoutData()">
      <div class="checkout-container">
        <!-- Form Section -->
        <div class="checkout-section">
          <h2 class="section-title">
            <i data-feather="user"></i>
            Data Pemesan
          </h2>

          <form @submit.prevent="processCheckout">
            <div class="form-group">
              <label>Nama Lengkap <span>*</span></label>
              <input
                type="text"
                x-model="customerName"
                placeholder="Masukkan nama lengkap"
                required
              />
            </div>

            <div class="form-group">
              <label>Nomor Meja <span>*</span></label>
              <input
                type="text"
                x-model="tableNumber"
                placeholder="Contoh: 5"
                required
              />
            </div>

            <div class="form-group">
              <label>Nomor Telepon <span>*</span></label>
              <input
                type="tel"
                x-model="phoneNumber"
                placeholder="Contoh: 08123456789"
                required
              />
            </div>

            <div class="form-group">
              <label>Catatan Pesanan (Opsional)</label>
              <input
                type="text"
                x-model="orderNotes"
                placeholder="Contoh: Gula dikurangi, es banyak"
              />
            </div>

            <h2 class="section-title" style="margin-top: 3rem">
              <i data-feather="credit-card"></i>
              Metode Pembayaran
            </h2>

            <div class="payment-methods">
              <div class="payment-option">
                <input
                  type="radio"
                  id="cash"
                  name="payment"
                  value="Tunai"
                  x-model="paymentMethod"
                  @change="selectedBank = ''"
                  required
                />
                <label for="cash" class="payment-label">
                  <div class="payment-icon">
                    <i data-feather="dollar-sign"></i>
                  </div>
                  <span class="payment-name">Tunai</span>
                </label>
              </div>

              <div class="payment-option">
                <input
                  type="radio"
                  id="qris"
                  name="payment"
                  value="QRIS"
                  x-model="paymentMethod"
                  @change="selectedBank = ''"
                />
                <label for="qris" class="payment-label">
                  <div class="payment-icon">
                    <i data-feather="smartphone"></i>
                  </div>
                  <span class="payment-name">QRIS</span>
                </label>
              </div>

              <div class="payment-option">
                <input
                  type="radio"
                  id="transfer"
                  name="payment"
                  value="Transfer Bank"
                  x-model="paymentMethod"
                  @change="selectedBank = ''"
                />
                <label for="transfer" class="payment-label">
                  <div class="payment-icon">
                    <i data-feather="send"></i>
                  </div>
                  <span class="payment-name">Transfer Bank</span>
                </label>
              </div>
            </div>

            <!-- Bank Selection for Transfer -->
            <div
              x-show="paymentMethod === 'Transfer Bank'"
              class="bank-selection"
              x-transition
            >
              <h4>Pilih Bank untuk Transfer</h4>
              <div class="bank-grid">
                <div class="bank-option">
                  <input
                    type="radio"
                    id="bca-transfer"
                    value="BCA"
                    x-model="selectedBank"
                    @change="generateVirtualAccount()"
                  />
                  <label for="bca-transfer" class="bank-label">
                    <div class="bank-logo">BCA</div>
                    <span class="bank-name">BCA</span>
                  </label>
                </div>
                <div class="bank-option">
                  <input
                    type="radio"
                    id="mandiri-transfer"
                    value="Mandiri"
                    x-model="selectedBank"
                    @change="generateVirtualAccount()"
                  />
                  <label for="mandiri-transfer" class="bank-label">
                    <div class="bank-logo">MDR</div>
                    <span class="bank-name">Mandiri</span>
                  </label>
                </div>
                <div class="bank-option">
                  <input
                    type="radio"
                    id="bni-transfer"
                    value="BNI"
                    x-model="selectedBank"
                    @change="generateVirtualAccount()"
                  />
                  <label for="bni-transfer" class="bank-label">
                    <div class="bank-logo">BNI</div>
                    <span class="bank-name">BNI</span>
                  </label>
                </div>
                <div class="bank-option">
                  <input
                    type="radio"
                    id="bri-transfer"
                    value="BRI"
                    x-model="selectedBank"
                    @change="generateVirtualAccount()"
                  />
                  <label for="bri-transfer" class="bank-label">
                    <div class="bank-logo">BRI</div>
                    <span class="bank-name">BRI</span>
                  </label>
                </div>
              </div>

              <!-- Virtual Account Display -->
              <div x-show="selectedBank" class="va-display" x-transition>
                <h4>Virtual Account Number</h4>
                <div class="va-number" x-text="virtualAccountNumber"></div>
                <div class="va-info">
                  <p>Silakan transfer ke nomor Virtual Account di atas.</p>
                  <p>
                    Total:
                    <strong
                      x-text="$store.cart.rupiah($store.cart.total * 1.1)"
                    ></strong>
                  </p>
                  <p
                    style="
                      font-size: 0.85rem;
                      margin-top: 0.5rem;
                      color: #ffd700;
                    "
                  >
                    ⚠️ VA ini berlaku selama 24 jam
                  </p>
                </div>
              </div>
            </div>

            <button
              type="submit"
              class="checkout-btn"
              :disabled="!customerName || !tableNumber || !phoneNumber || !paymentMethod || $store.cart.items.length === 0 || (paymentMethod === 'Transfer Bank' && !selectedBank)"
            >
              <i data-feather="check-circle"></i>
              <span>Proses Pesanan</span>
            </button>
          </form>
        </div>
        <!-- Order Summary Section -->
        <div class="checkout-section">
          <h2 class="section-title">
            <i data-feather="shopping-bag"></i>
            Ringkasan Pesanan
          </h2>

          <template x-if="$store.cart.items.length === 0">
            <div class="empty-cart">
              <i data-feather="shopping-cart"></i>
              <h3>Keranjang Kosong</h3>
              <p>Belum ada item di keranjang Anda</p>
              <a href="menu.html">
                <i data-feather="arrow-left"></i>
                <span>Kembali ke Menu</span>
              </a>
            </div>
          </template>

          <template x-if="$store.cart.items.length > 0">
            <div>
              <div class="order-items">
                <template
                  x-for="(item, index) in $store.cart.items"
                  :key="index"
                >
                  <div class="order-item">
                    <img
                      :src="`img/${item.imgPath || 'products'}/${item.img}`"
                      :alt="item.name"
                    />
                    <div class="order-item-details">
                      <div class="order-item-name" x-text="item.name"></div>
                      <div class="order-item-price">
                        <span x-text="$store.cart.rupiah(item.price)"></span>
                        <span
                          class="order-item-quantity"
                          x-text="'x' + item.quantity"
                        ></span>
                      </div>
                    </div>
                    <div
                      style="font-weight: 700; color: var(--primary)"
                      x-text="$store.cart.rupiah(item.total)"
                    ></div>
                  </div>
                </template>
              </div>

              <div class="order-summary">
                <div class="summary-row">
                  <span>Subtotal</span>
                  <span x-text="$store.cart.rupiah($store.cart.total)"></span>
                </div>
                <div
                  class="summary-row"
                  style="color: #666; font-size: 0.95rem"
                >
                  <span>PPN/Pajak (10%)</span>
                  <span
                    x-text="$store.cart.rupiah($store.cart.total * 0.1)"
                  ></span>
                </div>
                <div class="summary-row total">
                  <span>Total Bayar</span>
                  <span
                    x-text="$store.cart.rupiah($store.cart.total * 1.1)"
                  ></span>
                </div>
                <div
                  style="
                    text-align: center;
                    margin-top: 1rem;
                    padding-top: 1rem;
                    border-top: 1px dashed #e0e0e0;
                  "
                >
                  <small style="color: #999; font-size: 0.9rem">
                    * Total sudah termasuk PPN 10%
                  </small>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </section>
    <!-- Receipt Modal -->
    <div class="receipt-modal" id="receiptModal">
      <div class="receipt-container" id="receiptContent">
        <div class="receipt-header">
          <h2>Beranda Coffee</h2>
          <p>Struk Pesanan</p>
        </div>

        <div class="receipt-body">
          <!-- Order Info -->
          <div class="receipt-section">
            <h3>
              <i data-feather="info"></i>
              Informasi Pesanan
            </h3>
            <div class="receipt-info-row">
              <span class="receipt-info-label">No. Pesanan:</span>
              <span class="receipt-info-value" id="receipt-order-number"></span>
            </div>
            <div class="receipt-info-row">
              <span class="receipt-info-label">Tanggal:</span>
              <span class="receipt-info-value" id="receipt-date"></span>
            </div>
            <div class="receipt-info-row">
              <span class="receipt-info-label">Waktu:</span>
              <span class="receipt-info-value" id="receipt-time"></span>
            </div>
          </div>

          <!-- Customer Info -->
          <div class="receipt-section">
            <h3>
              <i data-feather="user"></i>
              Data Pelanggan
            </h3>
            <div class="receipt-info-row">
              <span class="receipt-info-label">Nama:</span>
              <span
                class="receipt-info-value"
                id="receipt-customer-name"
              ></span>
            </div>
            <div class="receipt-info-row">
              <span class="receipt-info-label">No. Meja:</span>
              <span class="receipt-info-value" id="receipt-table-number"></span>
            </div>
            <div class="receipt-info-row">
              <span class="receipt-info-label">No. Telepon:</span>
              <span class="receipt-info-value" id="receipt-phone"></span>
            </div>
            <div
              class="receipt-info-row"
              id="receipt-notes-row"
              style="display: none"
            >
              <span class="receipt-info-label">Catatan:</span>
              <span class="receipt-info-value" id="receipt-notes"></span>
            </div>
          </div>

          <!-- Order Items -->
          <div class="receipt-section">
            <h3>
              <i data-feather="shopping-bag"></i>
              Detail Pesanan
            </h3>
            <div id="receipt-items-list"></div>

            <div
              style="
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid #e0e0e0;
              "
            >
              <div class="receipt-info-row">
                <span class="receipt-info-label">Subtotal:</span>
                <span class="receipt-info-value" id="receipt-subtotal"></span>
              </div>
              <div class="receipt-info-row" style="color: #666">
                <span class="receipt-info-label">PPN/Pajak (10%):</span>
                <span class="receipt-info-value" id="receipt-tax"></span>
              </div>
              <div
                style="
                  text-align: center;
                  margin-top: 0.5rem;
                  padding-top: 0.5rem;
                  border-top: 1px dashed #e0e0e0;
                "
              >
                <small style="color: #999; font-size: 0.85rem">
                  * Total pembayaran sudah termasuk PPN 10%
                </small>
              </div>
            </div>

            <div class="receipt-total">
              <span class="receipt-total-label">Total Bayar:</span>
              <span class="receipt-total-value" id="receipt-total"></span>
            </div>
          </div>

          <!-- Payment Info -->
          <div class="receipt-section">
            <h3>
              <i data-feather="credit-card"></i>
              Pembayaran
            </h3>
            <div class="receipt-info-row">
              <span class="receipt-info-label">Metode:</span>
              <span
                class="receipt-info-value"
                id="receipt-payment-method"
              ></span>
            </div>
            <div class="receipt-info-row">
              <span class="receipt-info-label">Status Pesanan:</span>
              <span class="receipt-info-value">
                <span id="receipt-status-badge" class="status-badge"></span>
              </span>
            </div>
            <div id="receipt-bank-info" style="display: none">
              <div class="receipt-info-row">
                <span class="receipt-info-label">Bank:</span>
                <span class="receipt-info-value" id="receipt-bank"></span>
              </div>
            </div>
            <div id="receipt-va-info" style="display: none">
              <div class="va-display" style="margin-top: 1rem">
                <h4>Virtual Account</h4>
                <div class="va-number" id="receipt-va-number"></div>
                <div class="va-info">
                  <p>
                    Silakan transfer sesuai nominal di atas ke Virtual Account
                    ini.
                  </p>
                  <p id="receipt-va-expiry"></p>
                </div>
              </div>
            </div>
            <div id="receipt-payment-instruction"></div>
          </div>

          <!-- QR Code for QRIS -->
          <div
            id="receipt-qr-section"
            class="receipt-section"
            style="display: none"
          >
            <h3 style="text-align: center">Scan QR Code</h3>
            <div class="receipt-qr">
              <div class="receipt-qr-placeholder">
                <i data-feather="maximize"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="receipt-footer">
          <div class="receipt-actions">
            <button
              class="receipt-btn receipt-btn-print"
              onclick="printReceipt()"
            >
              <i data-feather="printer"></i>
              <span>Cetak Struk</span>
            </button>
            <button
              class="receipt-btn receipt-btn-close"
              onclick="closeReceipt()"
            >
              <i data-feather="x-circle"></i>
              <span>Tutup</span>
            </button>
          </div>
          <p class="receipt-note">
            Terima kasih telah berbelanja di Beranda Coffee!<br />
            Selamat menikmati pesanan Anda.
          </p>
        </div>
      </div>
    </div>
    <!-- Success Notification -->
    <div class="notification-overlay" id="notificationOverlay"></div>
    <div class="success-notification" id="successNotification">
      <div class="success-icon">
        <i data-feather="check"></i>
      </div>
      <h3>Berhasil Disimpan!</h3>
      <p>Struk pesanan Anda telah berhasil disimpan ke Riwayat Pesanan</p>
      <button class="success-btn" onclick="closeSuccessNotification()">
        Lihat Riwayat Pesanan
      </button>
    </div>

    <!-- Footer -->
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
            <li><a href="index.html">Beranda</a></li>
            <li><a href="index.html#about">Tentang Kami</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="products.html">Produk Kami</a></li>
            <li><a href="index.html#contact">Kontak</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h3>Coffee Blogs</h3>
          <ul>
            <li><a href="https://coffeeland.co.id/">Coffee Land</a></li>
            <li>
              <a
                href="https://ottencoffee.co.id/brands/otten-coffee?categoryIds=%5B382%5D&page=1&msclkid=3ec953538edf1f658bef3a1a20752ed1"
                >Otten Coffee</a
              >
            </li>
            <li><a href="https://www.baristahustle.com/">Barista Hustle</a></li>
            <li><a href="https://sprudge.com/">Sprudge</a></li>
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

    <script>
      function checkoutData() {
        return {
          customerName: "",
          tableNumber: "",
          phoneNumber: "",
          orderNotes: "",
          paymentMethod: "Tunai",
          selectedBank: "",
          virtualAccountNumber: "",

          generateVirtualAccount() {
            const bankCode = {
              BCA: "014",
              Mandiri: "008",
              BNI: "009",
              BRI: "002",
            };

            const code = bankCode[this.selectedBank] || "000";
            const random = Math.floor(Math.random() * 1000000000000)
              .toString()
              .padStart(12, "0");
            this.virtualAccountNumber = code + random;
          },

          processCheckout() {
            const items = this.$store.cart.items;
            const subtotal = this.$store.cart.total;
            const tax = subtotal * 0.1;
            const total = subtotal + tax;

            // Generate order number
            const orderNumber = "BC" + Date.now().toString().slice(-8);

            // Generate current date and time
            const now = new Date();
            const dateStr = now.toLocaleDateString("id-ID", {
              day: "2-digit",
              month: "long",
              year: "numeric",
            });
            const timeStr = now.toLocaleTimeString("id-ID", {
              hour: "2-digit",
              minute: "2-digit",
              second: "2-digit",
            });

            // Generate VA if transfer
            if (this.paymentMethod === "Transfer Bank") {
              this.generateVirtualAccount();
            }

            // Fill receipt data
            document.getElementById("receipt-order-number").textContent =
              orderNumber;
            document.getElementById("receipt-date").textContent = dateStr;
            document.getElementById("receipt-time").textContent = timeStr;
            document.getElementById("receipt-customer-name").textContent =
              this.customerName;
            document.getElementById("receipt-table-number").textContent =
              this.tableNumber;
            document.getElementById("receipt-phone").textContent =
              this.phoneNumber;

            // Notes
            if (this.orderNotes) {
              document.getElementById("receipt-notes").textContent =
                this.orderNotes;
              document.getElementById("receipt-notes-row").style.display =
                "flex";
            } else {
              document.getElementById("receipt-notes-row").style.display =
                "none";
            }

            // Items list
            const itemsList = document.getElementById("receipt-items-list");
            itemsList.innerHTML = "";
            items.forEach((item) => {
              const itemDiv = document.createElement("div");
              itemDiv.className = "receipt-item";
              itemDiv.innerHTML = `
                <span class="receipt-item-name">${item.name}</span>
                <span class="receipt-item-qty">x${item.quantity}</span>
                <span class="receipt-item-price">${this.$store.cart.rupiah(
                  item.total
                )}</span>
              `;
              itemsList.appendChild(itemDiv);
            });

            // Totals
            document.getElementById("receipt-subtotal").textContent =
              this.$store.cart.rupiah(subtotal);
            document.getElementById("receipt-tax").textContent =
              this.$store.cart.rupiah(tax);
            document.getElementById("receipt-total").textContent =
              this.$store.cart.rupiah(total);

            // Payment method
            let paymentText = this.paymentMethod;
            if (this.selectedBank) {
              paymentText += " - " + this.selectedBank;
            }
            document.getElementById("receipt-payment-method").textContent =
              paymentText;

            // Payment instructions
            const instructionEl = document.getElementById(
              "receipt-payment-instruction"
            );
            const bankInfoEl = document.getElementById("receipt-bank-info");
            const vaInfoEl = document.getElementById("receipt-va-info");
            const qrSection = document.getElementById("receipt-qr-section");
            const statusBadge = document.getElementById("receipt-status-badge");

            // Reset displays
            bankInfoEl.style.display = "none";
            vaInfoEl.style.display = "none";
            qrSection.style.display = "none";

            // Set status badge and instructions based on payment method
            if (this.paymentMethod === "Tunai") {
              statusBadge.className = "status-badge status-pending";
              statusBadge.textContent = "Pending";

              instructionEl.innerHTML = `
                <div class="payment-instruction-box instruction-cash">
                  <p>
                    <i data-feather="alert-circle"></i>
                    Silakan menuju kasir dan tunjukkan struk ini untuk pembayaran tunai.
                  </p>
                </div>
                <div style="margin-top: 1rem; padding: 1rem; background: #fff3cd; border-radius: 8px; border-left: 4px solid #ffc107;">
                  <p style="color: #856404; font-size: 0.95rem; margin: 0;">
                    <strong>📌 Status: PENDING</strong><br>
                    Pesanan akan diproses setelah pembayaran di kasir selesai.
                  </p>
                </div>
              `;
            } else if (this.paymentMethod === "QRIS") {
              statusBadge.className = "status-badge status-completed";
              statusBadge.textContent = "Selesai";

              qrSection.style.display = "block";
              instructionEl.innerHTML = `
                <div class="payment-instruction-box instruction-online">
                  <p>
                    <i data-feather="smartphone"></i>
                    Scan QR Code di atas menggunakan aplikasi e-wallet Anda.
                  </p>
                </div>
                <div style="margin-top: 1rem; padding: 1rem; background: #d1e7dd; border-radius: 8px; border-left: 4px solid #198754;">
                  <p style="color: #0f5132; font-size: 0.95rem; margin: 0;">
                    <strong>✅ Status: SELESAI</strong><br>
                    Pembayaran melalui QRIS dianggap selesai. Pesanan Anda segera diproses!
                  </p>
                </div>
              `;
            } else if (this.paymentMethod === "Transfer Bank") {
              statusBadge.className = "status-badge status-completed";
              statusBadge.textContent = "Selesai";

              bankInfoEl.style.display = "block";
              vaInfoEl.style.display = "block";
              document.getElementById("receipt-bank").textContent =
                this.selectedBank;
              document.getElementById("receipt-va-number").textContent =
                this.virtualAccountNumber;

              const expiryDate = new Date(now.getTime() + 24 * 60 * 60 * 1000);
              const expiryStr = expiryDate.toLocaleString("id-ID", {
                day: "2-digit",
                month: "long",
                year: "numeric",
                hour: "2-digit",
                minute: "2-digit",
              });

              document.getElementById("receipt-va-expiry").innerHTML = `
                <strong style="color: #ffd700;">⚠️ Berlaku hingga: ${expiryStr}</strong>
              `;

              instructionEl.innerHTML = `
                <div class="payment-instruction-box instruction-online">
                  <p>
                    <i data-feather="send"></i>
                    Transfer ke Virtual Account di atas sesuai nominal total.
                  </p>
                </div>
                <div style="margin-top: 1rem; padding: 1rem; background: #d1e7dd; border-radius: 8px; border-left: 4px solid #198754;">
                  <p style="color: #0f5132; font-size: 0.95rem; margin: 0;">
                    <strong>✅ Status: SELESAI</strong><br>
                    Pembayaran melalui Transfer Bank dianggap selesai. Pesanan Anda segera diproses!
                  </p>
                </div>
              `;
            }

            // Show modal
            document.getElementById("receiptModal").classList.add("active");

            // Refresh feather icons
            setTimeout(() => {
              if (typeof feather !== "undefined") {
                feather.replace();
              }
            }, 100);

            // Clear cart after 2 seconds
            setTimeout(() => {
              this.$store.cart.clear();
            }, 2000);
          },
        };
      }

      function printReceipt() {
        // Save to order history before printing
        saveOrderHistory();

        // Show success notification
        showSuccessNotification();
      }

      function showSuccessNotification() {
        const overlay = document.getElementById("notificationOverlay");
        const notification = document.getElementById("successNotification");

        overlay.classList.add("show");
        notification.classList.add("show");

        // Refresh feather icons for the check icon
        if (typeof feather !== "undefined") {
          feather.replace();
        }
      }

      function closeSuccessNotification() {
        const overlay = document.getElementById("notificationOverlay");
        const notification = document.getElementById("successNotification");

        overlay.classList.remove("show");
        notification.classList.remove("show");

        // Redirect to order history
        window.location.href = "order-history.html";
      }

      function saveOrderHistory() {
        // Get existing order history from localStorage
        let orderHistory =
          JSON.parse(localStorage.getItem("berandaCoffeeOrderHistory")) || [];

        // Get current order data from receipt
        const paymentMethod = document.getElementById(
          "receipt-payment-method"
        ).textContent;

        // Determine status based on payment method
        let orderStatus = "Pending";
        if (
          paymentMethod.includes("Transfer Bank") ||
          paymentMethod.includes("QRIS")
        ) {
          orderStatus = "Completed";
        }

        const orderData = {
          orderNumber: document.getElementById("receipt-order-number")
            .textContent,
          date: document.getElementById("receipt-date").textContent,
          time: document.getElementById("receipt-time").textContent,
          customerName: document.getElementById("receipt-customer-name")
            .textContent,
          tableNumber: document.getElementById("receipt-table-number")
            .textContent,
          phoneNumber: document.getElementById("receipt-phone").textContent,
          notes: document.getElementById("receipt-notes").textContent || "",
          paymentMethod: paymentMethod,
          subtotal: document.getElementById("receipt-subtotal").textContent,
          tax: document.getElementById("receipt-tax").textContent,
          total: document.getElementById("receipt-total").textContent,
          items: [],
          status: orderStatus,
          timestamp: new Date().toISOString(),
        };

        // Get items from receipt
        const itemsList = document.querySelectorAll(
          "#receipt-items-list .receipt-item"
        );
        itemsList.forEach((item) => {
          const name = item.querySelector(".receipt-item-name").textContent;
          const qty = item.querySelector(".receipt-item-qty").textContent;
          const price = item.querySelector(".receipt-item-price").textContent;
          orderData.items.push({ name, qty, price });
        });

        // Add bank info if exists
        const bankInfo = document.getElementById("receipt-bank");
        if (bankInfo && bankInfo.textContent) {
          orderData.bank = bankInfo.textContent;
        }

        // Add VA info if exists
        const vaNumber = document.getElementById("receipt-va-number");
        if (vaNumber && vaNumber.textContent) {
          orderData.virtualAccount = vaNumber.textContent;
        }

        // Add to history (newest first)
        orderHistory.unshift(orderData);

        // Keep only last 50 orders
        if (orderHistory.length > 50) {
          orderHistory = orderHistory.slice(0, 50);
        }

        // Save to localStorage
        localStorage.setItem(
          "berandaCoffeeOrderHistory",
          JSON.stringify(orderHistory)
        );

        console.log("Order saved to history:", orderData);
        console.log("Status:", orderStatus);
      }

      function closeReceipt() {
        document.getElementById("receiptModal").classList.remove("active");
        setTimeout(() => {
          window.location.href = "index.html";
        }, 300);
      }

      // Close modal when clicking outside
      document
        .getElementById("receiptModal")
        ?.addEventListener("click", function (e) {
          if (e.target.id === "receiptModal") {
            closeReceipt();
          }
        });

      // Initialize feather icons
      document.addEventListener("DOMContentLoaded", function () {
        if (typeof feather !== "undefined") {
          feather.replace();
        }
      });
    </script>

    <script src="js/script.js"></script>
  </body>
</html>
