<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css" />
    <title><?=$title?></title>
  </head>
  <body>
    <div class="containers">
      <div class="forms-container">
        <div class="signin-signup">

          <form method="POST" action="/login" class="sign-in-form">
            <h2 class="title">Sign in</h2>

            <?php if (session()->getFlashdata('status') !='') { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?=session()->getFlashdata('status');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php }?>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" value="<?= session()->getFlashdata('username') !='' ? session()->getFlashdata('username') : '' ?>" id="iusername" name="iusername" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="ipassword" name="ipassword" placeholder="Password" />
            </div>
            <button type="submit" class="btn solid">Login</button>
          </form>

          <form method="POST" action="/login" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>

            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Selamat Datang</h3>
            <p>
              Ini adalah website informasi pembayaran SPP Siswa SMK Negeri 2 Kuningan
            </p>
            <!-- <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button> -->
          </div>
          <!-- <div class="img">
            
          </div> -->
           <img src="img/register.svg" class="image" alt="" />
          <!-- <img src="img/log.svg" class="image" alt="" /> -->
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <!-- <img src="img/register.svg" class="image" alt="" /> -->
        </div>
      </div>
    </div>
    <script src="/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
  </body>
</html>
