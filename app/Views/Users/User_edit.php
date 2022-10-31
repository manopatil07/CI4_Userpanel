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
</head>

<body>
    <div class="page">
        <?php require_once("user_navbar.php"); ?>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <?php require_once("user_sidebar.php"); ?>
            <!-- Side Navbar -->
            <div class="content-inner w-100">
                <header class="bg-white shadow-sm z-index-20">
                    <div class="container-fluid px-0">
                        <span>
                            <h1 class="nav-link mt-1 mb-0 p-1 text-primary">Welcome user Email Id : <?php echo $data['email'];  ?> </h1>
                        </span>
                    </div>
                </header><br>
                <h1 class="text-center text-primary bg-white">User Edit Form</h1>
                <div class="container-fluid">
                    <div class="col-lg-6">
                        <?php
                        if (isset($validation)) {
                        ?>
                            <div>
                                <?php echo $validation->listErrors() ?>
                            </div>
                        <?php } ?>
                        <form method="post" action="<?php echo base_url('/User_edit/' . $data['Id']) ?>" enctype="multipart/form-data" class="form-group">
                            <label for="NAME">NAME : </label> <input type="text" name="name" value="<?= set_value('name', $data['name'])  ?>" class='form-control'>
                            <label for="PHONE">PHONE : </label> <input type="text" name="phone" value="<?= set_value('phone', $data['phone'])  ?>" class='form-control'>
                            <label for="DOB">Date of Birth : </label> <input type="date" name="dob" value="<?= set_value('dob', $data['dob'])  ?>" class='form-control'>
                            <label for="Address">Address : </label> <textarea name="address" rows="2" cols="40" class='form-control'><?= set_value('address', $data['address']) ?></textarea>
                            <label for="Gender">gender : </label>
                            <div class="form-control">
                                MALE <input type="radio" name="gender" value="male" <?php if ($data["gender"] == "male") {
                                                                                        echo "checked";
                                                                                    } ?>>
                                &nbsp;&nbsp; FEMALE<input type="radio" name="gender" value="female" <?php if ($data["gender"] == "female") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                            </div>
                            <?php
                            $d = $data['hobb'];
                            $e = explode(",", $d);
                            ?>
                            <label for="Hobby">Hobby : </label>
                            <div class="form-control">
                                &nbsp;Internet &nbsp; <input type="checkbox" name="hobb[]" value="Internet" <?php if (in_array("Internet", $e)) {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                                &nbsp; cricket &nbsp;<input type="checkbox" name="hobb[]" value="cricket" <?php if (in_array("cricket", $e)) {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                                &nbsp;Game &nbsp;<input type="checkbox" name="hobb[]" value="Game" <?php if (in_array("Game", $e)) {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                            </div>
                            <label for="Image">Image :</label> <input type="file" name="img" class='form-control'>
                            <label for="City">City :</label>
                            <div class="form-control"> <select name="city">
                                    <option value="dewas" <?php if ($data["city"] == "dewas") {
                                                                echo "selected";
                                                            }  ?>>Dewas</option>
                                    <option value="Indore" <?php if ($data["city"] == "Indore") {
                                                                echo "selected";
                                                            }  ?>>Indore</option>
                                    <option value="Bhopal" <?php if ($data["city"] == "Bhopal") {
                                                                echo "selected";
                                                            }  ?>>Bhopal</option>
                                    <option value="Ujjain" <?php if ($data["city"] == "Ujjain") {
                                                                echo "selected";
                                                            }  ?>>Ujjain</option>
                                </select>
                            </div><br>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <?php require_once("user_footer.php"); ?>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/front.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>

</body>

</html>