<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">   

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
    <h3 class="text-center text-primary bg-white">Codeigniter 4 Vandor List</h1>
    <?php
        if(!empty($session->getFlashdata('success'))){
            ?>
        <div>
        <?php echo $session->getFlashdata('success'); ?>
        </div>

            <?php
        }
    ?>
       <div class="container-fluid">
    <table class="table table-bordered table-hover table-responsive-sm bg-white">
        <tr class="bg-dark">
            <th class="text-center text-white">ID</th>
            <th class="text-center text-white">Vandor Title</th>
            <th class="text-center text-white">Vandor Description</th>
            <th class="text-center text-white">Image</th>
            <th class="text-center text-white">DELETE</th>
            <th class="text-center text-white">EDIT</th>

        </tr>
        <tbody>
           <?php
           if(!empty($dat)){
            foreach($dat as $details){
            ?>
            <tr>
                <td class="text-center"><?php echo $details['Id']; ?></td>
                <td class="text-center"><?php echo $details["vandor_title"]; ?></td>
                <td class="text-center"><?php echo $details["vandor_description"]; ?></td>
                <td class="text-center"> <img src="<?= base_url('vendor/'.$details['image']);?>" width="50px" height="50px" /></td>
                <td class="text-center">                  
                    <button class="btn btn-danger" onclick="deleteFun('<?= $details['Id']; ?>')" >DELETE</button>
                    </td>               
                <td class="text-center"><a href="<?php echo base_url('/edit/'.$details["Id"])?>" class="btn btn-primary">Edit</a></td>

            </tr>
            <?php
           }
        }
           else{
            ?>
            <tr>
                <td class="text-center" colspan="5">No Record Found</td>
            </tr>
            <?php
                       }
           ?>
        </tbody>
    </table>
    
    <a href="<?= base_url('/create') ?>" class="btn btn-primary">Add</a>
    </div>
    <!-- Popper JS -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Latest compiled JavaScript -->
    

   <script>
     //delete function start here
  function deleteFun(id) {
     if (confirm('Are you sure?') == true) {
    // alert(id);
      $.ajax({
        url: '<?= base_url('/delete') ?>/' + id,
        method: "get",
        dataType: "html",
        data: { del_ID:id
                },
        
        success: function(response) {
            // alert(response);
          if (response == 'data delete') {
            swal("Deleted!", "Menu Item has been Deleted.", "success");
            setTimeout(function() {
                 window.location.href = "<?php echo base_url() . '/list' ?>";
            }, 1500);
          }
          if (response == 'data not delete') {
            swal("Not Deleted!", "Menu Item has Not been Deleted.", "Error");
            setTimeout(function() {
               window.location.href = "<?php echo base_url() . '/list' ?>";
            }, 1500);
            }
        }
      })
    }
  }
  
   </script>
</body>

</html>