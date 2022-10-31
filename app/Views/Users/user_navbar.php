<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/fav/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/fav/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/fav/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/img/fav/site.webmanifest') ?>">
    <link rel="mask-icon" href="<?= base_url('assets/img/fav/safari-pinned-tab.svg') ?>" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>QuicFood</title>
   
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.default.css') ?>">
   
</head>

<body>
    <!--=== navbar ===-->
    <header class="header z-index-50">
        <nav class="navbar py-3 px-0 shadow-sm text-white position-relative">

            <div class="search-box shadow-sm">
                <button class="dismiss d-flex align-items-center">
                    <svg class="svg-icon svg-icon-heavy">
                        <use xlink:href="#close-1"> </use>
                    </svg>
                </button>
                <form id="searchForm" action="#" role="search">
                    <input class="form-control shadow-0" type="text" placeholder="What are you looking for...">
                </form>
            </div>
            <div class="container-fluid w-100">
                <div class="navbar-holder d-flex align-items-center justify-content-between w-100">

                    <div class="navbar-header">
                        <img class="rounded-circle" src="<?= base_url('uploads/' . $data['img']); ?>" hight="30" width="60px">
                        <div class="brand-text d-none d-lg-inline-block"><span> Quic</span><strong>Food</strong></div>
                        <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>QF</strong></div>
                    </div>

                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/user_logout') ?>"> <span class="d-none d-sm-inline">
                                    <h2><i class="fa fa-sign-out" aria-hidden="true">
                                            Logout</i></h2>
                                </span>
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>


</body>

</html>