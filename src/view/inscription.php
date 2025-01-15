<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section class="vh-70" style="background-color:#0508b0;">
  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../../assets/img/login2.png" alt="register form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:30rem;margin-top:6rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                
              <div class="card-body p-4 p-lg-5 text-black">
                <h1>Youdemy</h1>
                <div style="color:#0508b0"><?php if (isset($_GET["er"])){echo $_GET["er"]; }?></div>
              <form method="POST" action="../controller/Auth.php">
    <!-- First Name -->
    <div class="form-outline mb-1">
        <label class="form-label" for="firstName">First Name</label>
        <p style="color: red;">
            <?php if (isset($_GET["msg1"])) { echo $_GET["msg1"]; } ?>
        </p>
        <input name="firstName" type="text" id="firstName" class="form-control form-control-lg" value="<?php if(isset($_GET['f'])){ echo $_GET['f']; } ?>" />
        </div>
        
    <!-- Last Name -->
    <div class="form-outline mb-1">
        <label class="form-label" for="lastName">Last Name</label>
        <p style="color: red;">
            <?php if (isset($_GET["msg2"])) { echo $_GET["msg2"]; } ?>
        </p>
        <input name="lastName" type="text" id="lastName" class="form-control form-control-lg" value="<?php echo isset($lastName) ? $lastName : ''; ?>" />
    </div>

    <!-- Email -->
    <div class="form-outline mb-1">
        <label class="form-label" for="email">Email</label>
        <p style="color: red;">
            <?php if (isset($_GET["msg3"])) { echo $_GET["msg3"]; } 
            if(isset($_GET["msg4"])){ echo $_GET["msg4"];}?>
        </p>
        <input name="email" type="email" id="email" class="form-control form-control-lg" value="<?php echo isset($email) ? $email : ''; ?>" />
    </div>
    <!-- Password -->
    <div class="form-outline mb-1">
        <label class="form-label" for="password">Password</label>
        <p style="color: red;">
            <?php if (isset($_GET["msg5"])) { echo $_GET["msg5"]; } ?>
        </p>
        <input name="password" type="password" id="password" class="form-control form-control-lg" />
    </div>
    <!-- Confirm Password -->
    <div class="form-outline mb-3">
        <label class="form-label" for="Cpassword">Confirm Password</label>
        <p style="color: red;">
            <?php if (isset($_GET["msg7"])) { echo $_GET["msg7"]; } 
                    if(isset($_GET["msg6"])){ echo $_GET["msg6"];}?>
        </p>
        <input name="Cpassword" type="password" id="Cpassword" class="form-control form-control-lg" />
    </div>

    <!-- Role -->
    <div class="form-outline mb-3">
        <label class="form-label" for="role">Role</label>
        <p style="color: red;">
            <?php if (isset($_GET["msg8"])) { echo $_GET["msg8"]; } ?>
        </p>
        <div>
            <input type="radio" name="role" value="student"><?php if (isset($role) && $role == "student") echo "checked"; ?>Student
            <input type="radio" name="role" value="teacher"> Teacher
        </div>
    </div>

    <!-- Submit Button -->
    <div class="pt-1 mb-1">
        <button class="btn btn-dark btn-lg btn-block" type="submit" name="register">Register</button>
    </div>

    
    
                  <p class="mb-1 pb-lg-2" style="color: #393f81;">if you have an account <a href="connexion.php"
                      style="color: #393f81;">Login here</a>
                 </p>
</form>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php

?>

</body>
</html>