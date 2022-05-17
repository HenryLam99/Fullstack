<?php   
 if(!empty($_POST)){ 
    if(isset($_POST["email"]) && isset($_POST["password"])){ 
      $sql = "SELECT * FROM `user` where email ='".$_POST["email"]."';";
      $query = query($sql,$connect); 
      if($query){
        if($query[0]["permission"] == 1){
          if (password_verify($_POST["password"], $query[0]["password"])) { 
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["id"]    = $_POST["id"];
            header("Location: ".domain_admin);
          }
        }
      }  
    }
  } 
?>
<main>
  <div class="row text-center">
    <div class="col-lg-5 mx-auto">
      <form class="needs-validation text-start" method="POST" novalidate="">
        <h1 class="h3 mb-3 fw-normal">Please sign in to your admin account</h1>
    
        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email" placeholder="name@example.com" required="">
          <label for="floatingInput">Email address</label>
          <div class="invalid-feedback">
            Valid email is required.
          </div>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <label for="floatingPassword">Password</label>
          <div class="invalid-feedback">
            Valid password is required.
          </div>
        </div>

        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign in</button>
      </form>
    </div>
  </div>
</main> 