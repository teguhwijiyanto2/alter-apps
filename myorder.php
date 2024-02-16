<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';


?>


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
    <title>My Order - Order Management</title>
  </head>

  <body>
    <section>
      <div class="">
        <div class="py-3 px-4">
          <a href="account.php">
            <i class="bi bi-x-lg fs-5 me-2"></i>
            <span>Order Management</span>
          </a>
        </div>

        <!--  Tab Start -->
        <section class="sticky-top bg-black">
          <div class="row g-0">
            <div class="col-4">
              <div data-tab="play" class="up__tab-item active">Play</div>
            </div>
            <div class="col-4">
              <div data-tab="tournament" class="up__tab-item">Tournament</div>
            </div>
            <div class="col-4">
              <div data-tab="shophub" class="up__tab-item">ShopHub</div>
            </div>
          </div>
        </section>
        <!--  Tab End -->

        <!-- ========================================================== -->
        <!-- Tab Content Play Start -->
        <section id="play" class="tab__content px-3 d-block">
          <!-- Dropdown -->
          <div class="dropdown mt-3" data-bs-theme="dark">
            <button
              class="btn btn-secondary btn-sm py-1 px-3 dropdown-toggle"
              type="button"
              id='btn-filter-play'
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Upcoming
            </button>
            <ul class="dropdown-menu bg-dark">
              <li onclick="showPlayOrder('Upcoming')"><span class="dropdown-item"  >Upcoming</span></li>
              <li onclick="showPlayOrder('Finished')"> <span class="dropdown-item" >Finished</span></li>
            </ul>
          </div>

          <!-- List -->
          <div class="list-play__wrapper d-flex flex-column gap-3 mt-3" id="playBox">
            
          </div>
        </section>
        <!-- Tab Content Play End -->
        <!-- ========================================================== -->

        <!-- ========================================================== -->
        <!-- Tab Content Tournament Start -->
        <section id="tournament" class="tab__content px-3">
          <!-- dropdown -->
          <div class="dropdown mt-3" data-bs-theme="dark">
            <button
              class="btn btn-secondary btn-sm py-1 px-3 dropdown-toggle"
              type="button"
              id='btn-filter-tou'
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Upcoming
            </button>
            <ul class="dropdown-menu bg-dark">
              <li onclick="showTourOrder('Upcoming')"><span class="dropdown-item"  >Upcoming</span></li>
              <li onclick="showTourOrder('Finished')"> <span class="dropdown-item" >Finished</span></li>
            </ul>
          </div>

          <!-- list -->
          <div class="list-tournament__wrapper" id="tourBox">
            
          </div>
        </section>
        <!-- Tab Content Tournament End -->
        <!-- ========================================================== -->

        <!-- ========================================================== -->
        <!-- Tab Content ShopHub Start -->
        <section id="shophub" class="tab__content px-3">
          <!-- Dropdown -->
          <div class="d-flex flex-row align-items-center gap-2">
            <div class="dropdown mt-3" data-bs-theme="dark">
              <button
                class="btn btn-secondary btn-sm py-1 px-3 dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                All Status
              </button>
              <ul class="dropdown-menu bg-dark">
                <li><a class="dropdown-item" href="#">All Status</a></li>
                <li><a class="dropdown-item" href="#">Finished</a></li>
                <li><a class="dropdown-item" href="#">Unsuccessful</a></li>
              </ul>
            </div>

            <div class="dropdown mt-3" data-bs-theme="dark">
              <button
                class="btn btn-secondary btn-sm py-1 px-3 dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                All Date
              </button>
              <ul class="dropdown-menu bg-dark">
                <li><a class="dropdown-item" href="#">All Date</a></li>
                <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
              </ul>
            </div>
          </div>

          <!-- Search -->
          <div class="input-group mt-3 mb-3">
            <button
              class="btn btn-outline-secondary py-1"
              type="button"
              id="button-addon2"
            >
              <i class="bi bi-search"></i>
            </button>
            <input
              type="text"
              class="form-control bg-black text-light"
              placeholder="Search for transactions"
            />
          </div>

          <!-- List -->
          <div class="list-play__wrapper d-flex flex-column gap-3 mt-3">
            <div class="list-play__item bg-dark rounded-3 overflow-hidden">
              <div class="opacity-100">
                <div
                  class="float-end bg__violet py-1 px-3 fs-8"
                  style="border-bottom-left-radius: 10px"
                >
                  Successful
                </div>
                <div class="d-flex flex-row align-items-center gap-2 p-3">
                  <img
                    src="assets/img/shopbuy__genshin-voucher.png"
                    width="48"
                    height="48"
                    class="rounded-2 object-fit-contain"
                  />
                  <div>
                    <div>1x Blessing of the...</div>
                    <div class="text-secondary fs-8">Genshin Impact</div>
                  </div>
                </div>
                <div class="px-3">
                  <div
                    class="d-flex flex-row align-items-center justify-content-between text-secondary"
                  >
                    <span>Total Paid</span>
                    <span class="text-light fs-5">Rp 50.000</span>
                  </div>
                  <div
                    class="d-flex flex-row align-items-center justify-content-between text-secondary"
                  >
                    <span>Payment Method</span>
                    <span class="text-light fs-5">Alter Wallet</span>
                  </div>
                  <div
                    class="d-flex flex-row align-items-center justify-content-between text-secondary"
                  >
                    <span>Purchase ID</span>
                    <span class="text-light fs-5">123971934810</span>
                  </div>
                </div>
              </div>
              <div class="p-3 d-flex flex-row align-items-center gap-3 mt-2">
                <button class="btn btn-primary btn-sm rounded-pill w-100 py-2">
                  Repurchase
                </button>
              </div>
            </div>
            <div class="list-play__item bg-dark rounded-3 overflow-hidden">
              <div class="opacity-100">
                <div
                  class="float-end bg__violet py-1 px-3 fs-8"
                  style="border-bottom-left-radius: 10px"
                >
                  Unsuccessful
                </div>
                <div class="d-flex flex-row align-items-center gap-2 p-3">
                  <img
                    src="assets/img/shopbuy__genshin-voucher.png"
                    width="48"
                    height="48"
                    class="rounded-2 object-fit-contain"
                  />
                  <div>
                    <div>1x Blessing of the...</div>
                    <div class="text-secondary fs-8">Genshin Impact</div>
                  </div>
                </div>
                <div class="px-3">
                  <div
                    class="d-flex flex-row align-items-center justify-content-between text-secondary"
                  >
                    <span>Total Paid</span>
                    <span class="text-light fs-5">Rp 50.000</span>
                  </div>
                  <div
                    class="d-flex flex-row align-items-center justify-content-between text-secondary"
                  >
                    <span>Payment Method</span>
                    <span class="text-light fs-5">Alter Wallet</span>
                  </div>
                </div>
              </div>
              <div class="p-3 d-flex flex-row align-items-center gap-3 mt-2">
                <button
                  class="btn btn-outline-light btn-sm rounded-pill w-100 py-2"
                >
                  Try Again
                </button>
              </div>
            </div>
          </div>
        </section>
        <!-- Tab Content ShopHub End -->
        <!-- ========================================================== -->
      </div>
    </section>

    <script>
      $(document).ready(function () {
        // Tab Click Content
        var tabsItem = $(".up__tab-item");
        var tabsContent = $(".tab__content");
        tabsItem.on("click", function () {
          var tabId = $(this).data("tab");
          tabsItem.removeClass("active");
          $(this).addClass("active");
          tabsContent.removeClass("d-block");
          $(`#${tabId}`).addClass("d-block");
        });
      });

      $(document).ready(function () {
        showPlayOrder('Upcoming')
        showTourOrder('Upcoming')
      });

      function showPlayOrder(category) {
        $.ajax({
              url: "my-order-play-component.php",
              type: 'POST',
              cache: false,
              data: {  'categ': category},
              success: function(data) {
                  $('#btn-filter-play').text(category);
                  $('#playBox').html(data);
              }
          });
      }
      function showTourOrder(category) {
        $.ajax({
              url: "my-order-tournament-component.php",
              type: 'POST',
              cache: false,
              data: {  'categ': category},
              success: function(data) {
                  $('#btn-filter-tour').text(category);
                  $('#tourBox').html(data);
              }
          });
      }

    </script>
  </body>
</html>
