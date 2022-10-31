<!DOCTYPE html>
<html lang="en">

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
   
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.default.css') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .btn {
            width: 200px;
        }

        .login-page {
            position: relative;
        }

        .login-page::before {
            background: url('<?= base_url('assets/img/bg.jpg') ?>');
            z-index: -1;
            background-size: cover;
            -webkit-filter: blur(10px);
            filter: blur(10px);
            z-index: 1;
            position: absolute;
            content: '';
            display: block;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .login-page .container {
            min-height: 100vh;
        }

        .login-page .card {
            z-index: 999;
        }

        @media (min-width: 992px) {
            .login-page .info {
                min-height: 70vh;
            }
        }
    </style>

</head>

<body>
    <div class="login-page">
        <div class="container d-flex align-items-center position-relative py-3">
            <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
                <div class="row gx-0 align-items-stretch">
                    <div class="login-form w-100 bg-light">
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('msg') ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        if (isset($validation)) {
                        ?>
                            <div class="alert alert-danger">
                                <?php echo $validation->listErrors() ?>
                            </div>
                        <?php } ?>
                        <form method="post" action="/user_Login">
                            <center style="color:black;font-weight:800;font-size:22px;"> User Sign In</center><br>
                            <div class="row">
                                <div class="col-lg-6 pl-5">
                                    <img src="<?= base_url('assets\img\user.png') ?>" style="width: 580px;height:380px">
                                </div>
                                <div class="col-lg-6 p-5">
                                    <label for="Email">Email Id :</label> <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control">
                                    <label for="Password">Password :</label> <input type="password" name="password" value="<?= set_value('password')  ?>" class="form-control"><br>
                                    <button class="btn btn-success">Sumbit</button><br>
                                    <a href="<?= base_url('/User_create') ?>">User Registration</a>
                                </div>
                            </div>                              
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>
<script src="<?php echo base_url(); ?>jquery/jquery.min.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script> -->
<script src="<?= base_url('assets/js/front.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>

</html>