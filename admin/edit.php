<?php
include("includes/header.php");

// Get worker by ID
$id = $_GET['id'] ?? null;
if (!$id) {
    die("No worker ID provided.");
}

$query = mysqli_query($conn, "SELECT * FROM workers WHERE id = $id");
$worker = mysqli_fetch_assoc($query);
if (!$worker) {
    die("Worker not found.");
}

$message = "";

if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $position = $_POST['position'];
    $employment_date = $_POST['employment_date'];
    $employment_status = $_POST['employment_status'];
    $bio = $_POST['bio'];

    $profile = $worker['profile'];
    if (!empty($_FILES["profile"]["name"])) {
        $uploadDir = "../profile/";
        $fileExt = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
        $profile = uniqid("img_", true) . "." . $fileExt;
        $targetFile = $uploadDir . $profile;
        move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile);
    }

    $updateQuery = "UPDATE workers SET firstname='$firstname', lastname='$lastname', email='$email', password='$password', profile='$profile', position='$position', employment_date='$employment_date', employment_status='$employment_status', bio='$bio' WHERE id=$id";
    if (mysqli_query($conn, $updateQuery)) {
        $message = "<div class='alert alert-success'>Worker updated successfully.</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error updating worker.</div>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Worker</h1>
    </section>

    <section class="content">
        <div class="col-md-6">
            <div class="box box-primary">
                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $message; ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label>First Name</label>
                            <input name="firstname" class="form-control" value="<?= $worker['firstname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastname" class="form-control" value="<?= $worker['lastname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control" value="<?= $worker['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" class="form-control" value="<?= $worker['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" name="profile" class="form-control">
                            <p>Current: <img src="../profile/<?= $worker['profile']; ?>" height="60"></p>
                        </div>
                        <div class="form-group">
                            <label>Biography</label>
                            <textarea name="bio" class="form-control" rows="5"><?= $worker['bio']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input name="position" class="form-control" value="<?= $worker['position']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Employment Date</label>
                            <input type="date" name="employment_date" class="form-control" value="<?= $worker['employment_date']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Employment Status</label>
                            <input name="employment_status" class="form-control" value="<?= $worker['employment_status']; ?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button name="update" class="btn btn-primary">Update Worker</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php include("includes/footer.php"); ?>
