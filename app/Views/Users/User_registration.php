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
                        <?php if (session()->getFlashdata('success')) { ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php } ?>

                        <?php
                        if (isset($validation)) {
                        ?>
                            <div class="alert alert-danger">
                                <?php echo $validation->listErrors() ?>
                            </div>
                        <?php } ?>
                        <form method="post" action="/User_signup" enctype="multipart/form-data">
                            <center style="color:black;font-weight:800;font-size:22px;"> User Registration Form</center><br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="<?= base_url('assets\img\user.png') ?>" style="width: 350px;height:380px">
                                </div>
                                <div class="col-lg-4 pl-5">
                                    NAME : <input type="text" name="name" value="<?= set_value('name')  ?>" class="form-control">
                                    EMAIL : <input type="text" name="email" value="<?= set_value('email')  ?>" class="form-control">
                                    PHONE : <input type="text" name="phone" value="<?= set_value('phone')  ?>" class="form-control">
                                    PASSWORD : <input type="text" name="password" value="<?= set_value('password')  ?>" class="form-control">
                                    CONFORM PASSWORD : <input type="text" name="Con_password" value="<?= set_value('Con_password')  ?>" class="form-control">
                                    Date of Birth : <input type="date" name="dob" value="<?= set_value('dob')  ?>" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    Address : <textarea name="address" rows="2" cols="40" class="form-control"><?= set_value('address') ?></textarea>
                                    <label for="Gender">gender : </label>
                                    <div class="form-control">
                                        MALE <input type="radio" name="gender" value="male" <?= set_radio('gender', 'male', true) ?>>
                                        &nbsp;&nbsp; FEMALE<input type="radio" name="gender" value="female" <?= set_radio('gender', 'female') ?>>
                                    </div>
                                    Hobby : <div class="form-control">
                                        &nbsp;Internet &nbsp; <input type="checkbox" name="hobb[]" value="Internet" <?= set_checkbox('hobb[]', 'Internet') ?>>
                                        &nbsp; cricket &nbsp;<input type="checkbox" name="hobb[]" value="cricket" <?= set_checkbox('hobb[]', 'cricket') ?>>
                                        &nbsp;Game &nbsp;<input type="checkbox" name="hobb[]" value="Game" <?= set_checkbox('hobb[]', 'Game') ?>>
                                    </div>
                                    Image : <input type="file" name="img" class="form-control">
                                    City :<div class="form-control"> <select name="city">
                                            <option value="dewas" <?= set_select('city', 'Dewas', true) ?>>Dewas</option>
                                            <option value="Indore" <?= set_select('city', 'Indore') ?>>Indore</option>
                                            <option value="Bhopal" <?= set_select('city', 'Bhopal') ?>>Bhopal</option>
                                            <option value="Ujjain" <?= set_select('city', 'Ujjain') ?>>Ujjain</option>
                                        </select>
                                    </div><br>
                                    <center> <button class="btn btn-primary text-center">Submit</button><br>
                                        <a href="<?= base_url('/UserSignIn')  ?>"> Sign In</a>
                                    </center>
                                </div>
                            </div>
                            <br>

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