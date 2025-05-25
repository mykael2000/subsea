<?php 
include("includes/header.php");


$message = "";
if(isset($_POST['create'])){

    $uploadDir = "../profile/";
    $fileName = basename($_FILES["profile"]["name"]);
    $targetFile = $uploadDir . $fileName;

    // Optional: Rename file to avoid duplicates
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $profile = uniqid("img_", true) . "." . $fileExt;
    $targetFile = $uploadDir . $profile;

    $userid = rand(100000000, 999999999);
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $position = $_POST['position'];
   $employment_date = $_POST['employment_date'];
    $employment_status = $_POST['employment_status'];
    $bio = $_POST['bio'];
   if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile)) {
        $sqlpde = "INSERT INTO workers (firstname, lastname, email, userid, password, profile, position, employment_date, employment_status, bio) VALUES ( '$firstname', '$lastname', '$email', $userid,'$password', '$profile', '$position', '$employment_date', '$employment_status', '$bio')";
        $stmtde = mysqli_query($conn, $sqlpde);
   }else{
        echo "<script>alert('Error uploading file.')</script>";
   }

    
    
    $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>Worker '.$email.' created successfully</div>
        </div>';
        
}





// Close the database connection
mysqli_close($conn);
?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add Worker</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post" role="form" enctype="multipart/form-data">
                        <?php echo $message;  ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputfirst">First name</label>
                                <input type="text" name="firstname" class="form-control" id="exampleInputfirst"
                                    placeholder="Enter firstname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputlast">Last name</label>
                                <input type="text" name="lastname" class="form-control" id="exampleInputlast"
                                    placeholder="Enter lastname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputemail">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputemail"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputpassword">Password</label>
                                <input type="text" name="password" class="form-control" id="exampleInputpassword"
                                    placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputprof">Profile Picture</label>
                                <input type="file" name="profile" class="form-control" id="exampleInputprof"
                                    placeholder="Enter profile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputpos">Staff Biography</label>
                                <textarea name="bio" class="form-control" id="exampleInputpos" rows="6" cols="50"
                                    >Write a biography of the staff.....</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputpos">Position</label>
                                <input type="text" name="position" class="form-control" id="exampleInputpos"
                                    placeholder="Enter position">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputltc">Employment Date</label>
                                <input type="date" name="employment_date" class="form-control" id="exampleInputltc"
                                    placeholder="Enter date">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputsta">Employment Status</label>
                                <input type="text" name="status" class="form-control" id="exampleInputsta"
                                    placeholder="Enter status">
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button name="create" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div><!-- /.box -->



            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include("includes/footer.php");

?>