<?php 
include("includes/header.php");

?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Workers List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
            <li class="active">workers</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Total Workers</h3>
                        <div class="box-tools">
                            <div class="input-group">
                                <input type="text" name="table_search" class="form-control input-sm pull-right"
                                    style="width: 150px;" placeholder="Search" />
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>

                                <th>UserID</th>
                                <th>Email</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Password</th>
                                <th>Position</th>
                                <th>Employment Date</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php while($user = mysqli_fetch_assoc($query)){  ?>
                            <tr>
                                <td>#<?php echo $user['userid']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['firstname']; ?></td>
                                <td><?php echo $user['lastname']; ?></td>
                                <td><?php echo $user['password']; ?></td>
                                <td><?php echo $user['position']; ?></td>
                                <td><?php echo $user['employment_date']; ?></td>
                                <td><?php echo $user['employment_status']; ?></td>
                                <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-block btn-success btn-xs">Edit</a></td>
                                <td><a href="delworker.php?id=<?php echo $user['id']; ?>" class="btn btn-block btn-danger btn-xs">Delete</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include("includes/footer.php");

?>