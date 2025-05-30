<?php 
include("includes/header.php");

$sqldepo = "SELECT * FROM history";
$querydepo = mysqli_query($conn, $sqldepo);
?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            coinstarinvest transactions List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
            <li class="active">transactions</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Total transactions</h3>
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


                                <th>Tranx ID</th>
                                <th>Email</th>

                                <th>Amount</th>
                                <th>Coin</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php while($depo = mysqli_fetch_assoc($querydepo)){  ?>
                            <tr>

                                <td><?php echo $depo['tranx_id']; ?></td>

                                <td><?php echo $depo['email']; ?></td>

                                <td><?php echo $depo['amount']; ?></td>
                                <td><?php echo $depo['coin']; ?></td>
                                <td><?php echo $depo['status']; ?></td>
                                <td><?php echo $depo['created_at']; ?></td>
                                <td><a href="hisedit.php?id=<?php echo $depo['id']; ?>"
                                        class="btn btn-block btn-success btn-xs">edit</a></td>
                                <td><a href="delhis.php?id=<?php echo $depo['id']; ?>"
                                        class="btn btn-block btn-danger btn-xs">Delete</a></td>

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