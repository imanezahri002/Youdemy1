<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section class="vh-70" style="background-color: #0508b0;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../../assets/img/login2.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:30rem;margin-top:6rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="../controller/Auth.php">

                  <div class="d-flex align-items-center mb-3 pb-1">
                     <img src="imgs/sac-de-courses.png" alt="">
                    <span class="h1 fw-bold mb-0">Youdemy</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                  <span style="color:red ;font-size:25px;"><?php echo isset($_SESSION["message"])? $_SESSION["message"]:"" ?></span>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Email address</label>
                    <input name="emailLog" type="email" id="form2Example17" class="form-control form-control-lg" required/>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Password</label>
                    <input name="passwordLog" type="password" id="form2Example27" class="form-control form-control-lg" required/>
                  </div>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit" name="login">Login</button>
                  </div>
                  <p class="mb-1 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="inscription.php"
                      style="color: #393f81;">Register here</a>
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
</body>
</html>