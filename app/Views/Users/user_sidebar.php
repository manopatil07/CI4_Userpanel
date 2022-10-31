<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bootstrap Material Admin by Bootstrapious.com</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="all,follow">

  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/fav/apple-touch-icon.png') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/fav/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/fav/favicon-16x16.png') ?>">
  <link rel="manifest" href="<?= base_url('assets/img/fav/site.webmanifest') ?>">
  <link rel="mask-icon" href="<?= base_url('assets/img/fav/safari-pinned-tab.svg') ?>" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- Google fonts - Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <!-- Choices CSS-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.default.css') ?>">
</head>

<body>
  <nav class="side-navbar z-index-40">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center py-4 px-3"><img class="avatar shadow-0 img-fluid rounded-circle" src="<?= base_url('uploads/' . $data['img']); ?>" alt="...">
      <div class="ms-3 title">
        <h1 class="h4 mb-2"><?php echo $data['name'];  ?></h1>
      </div>
    </div>
    <li class="sidebar-link"><a class="text-danger" href="<?= base_url('/delete_user/' . $data['Id'])  ?>">
        <h1 style="font-size:18px"><i class="fa fa-trash-o" aria-hidden="true"> Delete Account </i></h1>
      </a></li>
    <hr>
    <!-- Sidebar Navidation Menus--><span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
    <ul class="list-unstyled py-4">
      <li class="sidebar-item"><a class="sidebar-link" href="<?= site_url('/user_Home')  ?>">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <h1> <i class="fa fa-home" aria-hidden="true">
                <use xlink:href="#portfolio-grid-1"> </use>
              </i></h1> &nbsp; &nbsp; Home </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url('/User_edit/' . $data['Id'])  ?>">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <h1><i class="fa fa-user-md" aria-hidden="true">
                <use xlink:href="#portfolio-grid-1"> </use>
              </i></h1>
          </svg> &nbsp; &nbsp;Added Profile</a>
      </li>
      <li class="sidebar-item"><a class="sidebar-link" href="#">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <h1><i class="fa fa-cog" aria-hidden="true"></i>
              <use xlink:href="#portfolio-grid-1"> </use>
              </i>
            </h1>
          </svg> &nbsp; &nbsp;Setting</a>
      </li>
      <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url('/list') ?>">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <h1> <i class="fa fa-television" aria-hidden="true">
                <use xlink:href="#disable-1"> </use>
              </i></h1>
          </svg> &nbsp; &nbsp;User Vendor Order </a></li>

    </ul>
  </nav>


  <!-- change Password -->

  <br>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/front.js') ?>"></script>
  <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>


</body>

</html>