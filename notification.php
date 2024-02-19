<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';
$id = $_SESSION["session_usr_id"];


$results = DB::query("SELECT * FROM notification JOIN users ON notification.notif_from = users.id WHERE notif_for = %i ORDER BY created_date DESC", $id);

// print_r($results);
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
    <title>Notification | Alter</title>
  </head>

  <body>
    <section>
      <div class="container px-4">
        <div class="py-3">
          <a href="home.php">
            <i class="bi bi-x-lg fs-5 me-2"></i>
            <span>Notifications</span>
          </a>
        </div>

        <!-- Notif Tab Start -->
        <section class="sticky-top bg-black">
          <div class="row g-0">
            <div class="col-4">
              <div data-tab="account" class="up__tab-item active">Account</div>
            </div>
            <div class="col-4">
              <div data-tab="playorder" class="up__tab-item">Play Order</div>
            </div>
            <div class="col-4">
              <div data-tab="tournament" class="up__tab-item">Tournament</div>
            </div>
          </div>
        </section>
        <!-- Notif Tab End -->

        <!-- ========================================================== -->
        <!-- Tab Content Account Start -->
        <section id="account" class="tab__content d-block">
          <div class="">
            <h5 class="text-white pt-4">New</h5>
            <div aria-label="List New" class="">
              <!-- Single user liking a post -->
              <?php 
              
              foreach($results as $result) {
                $notificationTime = strtotime($result['created_date']);

                $currentTime = time();

                $timeDiff = $currentTime - $notificationTime;
                $timeAgo = '';

                if ($timeDiff < 3600) {
                    $minutes = round($timeDiff / 60);
                    $timeAgo = "$minutes Min";
                }
                elseif ($timeDiff < 86400) {
                    $hours = round($timeDiff / 3600);
                    $timeAgo = "$hours Hr";
                }
                else {
                    $days = round($timeDiff / 86400);
                    $timeAgo = "$days Day";
                }
                // print_r($result);
              ?>
              <?php if($result['category'] == 'post-like'){?>
                  <a href="">
                    <div
                      class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                    >
                      <img
                        src="https://placehold.co/50x50/FF00CC/FFFFFF?text=H"
                        alt=""
                        width="32"
                        height="32"
                        class="rounded-circle object-fit-cover"
                      />
                      <div class="flex__1 fs-7">
                        <b><?= $result['name'] ?></b>
                        <span> <?= $result['title'] ?></span>
                        <span class="text-secondary"><?= $timeAgo ?></span>
                      </div>
                    </div>
                  </a>
              <?php } if($result['category'] == 'play-order'){ ?>
                  <a href="">
                    <div
                      class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                    >
                      <img
                        src="https://placehold.co/50x50/FF00CC/FFFFFF?text=H"
                        alt=""
                        width="32"
                        height="32"
                        class="rounded-circle object-fit-cover"
                      />
                      <div class="flex__1 fs-7">
                        <span>Incoming order from <b><?= ucfirst($result['name']) ?></b></span>
                        <span class="text-secondary"><?= $timeAgo ?></span>
                      </div>
                    </div>
                  </a>
              <?php } if($result['category'] == 'follow'){ ?>
                  <a href="">
                    <div
                      class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                    >
                      <img
                        src="https://placehold.co/50x50/FF00CC/FFFFFF?text=H"
                        alt=""
                        width="32"
                        height="32"
                        class="rounded-circle object-fit-cover"
                      />
                      <div class="flex__1 fs-7">
                        <span><b><?= ucfirst($result['name']) ?></b> started following you.</span>
                        <span class="text-secondary"><?= $timeAgo ?></span>
                      </div>
                      <a href="follow-process.php?fid=<?= $result['notif_from'] ?>" class="btn btn-primary btn-sm py-1 px-4 rounded-3">
                        Follow
                      </a>
                    </div>
                  </a>
              <?php }} ?>
            </div>
          </div>
        </section>
        <!-- Tab Content Account End -->
        <!-- ========================================================== -->

        <!-- ========================================================== -->
        <!-- Tab Content Play Order Start -->
        <section id="playorder" class="tab__content">
          <div class="">
            <h5 class="text-white pt-4">New</h5>
            <div aria-label="List New" class="">
              <!-- Incoming order -->
              <a href="notif-order-details.html">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <img
                    src="https://placehold.co/50x50/FF00CC/FFFFFF?text=H"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle object-fit-cover"
                  />
                  <div class="flex__1 fs-7">
                    <span>Incoming order from</span>
                    <b>Johnee. </b>
                    <span class="text-secondary">1 hr</span>
                  </div>
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
            </div>
          </div>
          <div>
            <h5 class="text-white pt-4">Today</h5>
            <div>
              <!-- Cancelled order -->
              <a href="">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <img
                    src="https://placehold.co/50x50/F1FECC/000000?text=J"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle object-fit-cover"
                  />
                  <div class="flex__1 fs-7">
                    <b>Johnee. </b>
                    <span>cancelled their order. </span>
                    <span class="text-secondary">4 hr</span>
                  </div>
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
            </div>
          </div>
          <div>
            <h5 class="text-white pt-4">Last 7 days</h5>
            <div>
              <!-- Cancelled order -->
              <a href="">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <img
                    src="https://placehold.co/50x50/F1FECC/000000?text=J"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle object-fit-cover"
                  />
                  <div class="flex__1 fs-7">
                    <b>Johnee. </b>
                    <span>cancelled their order. </span>
                    <span class="text-secondary">4 hr</span>
                  </div>
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
              <!-- Cancelled order -->
              <a href="">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <img
                    src="https://placehold.co/50x50/F1FECC/000000?text=J"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle object-fit-cover"
                  />
                  <div class="flex__1 fs-7">
                    <b>Johnee. </b>
                    <span>cancelled their order. </span>
                    <span class="text-secondary">4 hr</span>
                  </div>
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
              <!-- Cancelled order -->
              <a href="">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <img
                    src="https://placehold.co/50x50/F1FECC/000000?text=J"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle object-fit-cover"
                  />
                  <div class="flex__1 fs-7">
                    <b>Johnee. </b>
                    <span>cancelled their order. </span>
                    <span class="text-secondary">4 hr</span>
                  </div>
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
            </div>
          </div>
        </section>
        <!-- Tab Content Play Order End -->
        <!-- ========================================================== -->

        <!-- ========================================================== -->
        <!-- Tab Content Tournament Start -->
        <section id="tournament" class="tab__content">
          <div class="">
            <h5 class="text-white pt-4">New</h5>
            <div aria-label="List">
              <!-- A player joining your tournament -->
              <a href="notif-tournament-details.html">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <img
                    src="https://placehold.co/50x50/FF00CC/FFFFFF?text=H"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle object-fit-cover"
                  />
                  <div class="flex__1 fs-7">
                    <b>Johnee</b>
                    <span>are joining your tournament. </span>
                    <span class="text-secondary">1 hr</span>
                    <div class="text-secondary fw-semibold mt-1">
                      Fun Match with Genesis
                    </div>
                  </div>
                  <img
                    src="https://placehold.co/100x100.png"
                    alt=""
                    width="58"
                    height="58"
                    class="object-fit-cover rounded-3"
                  />
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
              <!-- A team joining your tournament -->
              <a href="notif-tournament-details.html">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <div class="position-relative px-3">
                    <img
                      src="assets/ilustration/ilus__notif-stack-user.png"
                      alt=""
                      width="24"
                      height="24"
                      class="rounded-circle object-fit-cover position-absolute start-0"
                      style="bottom: -5px"
                    />
                    <img
                      src="https://placehold.co/50x50/DD20CC/FFFFFF?text=J"
                      alt=""
                      width="24"
                      height="24"
                      class="rounded-circle object-fit-cover position-absolute end-0"
                      style="top: -5px"
                    />
                  </div>
                  <div class="flex__1 fs-7">
                    <span>A team is participating in your tournament. </span>
                    <span class="text-secondary">1 hr</span>
                    <div class="text-secondary fw-semibold mt-1">
                      Fun Match with Genesis
                    </div>
                  </div>
                  <img
                    src="https://placehold.co/100x100.png"
                    alt=""
                    width="58"
                    height="58"
                    class="object-fit-cover rounded-3"
                  />
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
            </div>
          </div>
          <div class="">
            <h5 class="text-white pt-4">Today</h5>
            <div aria-label="List">
              <!-- A player withdraw your tournament -->
              <a href="">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <img
                    src="https://placehold.co/50x50/FF00CC/FFFFFF?text=H"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle object-fit-cover"
                  />
                  <div class="flex__1 fs-7">
                    <b>Johnee</b>
                    <span>withdraw from your tournament. </span>
                    <span class="text-secondary">1 hr</span>
                    <div class="text-secondary fw-semibold mt-1">
                      Fun Match with Genesis
                    </div>
                  </div>
                  <img
                    src="https://placehold.co/100x100.png"
                    alt=""
                    width="58"
                    height="58"
                    class="object-fit-cover rounded-3"
                  />
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
            </div>
          </div>
          <div class="">
            <h5 class="text-white pt-4">Last 7 days</h5>
            <div aria-label="List">
              <!-- A player joining your tournament -->
              <a href="">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <img
                    src="https://placehold.co/50x50/FF00CC/FFFFFF?text=H"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle object-fit-cover"
                  />
                  <div class="flex__1 fs-7">
                    <b>Johnee</b>
                    <span>are joining your tournament. </span>
                    <span class="text-secondary">1 hr</span>
                    <div class="text-secondary fw-semibold mt-1">
                      Fun Match with Genesis
                    </div>
                  </div>
                  <img
                    src="https://placehold.co/100x100.png"
                    alt=""
                    width="58"
                    height="58"
                    class="object-fit-cover rounded-3"
                  />
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
              <!-- A team joining your tournament -->
              <a href="">
                <div
                  class="d-flex flex-row align-items-center gap-3 border-bottom border-dark py-3"
                >
                  <div class="position-relative px-3">
                    <img
                      src="assets/ilustration/ilus__notif-stack-user.png"
                      alt=""
                      width="24"
                      height="24"
                      class="rounded-circle object-fit-cover position-absolute start-0"
                      style="bottom: -5px"
                    />
                    <img
                      src="https://placehold.co/50x50/DD20CC/FFFFFF?text=J"
                      alt=""
                      width="24"
                      height="24"
                      class="rounded-circle object-fit-cover position-absolute end-0"
                      style="top: -5px"
                    />
                  </div>
                  <div class="flex__1 fs-7">
                    <span>A team is participating in your tournament. </span>
                    <span class="text-secondary">1 hr</span>
                    <div class="text-secondary fw-semibold mt-1">
                      Fun Match with Genesis
                    </div>
                  </div>
                  <img
                    src="https://placehold.co/100x100.png"
                    alt=""
                    width="58"
                    height="58"
                    class="object-fit-cover rounded-3"
                  />
                  <i class="bi bi-chevron-right fs-5"></i>
                </div>
              </a>
            </div>
          </div>
        </section>
        <!-- Tab Content Tournament End -->
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
    </script>
  </body>
</html>
