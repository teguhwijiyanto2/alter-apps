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
    <title>Sign Up - Alter</title>
  </head>

  <body>
    <div
      class="container min-vh-100 d-flex flex-column align-items-center justify-content-center"
    >
      <div class="bg__gradation">
        <h1 class="text-white text-center fw-bold">Sign Up</h1>
      </div>
      <div class="tab__container" style="margin-top: -30px">  
	  	  <?php
		  	$tab_email = "";
			$tab_phone = "";
			
		  if(isset($_GET['x']) && $_GET['x'] == 1) {
			$tab_email = "active";
			$tab_phone = "";
		  } //  if(isset($_GET['x']) && $_GET['x'] == 1) {
		  elseif(isset($_GET['x']) && $_GET['x'] == 2) {
			$tab_email = "";
			$tab_phone = "active";
			echo "<body onload=\"document.getElementById('tab_phone_opener').click();\">";
		  }
		  else{
			$tab_email = "active";
			$tab_phone = "";			  
		  }
			echo "	  
			<div
			  data-form='email'
			  class='tab__item cursor__pointer text-center p-2 ".$tab_email."'
			>
			  Email
			</div>
			<div
			  data-form='phone'
			  class='tab__item cursor__pointer text-center p-2 ".$tab_phone."'
			  id='tab_phone_opener'
			>
			  Phone Number
			</div>
			";
	    ?>
      </div>

      <form
        id="form-email"
        class="w-100 mt-4 needs-validation" novalidate
        action="send-otp-verification.php"
        style="display: block"
		method="POST"
      >
	  <input type="hidden" name="phone" value="-" />
        <div class="form__group">
          <label>Email</label>
          <div class="">
            <input
              class="text-input-auth invalid__form"
              type="email"
              name="email"
              placeholder="altermember@gmail.com"
              required
            />
			  <?php
			  if(isset($_GET['x']) && $_GET['x'] == 1) {
				echo "<div class='invalid__text mt-2'>Email is already used</div>";
			  } //  if(isset($_GET['x']) && $_GET['x'] == 1) {
				echo "<div class='invalid-feedback'>Please provide valid Email</div>";				  				  
			  ?>	
          </div>
        </div>				
        <div class="form__group mt-3">
          <label>Password</label>
          <!-- <div class="form__group-input invalid__form">
            <input type="password" name="password" placeholder="Password" />
            <i id="form-eyes" class="bi bi-eye-slash text-secondary"></i>
          </div>
          <div class="invalid__text mt-2">Must be 8 characters minimum</div> -->
          <div class="position-relative">
            <input
              class="text-input-auth invalid__form"
              type="password"
              name="password"
              placeholder="Password"
              required
            />
            <i
              id="form-eyes"
              class="bi bi-eye-slash text-secondary position-absolute"
              style="top: 12px; right: 12px"
            ></i>
            <div class="invalid-feedback">Please provide valid Password</div>
          </div>
        </div>
        <div
          class="d-flex flex-row align-items-center justify-content-between mt-4"
        >
		  <!--
          <div>
            <input
              class="form-check-input me-1 bg-transparent m-0 fs-5"
              type="checkbox"
              value=""
              id="firstCheckbox"
            />
            <label class="form-check-label text-white lh-1" for="firstCheckbox"
              >Remember me</label
            >
          </div>
          <a href="#" class="text-primary text-decoration-none"
            >Forgot Password?</a
          >
		  -->
        </div>		
        <input type="submit" class="btn btn-primary rounded-pill w-100 my-5" value="Sign Up">
      </form>

     <form
        id="form-phone"
        class="w-100 mt-4 needs-validation" novalidate
        action="email-verification.php"
        style="display: none"
		method="POST"
      >
		
       <div class="form__group">
          <label>Phone Number</label>
          <div class="">
            <input
              class="text-input-auth invalid__form"
              type="text"
              name="phone"
              placeholder="0876543210"
              required
            />
              <?php
			  if(isset($_GET['x']) && $_GET['x'] == 2) {
				echo "<div class='invalid__text mt-2'>Phone Number is already used</div>";
			  } //  if(isset($_GET['x']) && $_GET['x'] == 2) {
				echo "<div class='invalid-feedback'>Please provide valid Phone Number</div>";				  				  
			  ?>	
          </div>
        </div>				
        <div class="form__group mt-3">
          <label>Password</label>
          <!-- <div class="form__group-input invalid__form">
            <input type="password" name="password" placeholder="Password" />
            <i id="form-eyes" class="bi bi-eye-slash text-secondary"></i>
          </div>
          <div class="invalid__text mt-2">Must be 8 characters minimum</div> -->
          <div class="position-relative">
            <input
              class="text-input-auth invalid__form"
              type="password"
              name="password"
              placeholder="*****"
              required
            />
            <i
              id="form-eyes"
              class="bi bi-eye-slash text-secondary position-absolute"
              style="top: 12px; right: 12px"
            ></i>
            <div class="invalid-feedback">Please provide valid Password</div>
          </div>
        </div>		
		
        <div
          class="d-flex flex-row align-items-center justify-content-between mt-4"
        >
		  <!--
          <div>
            <input
              class="form-check-input me-1 bg-transparent m-0 fs-5"
              type="checkbox"
              value=""
              id="firstCheckbox"
            />
            <label class="form-check-label text-white lh-1" for="firstCheckbox"
              >Remember me</label
            >
          </div>
          <a href="#" class="text-primary text-decoration-none"
            >Forgot Password?</a
          >
		  -->
        </div>
        <input type="submit" class="btn btn-primary rounded-pill w-100 my-5" value="Sign Up">
      </form>
      <a
        href="login.php"
        class="text-primary text-decoration-none text-center mb-4"
        ><small
          >Already a member? <span class="fw-semibold">LOGIN</span></small
        ></a
      >
    </div>

		<script>	
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function () {
		  'use strict'

		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.querySelectorAll('.needs-validation')

		  // Loop over them and prevent submission
		  Array.prototype.slice.call(forms)
			.forEach(function (form) {
			  form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
				  event.preventDefault()
				  event.stopPropagation()
				}

				form.classList.add('was-validated')
			  }, false)
			})
		})()	 
		</script>
		
  </body>
</html>
