<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <script src="js/script.js"></script>
    <title>Shophub - Alter</title>
  </head>

  <body>
    <div class="container">
      <div class="w-100 pt-4">
        <!-- Top Bar Start -->
        <div class="d-flex flex-row align-items-center w-100 gap-1">
          <div
            class="d-flex flex-fill flex-row align-items-center border border-secondary rounded-pill px-3 py-1 gap-3"
          >
            <i class="bi bi-search fs-4 text-secondary"></i>
            <input
              placeholder="Search for shop items"
              class="bg-transparent border-0 w-100 text-light"
            />
          </div>
		  
          <a href="chat-list.php" class="position-relative">
            <img
              src="assets//icon/ic__bubble-chat.svg"
              height="36"
              width="36"
            />
            <span
              class="position-absolute translate-middle badge rounded-pill bg-primary"
              style="top: 4px; left: 30px"
            >
              3
              <span class="visually-hidden">unread messages</span>
            </span>
          </a>
		  
          <a href="notification.php" class="position-relative">
            <img src="assets//icon/ic__bell.svg" height="36" width="36" />
			<!--
            <span
              class="position-absolute translate-middle badge rounded-pill bg-primary"
              style="top: 4px; left: 30px"
            >
              3
              <span class="visually-hidden">cart item</span>
            </span>
			-->
          </a>
		  
        </div>
        <!-- Top Bar End -->

        <!-- Banner Carousel Start -->
        <div
          id="carouselExampleIndicators"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-indicators" style="bottom: -40px">
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner mt-4">
            <div class="carousel-item active">
              <img
                src="banner_files/shophub/Banner-App-09.jpg"
                class="d-block w-100 rounded-4 p-1"
                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img
                src="banner_files/shophub/Banner-App-10.jpg"
                class="d-block w-100 rounded-4 p-1"
                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img
                src="banner_files/shophub/Banner-App-12.jpg"
                class="d-block w-100 rounded-4 p-1"
                alt="..."
              />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- Banner Carousel End -->

        <!-- Shop By Games Start -->
        <section id="shop-games__section" class="mt-5">
          <div
            class="d-flex flex-row align-items-center justify-content-between"
          >
            <h4>Shop by Games</h4>
            <a href="#" class="text-decoration-none">
              <i class="bi bi-chevron-right fs-4"></i>
            </a>
          </div>

          <div class="row g-3 pt-2">
            <div class="col-4">
              <img
                src="https://placehold.co/400x400.png"
                alt=""
                class="w-100 h-100 ratio-1x1 object-fit-cover rounded-3"
              />
            </div>
            <div class="col-4">
              <img
                src="https://placehold.co/400x400.png"
                alt=""
                class="w-100 ratio-1x1 object-fit-cover rounded-3"
              />
            </div>
            <div class="col-4">
              <img
                src="https://placehold.co/400x400.png"
                alt=""
                class="w-100 ratio-1x1 object-fit-cover rounded-3"
              />
            </div>
          </div>
        </section>
        <!-- Shop By Games End -->

        <!-- Shop by Category Start -->
        <section id="shop-category__section" class="mt-5">
          <div class="mt-5">
            <div
              class="d-flex flex-row align-items-center justify-content-between"
            >
              <h4>Shop by Category</h4>
              <a
                href="shophub__more-category.php"
                class="text-decoration-none"
              >
                <i class="bi bi-chevron-right fs-4"></i>
              </a>
            </div>

            <div class="row mt-2 g-3">
              <div class="col-6">
                <a
                  href="#"
                  class="bg-dark rounded-3 p-3 d-flex flex-row align-items-center gap-3"
                  style="min-height: 96px"
                >
                  <img
                    src="assets/icon/ic__shop-console.png"
                    alt="Top Up"
                    height="46"
                    width="46"
                  />
                  <span class="fs-5">Top Up Game</span>
                </a>
              </div>
              <div class="col-6">
                <a
                  href="#"
                  class="bg-dark rounded-3 p-3 d-flex flex-row align-items-center gap-3"
                  style="min-height: 96px"
                >
                  <img
                    src="assets/icon/ic__shop-key.png"
                    alt="Top Up"
                    height="46"
                    width="46"
                  />
                  <span class="fs-5">Voucher & Game Key</span>
                </a>
              </div>
              <div class="col-6">
                <a
                  href="#"
                  class="bg-dark rounded-3 p-3 d-flex flex-row align-items-center gap-3"
                  style="min-height: 96px"
                >
                  <img
                    src="assets/icon/ic__shop-user.png"
                    alt="Top Up"
                    height="46"
                    width="46"
                  />
                  <span class="fs-5">Account</span>
                </a>
              </div>
              <div class="col-6">
                <a
                  href="#"
                  class="bg-dark rounded-3 p-3 d-flex flex-row align-items-center gap-3"
                  style="min-height: 96px"
                >
                  <img
                    src="assets/icon/ic__shop-dollar.png"
                    alt="Top Up"
                    height="46"
                    width="46"
                  />
                  <span class="fs-5">Game Coin</span>
                </a>
              </div>
              <div class="col-6">
                <a
                  href="#"
                  class="bg-dark rounded-3 p-3 d-flex flex-row align-items-center gap-3"
                  style="min-height: 96px"
                >
                  <img
                    src="assets/icon/ic__shop-shield.png"
                    alt="Top Up"
                    height="46"
                    width="46"
                  />
                  <span class="fs-5">Items</span>
                </a>
              </div>
              <div class="col-6">
                <a
                  href="#"
                  class="bg-dark rounded-3 p-3 d-flex flex-row align-items-center gap-3"
                  style="min-height: 96px"
                >
                  <img
                    src="assets/icon/ic__shop-mobile.png"
                    alt="Top Up"
                    height="46"
                    width="46"
                  />
                  <span class="fs-5">Mobile Data</span>
                </a>
              </div>
            </div>
          </div>
        </section>
        <!-- Shop by Category End -->
      </div>
    </div>

    <!-- Popular Start -->
    <section id="popular__section" class="mt-5">
      <div
        class="d-flex px-3 flex-row align-items-center justify-content-between"
      >
        <h4>Popular</h4>
        <a href="shophub__popular.php" class="text-decoration-none">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>

      <div
        class="bg__violet py-4 d-flex flex-row align-items-cemter gap-3 mt-3"
      >
        <div class="">
          <img
            src="assets/img/shop__promo-keqing.png"
            class="object-fit-contain h-100 ms-3"
            width="150"
            alt=""
          />
        </div>
        <div
          class="flex-fill d-inline overflow-x-scroll overflow-y-hidden"
          style="white-space: nowrap"
        >
          <a
            href="shophub__product-details.php"
            class="bg-dark rounded-3 d-inline-block h-100 overflow-hidden me-2"
            style="width: 200px"
          >
            <img
              src="https://placehold.co/200x150.png"
              class="object-fit-cover w-100"
              height="130"
              alt=""
            />
            <div class="p-3">
              <h5 class="mb-0">3270+400 Gems</h5>
              <span class="text-secondary fs__7">Rp 360.000</span>
              <div class="text-primary fs-5">Rp 380.000</div>
            </div>
          </a>
          <a
            href="#"
            class="bg-dark rounded-3 d-inline-block h-100 overflow-hidden me-2"
            style="width: 200px"
          >
            <img
              src="https://placehold.co/200x150.png"
              class="object-fit-cover w-100"
              height="130"
              alt=""
            />
            <div class="p-3">
              <h5 class="mb-0">3270+400 Gems</h5>
              <span class="text-secondary fs__7">Rp 360.000</span>
              <div class="text-primary fs-5">Rp 380.000</div>
            </div>
          </a>
          <div
            class="bg-dark rounded-3 d-inline-block h-100 overflow-hidden me-2"
            style="width: 200px"
          >
            <img
              src="https://placehold.co/200x150.png"
              class="object-fit-cover w-100"
              height="130"
              alt=""
            />
            <div class="p-3">
              <h5 class="mb-0">3270+400 Gems</h5>
              <span class="text-secondary fs__7">Rp 360.000</span>
              <div class="text-primary fs-5">Rp 380.000</div>
            </div>
          </div>
        </div>
      </div>

      <div
        class="bg__dark-yellow py-4 d-flex flex-row align-items-cemter gap-3"
      >
        <div class="">
          <img
            src="assets/img/shop__promo-cashback.png"
            class="object-fit-contain h-100 ms-3"
            width="150"
            alt=""
          />
        </div>
        <div
          class="flex-fill d-inline overflow-x-scroll overflow-y-hidden"
          style="white-space: nowrap"
        >
          <a
            href="#"
            class="bg-dark rounded-3 d-inline-block h-100 overflow-hidden me-2"
            style="width: 200px"
          >
            <img
              src="https://placehold.co/200x150.png"
              class="object-fit-cover w-100"
              height="130"
              alt=""
            />
            <div class="p-3">
              <h5 class="mb-0">2010 Diamonds</h5>
              <span class="text-secondary fs__7">Rp 360.000</span>
              <div class="text-primary fs-5">Rp 380.000</div>
            </div>
          </a>
          <a
            href="#"
            class="bg-dark rounded-3 d-inline-block h-100 overflow-hidden me-2"
            style="width: 200px"
          >
            <img
              src="https://placehold.co/200x150.png"
              class="object-fit-cover w-100"
              height="130"
              alt=""
            />
            <div class="p-3">
              <h5 class="mb-0">2010 Diamonds</h5>
              <span class="text-secondary fs__7">Rp 360.000</span>
              <div class="text-primary fs-5">Rp 380.000</div>
            </div>
          </a>
          <a
            href="#"
            class="bg-dark rounded-3 d-inline-block h-100 overflow-hidden me-2"
            style="width: 200px"
          >
            <img
              src="https://placehold.co/200x150.png"
              class="object-fit-cover w-100"
              height="130"
              alt=""
            />
            <div class="p-3">
              <h5 class="mb-0">2010 Diamonds</h5>
              <span class="text-secondary fs__7">Rp 360.000</span>
              <div class="text-primary fs-5">Rp 380.000</div>
            </div>
          </a>
        </div>
      </div>
    </section>
    <!-- Popular End -->

    <!-- Navbar Start -->
    <div style="height: 120px"></div>
    <nav
      class="navbar fixed-bottom max-w-sm navbar-expand-lg bg-dark shadow p-0"
    >
      <div class="container">
        <div class="flex-grow-1" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto d-flex flex-row">
            <li class="nav-item w-100 text-center">
              <a
                class="nav-link py-2 text-secondary"
                aria-current="page"
                href="home.php"
              >
                <img src="assets/icon/ic__nav-home.svg" class="mb-1" />
                <div>Home</div>
              </a>
            </li>
            <li class="nav-item w-100 text-center">
              <a
                class="nav-link py-2 text-secondary"
                aria-current="page"
                href="tournament.php"
              >
                <img src="assets/icon/ic__nav-tournament.svg" class="mb-1" />
                <div>Tournament</div>
              </a>
            </li>
            <li class="nav-item w-100 text-center">
              <a
                class="nav-link py-2 text-secondary"
                aria-current="page"
                href="timeline.php"
              >
                <img src="assets/icon/ic__nav-timeline.svg" class="mb-1" />
                <div>Timeline</div>
              </a>
            </li>
            <li class="nav-item w-100 text-center">
              <a
                class="nav-link py-2 text-secondary active"
                aria-current="page"
                href="shophub.php"
              >
                <img src="assets/icon/ic__nav-shophub.svg" class="mb-1" />
                <div>ShopHub</div>
              </a>
            </li>
            <li class="nav-item w-100 text-center">
              <a
                class="nav-link py-2 text-secondary"
                aria-current="page"
                href="account.php"
              >
                <img src="assets/icon/ic__nav-profile.svg" class="mb-1" />
                <div>Account</div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
  </body>
</html>
