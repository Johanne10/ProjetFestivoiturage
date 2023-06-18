<!doctype html>
<html lang="en">
<?php

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Festivoiturage</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
  <style>
        .notification {
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            background-color: #f44336;
            color: white;
            padding: 16px;
            border-radius: 0 0 0 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            transition: transform 0.3s ease-out;
            transform: translateX(100%);
        }

        .notification.show {
            transform: translateX(0);
        }

        .close {
            position: absolute;
            top: 8px;
            right: 16px;
            color: white;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="./assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <?php if (isset($_SESSION['error'])) : ?>
                  <div class="notification show">
                    <span class="close">&times;</span>
                    <p><?php echo $error; ?></p>
                  </div>
                <?php endif; ?>
                <script>
                  // Get the close button and notification element
                  var close = document.querySelector('.close');
                  var notification = document.querySelector('.notification');

                  // Add a click event listener to the close button
                  close.addEventListener('click', function() {
                    // Hide the notification
                    notification.classList.remove('show');
                  });
                </script>
                <p class="text-center">Application pour le recensement de vehicule pour les festivals</p>
                <form action="index.php?action=authenticate-method" method="post">
                  <div class="mb-3">
                    <label for="user_login" class="form-label">Login</label>
                    <input type="text" class="form-control" name="user_login" id="user_login" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="user_password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="user_password" id="user_password">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <!-- <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" name="is_remember_user" id="is_remember_user" checked>
                      <label class="form-check-label text-dark" for="is_remember_user">
                        Rappeler de cet appareil
                      </label>
                    </div> -->
                    <!-- <a class="text-primary fw-bold" href="./index.html">Mot de passe oublié ?</a> -->
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Se connecter</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Nouveau chez Modernize?</p>
                    <a class="text-primary fw-bold ms-2" href="index.php?action=authentication-register">S'inscrire</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>