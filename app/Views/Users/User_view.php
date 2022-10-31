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
                            <h1 class="nav-link mt-1 mb-0 p-1 text-primary">Welcome user Email Id : <?php echo $data['email'];  ?>  </h1>
                        </span>
                    </div>
                </header>
               <br>
                <h3 class="text-center text-primary bg-white">User Profile</h3>
                <?php if (session()->getFlashdata('success')) { ?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php } ?>
                <div class="container-fluid">
                    <table class="table table-bordered table-hover table-responsive-sm bg-white">
                        <tr class="bg-dark">
                            <th class="text-center text-white">Id</th>
                            <th class="text-center text-white">Name</th>
                            <th class="text-center text-white">Email</th>
                            <th class="text-center text-white">Phone</th>
                            <th class="text-center text-white">Death of Birth</th>
                            <th class="text-center text-white">Address</th>
                            <th class="text-center text-white">Gender</th>
                            <th class="text-center text-white">Hobby</th>
                            <th class="text-center text-white">city</th>
                            <th class="text-center text-white">Image</th>

                        </tr>
                        <tbody>
                            <tr>
                                <td class="text-center"><?php echo $data['Id'];  ?></td>
                                <td class="text-center"><?php echo $data['name'];  ?></td>
                                <td class="text-center"><?php echo $data['email'];  ?></td>
                                <td class="text-center"><?php echo $data['phone'];  ?></td>
                                <td class="text-center"><?php echo $data['dob'];  ?></td>
                                <td class="text-center"><?php echo $data['address'];  ?></td>
                                <td class="text-center"><?php echo $data['gender'];  ?></td>
                                <td class="text-center"><?php echo $data['hobb'];  ?></td>
                                <td class="text-center"><?php echo $data['city'];  ?></td>
                                <td class="text-center"> <img src="<?= base_url('uploads/' . $data['img']); ?>" width="50px" height="50px" /></td>
                            </tr>
                        </tbody>
                    </table>
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