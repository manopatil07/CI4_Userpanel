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
                            <h1 class="nav-link mt-1 mb-0 p-1 text-primary">Welcome user Email Id : <?php echo $data['email'];  ?></h1>
                        </span>
                    </div>
                </header>
                <br>
                <h1 class="text-center text-primary bg-white">Edit Vandor List</h1>
                <div class="container-fluid">
                    <div class="col-lg-6">
                        <form method="post" id="editForm" class="form-group">
                            Vandor Title :
                            <input type="text" name="vandor_title" class='form-control' placeholder="Enter Vandor Title" value="<?php echo set_value('vandor_title', $row['vandor_title']) ?>">
                            Vandor Description:
                            <input type="text" name="vandor_description" class='form-control' placeholder="Enter Vandor Description" value="<?php echo set_value('vandor_description', $row['vandor_description']) ?>">
                            <label for="Image">Image :</label> <input type="file" name="image" class='form-control'>
                            <button type="submit" class="btn btn-secondary">Edit</button>
                        </form>
                    </div>
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
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        if ($("#editForm").length > 0) {
            $("#editForm").validate({
                rules: {
                    vandor_title: {
                        required: true,
                    },
                    vandor_description: {
                        required: true,
                        maxlength: 50,
                    },
                },
                messages: {
                    vandor_title: {
                        required: "Please enter vandor_title",
                    },
                    vandor_description: {
                        required: "Please enter vandor_description",
                        maxlength: "The vandor_description should less than or equal to 4 characters",
                    },
                }
            })
        }
        // =================================================
        // Edit Product data 
        // ========================================================
        $(document).ready(function(e) {
            $("#editForm").on('submit', function(e) {
                e.preventDefault();
                var formdata = new FormData(this);
                //   alert(formdata);
                $.ajax({
                    type: 'POST',
                    data: formdata,
                    url: '<?php echo base_url('/update/' . $row['Id']) ?>',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        //   alert(data);
                        if (data == "Data with Image Insert") {
                            swal("Success", "Data Updated With Image Successfully!", "success");
                            setTimeout(function() {
                                window.location.href = "<?php echo base_url() . '/list' ?>";
                            }, 900);
                        }
                        if (data == "Data with Out Image Insert") {
                            swal("Success", "Data Updated WithOut Image Successfully!", "success");
                            setTimeout(function() {
                                window.location.href = "<?php echo base_url() . '/list' ?>";
                            }, 900);
                        }
                        if (data == "Data Required") {
                            swal("Oh Wrong", "Feild is Required !", "error");
                        }
                    },
                    error: function(data) {
                        console.log("error");
                        console.log(data);
                    }
                });
            });
        });
    </script>
</body>

</html>