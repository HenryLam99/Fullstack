<?php  if(!isset($_SESSION["user_email"])){ ?>
<div class="modal fade" id="LoginModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation text-start" method="POST" novalidate="">              
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required="">
                    <label for="floatingInput">Email address</label>
                    <div class="invalid-feedback">
                      Valid email is required.
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required="">
                    <label for="floatingPassword">Password</label>
                    <div class="invalid-feedback">
                      Valid password is required.
                    </div>
                  </div>
                  <p>Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#SignUpModal">Sign up</a></p>
                  <button class="w-100 btn btn-lg btn-primary mb-3" name="submit" value="signin" type="submit">Sign in</button>
                </form>
              </div>
            </div>
          </div>
        </div>  
        <div class="modal fade" id="SignUpModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Sign up to see photos and videos from your friends.</p>
                <form class="needs-validation text-start" enctype="multipart/form-data" id="register" method="POST" novalidate="">             
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Email address</label>
                    <div class="invalid-feedback">
                      Valid email is required.
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$" required name="password" placeholder="Password">
                    <label for="password">Password</label>
                    <div class="invalid-feedback">
                    Password must be from 8 to 20 character. Reach password must contain at least 1 lower case letter, at least 1 upper case letter, at least 1 digit!
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="confirmpassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$" required name="confirmpassword" placeholder="Password" >
                    <label for="confirmpassword">Retype Password</label>
                    <div class="invalid-feedback">
                    Passwords Don't Match
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="image_post" class="form-label">Profile picture</label>
                    <input class="form-control" type="file" id="image_post" name="image_post" required accept="image/png, image/gif, image/jpeg">
                    <div class="invalid-feedback">
                      Valid Profile picture is required.
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                    <label for="first_name">First Name</label>
                    <div class="invalid-feedback">
                      Valid First Name is required.
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                    <label for="last_name">Last Name</label>
                    <div class="invalid-feedback">
                      Valid Last Name is required.
                    </div>
                  </div>
                  <p>Have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#LoginModal">Log in</a></p>
                  <div class="row">
                    <button class="col mx-2 btn btn-lg btn-secondary mb-3" id="ResetForm" type="button">Clear</button>
                    <button class="col mx-2 btn btn-lg btn-primary mb-3" id="submit_register"  name="submit" value="register" type="submit">Register</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> 
        <script>$(document).on('click', "#ResetForm", function() { document.getElementById('register').reset(); });
        $(document).on('click', "#submit_register", function() { 
              password = document.getElementById("password");
              confirmpassword = document.getElementById("confirmpassword");

            function validatePassword(){
              if(password.value != confirmpassword.value) {
                confirmpassword.setCustomValidity("Passwords Don't Match");
              } else {
                confirmpassword.setCustomValidity('');
              }
            }

            password.onchange = validatePassword;
            confirmpassword.onkeyup = validatePassword;

         });
 
 
      </script>

        <?php  }  ?>

<footer class="pt-3 border-top text-center">
            <a href="<?=domain?>about.php" class="mx-2">About</a>
            <a href="<?=domain?>privacy.php" class="mx-2">Privacy</a>
            <small class="d-block mb-3 text-muted">Copyright © 2022 InstaKilogram</small>
        </footer>
    </div>
<script src="<?=domain_admin?>js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?=domain_admin?>js/custom.js"></script>
 