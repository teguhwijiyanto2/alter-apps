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
    <title>Preferences - Alter</title>
  </head>

  <body>
    <div
      class="container min-vh-100 d-flex flex-column align-items-center justify-content-center"
    >
      <div class="bg__gradation">
        <h1 class="text-white text-center fw-bold">Let's Get to Know You</h1>
      </div>

      <form
        action="home.php"
        class="w-100"
        style="display: block; margin-top: -60px"
		method="POST"
      >
        <div class="form__group">
          <label for="">Pick your Favorite games</label>
          <div class="row g-3">
            <div class="col-4">
              <img
                src="img/games/mobile_legend.png"
                alt=""
                class="w-100 ratio-1x1 object-fit-cover rounded-2"
              />
            </div>
            <div class="col-4">
              <img
                src="img/games/dota_2.png"
                alt=""
                class="w-100 ratio-1x1 object-fit-cover rounded-2"
              />
            </div>
            <div class="col-4">
              <img
                src="img/games/pubg.png"
                alt=""
                class="w-100 ratio-1x1 object-fit-cover rounded-2"
              />
            </div>
            <div class="col-4">
              <img
                src="img/games/freefire.png"
                alt=""
                class="w-100 ratio-1x1 object-fit-cover rounded-2"
              />
            </div>
            <div class="col-4">
              <img
                src="img/games/aov.png"
                alt=""
                class="w-100 ratio-1x1 object-fit-cover rounded-2"
              />
            </div>
            <div class="col-4">
              <img
                src="img/games/apex_legend.png"
                alt=""
                class="w-100 ratio-1x1 object-fit-cover rounded-2"
              />
            </div>
          </div>
        </div>
        <div class="form__group mt-4">
          <label>How often do you play?</label>
          <select
            class="form-select form__group-select"
            aria-label="Default select example"
          >
            <option selected>Select</option>
            <option value="1">1 day in a week</option>
            <option value="1">2 days in a week</option>
			<option value="1">3 days in a week</option>
			<option value="1">4 days in a week</option>
			<option value="1">5 days in a week</option>
			<option value="1">6 days in a week</option>
			<option value="1">7 days in a week</option>
          </select>
        </div>
        <div class="form__group mt-3">
          <label>How many hours per day do you play?</label>
          <select
            class="form-select form__group-select"
            aria-label="Default select example"
          >
            <option selected>Select</option>
            <option value="1">Less than 1 hour</option>
            <option value="2">1-2 hours</option>
			<option value="2">3-5 hours</option>
			<option value="2">More than 5 hours</option>
          </select>
        </div>
        <input
          type="submit"
          class="btn btn-outline-light rounded-pill w-100 my-5"
		  value="Submit"
        >
      </form>
    </div>
  </body>
</html>
