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
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../../assets/img/login2.png" alt="register form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:30rem;margin-top:6rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST">

                  <div class="d-flex align-items-center mb-1 pb-1">
                    <img src="imgs/sac-de-courses.png" alt="">
                    <span class="h1 fw-bold mb-0">Youdemy</span>
                  </div>

                  <h5 class="fw-normal mb-1 pb-3" style="letter-spacing: 1px;">Create your account</h5>

                  <!-- Name -->
                  <div class="form-outline mb-1">
                    <label class="form-label" for="fullName">First Name</label>
                    <input name="nom" type="text" id="firstName" class="form-control form-control-lg" />
                  </div>
                   <!-- Tel -->
                   <div class="form-outline mb-1">
                    <label class="form-label" for="tel">Last Name</label>
                    <input name="tel" type="text" id="lastName" class="form-control form-control-lg" />
                  </div>

                  <!-- Email -->
                  <div class="form-outline mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input name="email" type="email" id="email" class="form-control form-control-lg" />
                  </div>

                  <!-- Password -->
                  <div class="form-outline mb-1">
                    <label class="form-label" for="password">Password</label>
                    <input name="password" type="password" id="password" class="form-control form-control-lg" />
                  </div>
                   <!-- confirm Password -->
                   <div class="form-outline mb-3">
                    <label class="form-label" for="password">Confirmation password</label>
                    <input name="password" type="password" id="Cpassword" class="form-control form-control-lg" />
                  </div>
                   <!-- role -->
                   <div class="form-outline mb-3">
                    <label class="form-label" for="password">Role</label>
                    <div style="display:flex;justify-content:space-evenly;">
                        <label for="student">
                        <input type="radio" id="student" name="role" value="student">
                        Étudiant
                        </label>
                        <label for="teacher">
                        <input type="radio" id="teacher" name="role" value="teacher">
                        Enseignant
                        </label>
                    </div>
                  </div>
                  <!-- Submit Button -->
                  <div class="pt-1 mb-1">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="register" >Register</button>
                  </div>

                  <p class="mb-3 pb-lg-2" style="color: #393f81;">Already have an account? <a href="connexion.php" style="color: #393f81;">Login here</a></p>
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