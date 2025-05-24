<?php 
include("includes/header.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
 
$depoid = $_GET['id'];
$sqleu = "SELECT * FROM bank_withdrawal WHERE id='$depoid'";
$queryeu = mysqli_query($conn, $sqleu);
$usereu = mysqli_fetch_assoc($queryeu);
$message = "";

$userid = $usereu['client_id'];
$sqlSu = "SELECT * FROM users WHERE id='$userid'";
$querySu = mysqli_query($conn, $sqlSu);
$userSu = mysqli_fetch_assoc($querySu);
$email = $userSu['email'];
if(isset($_POST['submit'])){
    $status = $_POST['status'];
    

    $sqlup = "UPDATE bank_withdrawal set status ='$status' WHERE id='$depoid'";
    $queryup = mysqli_query($conn,$sqlup);

    if($status == "completed"){
       
        $newbal = $userSu['total_balance'] - $usereu['amount'];
        $sqlcoin = "UPDATE users set total_balance ='$newbal' WHERE id='$userid'";
        $querycoin = mysqli_query($conn,$sqlcoin);
    try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.coinstarinvestment.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'support@coinstarinvestment.com';                     //SMTP username
    $mail->Password   = 'CjgwqRQ@hfiy!';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@coinstarinvestment.com', 'Support');
    $mail->addAddress($email);     //Add a recipient               //Name is optional
    
    $mail->addCC('support@coinstarinvestment.com');
   
   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Withdrawal Status';
    $mail->Body    = '<html><head></head></head>
<body style="background-color: #1e2024; padding: 45px;">
    <div>
        <img style="position:relative; left:35%;" src="https://coinstarinvestment.com/dash/dashboard/logo.png">
        <h3 style="color: black;">Mail From support@coinstarinvestment.com - Withdrawal Pin</h3>
    </div>
    <div style="color: #ffff;"><hr/>
        <h3>Dear user</h3>
        <p>Your withdrawal request has successfully been approved and the status has been update to completed!!</p>
       
       
        
       
        <h5>Note : the details in this email should not be disclosed to anyone</h5>
            
    </div><hr/>
        <div style="background-color: white; color: black;">
            <h3 style="color: black;">support@coinstarinvest<sup>TM</sup> </h3>
        </div>
        
</body></html>

';
   
    $mail->send();
    echo "message sent";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    }
    

    $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>Status Updated Successfully</div>
        </div>';
}
?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            coinstarinvest Users List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
            <li class="#">users</li>
            <li class="active">edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Crypto Withdrawal</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post" role="form">
                        <?php echo $message;  ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    value="<?php echo $usereu['email']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputbtc">Transaction ID</label>
                                <input type="text" name="tranx_id" class="form-control" id="exampleInputbtc"
                                    placeholder="Enter amount" value="<?php echo $usereu['tranx_id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputeth">Account Number</label>
                                <input type="text" name="accountNumber" class="form-control" id="exampleInputeth"
                                    placeholder="Enter amount" value="<?php echo $usereu['accountNumber']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputeth">Bank Name</label>
                                <input type="text" name="accountNumber" class="form-control" id="exampleInputeth"
                                    placeholder="Enter amount" value="<?php echo $usereu['bankName']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputeth">Account Name</label>
                                <input type="text" name="accountNumber" class="form-control" id="exampleInputeth"
                                    placeholder="Enter amount" value="<?php echo $usereu['accountName']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputeth">SSN</label>
                                <input type="text" name="accountNumber" class="form-control" id="exampleInputeth"
                                    placeholder="Enter amount" value="<?php echo $usereu['ssn']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputusdt">Amount</label>
                                <input type="number" name="usdt_balance" class="form-control" id="exampleInputusdt"
                                    placeholder="Enter amount" value="<?php echo $usereu['amount']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputltc">Status</label>
                                <select name="status" class="form-control">
                                    <option value="<?php echo $usereu['status']; ?>"><?php echo $usereu['status']; ?>
                                    </option>
                                    <option value="completed">Completed
                                    </option>
                                    <option value="pending">pending
                                    </option>
                                    <option value="failed">Failed
                                    </option>
                                </select>
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->



            </div>
            <!--/.col (left) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include("includes/footer.php");

?>