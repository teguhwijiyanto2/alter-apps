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
    <title>Profile Setup - Alter</title>
  </head>

  <body>
    <div
      class="container min-vh-100 d-flex flex-column align-items-center justify-content-center"
    >
      <div class="bg__gradation">
        <h1 class="text-white text-center fw-bold">Profile Set Up</h1>
      </div>

      <form
        action="profile-setup-process.php"
        class="w-100"
        style="display: block; margin-top: -60px"
		method="POST"
      >
        <div class="form__group">
          <label>Full Name</label>
          <div class="form__group-input">
            <input type="text" name="name" placeholder="Alter Member" />
          </div>
        </div>
        <div class="form__group mt-3">
          <label>Username</label>
          <div class="form__group-input">
            <input type="text" name="username" placeholder="altermember72" />
          </div>
        </div>
        <div class="form__group mt-3">
          <label>Gender</label>
          <select
            class="form-select form__group-select"
            aria-label="Default select example"
			name="selGender"
          >
            <option selected>Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="form__group mt-3">
          <label>Date of Birth</label>
          <div class="form__group-input">
            <input type="date" name="birthdate" />
          </div>
        </div>
        <input type="submit" class="btn btn-primary rounded-pill w-100 my-5" value="Next">
      </form>
	  <!--
      <a href="#" class="text-primary text-decoration-none text-center mb-4"
        ><small>Contact Us</small></a
      >
	  -->
    </div>
  </body>
</html>
