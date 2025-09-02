<?php
    include '../user/connect.php';
    session_start();
    $photo=$_SESSION['pho_to'];
    $user=$_SESSION['u_nam'];
    $park_z=$_SESSION['p_zoone'];
    $sql="SELECT * FROM `chk_out` where User_name='$user'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    $p_z=$row['Parking_zoon'];
    $p_numb=$row['Phone_number'];
    $re_num=$row['Reg_number'];

    $ch_in_time=strtotime($row['ch_in']);
    $ch_out_time=strtotime($row['ch_out']);
    $diff=$ch_out_time-$ch_in_time;
    $hour=($diff/3600);

    $sql1="SELECT * FROM `pa_lo` where parking_area='$park_z'";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $rate=$row1['rate_per_hour'];
    $total=($hour * $rate);
?>
<?php
if($_SERVER["REQUEST_METHOD"]=='POST')
{
    $amu=$_POST["p2"];

   
$add_amu="INSERT INTO `add_money` (`Parking_zoon`, `Phone_number`, `Reg_number`, `Amount`) VALUES ('$p_z', '$p_numb', '$re_num', '$amu')";
$result123=mysqli_query($conn,$add_amu);
header("location: index.php");


}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="chkin.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>
        Admin Dashboard
    </title>
</head>

<body>
    <section id="sidebar">
        <div class="sidebar-brand">
            <h2>Apps</h2>
        </div>
        <div class="sidebar-menu">
            <div class="menu">
                <div class="item"><a href="managerdb.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="fa fa-user"></i><span>Check-in/Check-out</span><i
                            class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="checkin.php" class="sub-item">Check-in</a>
                        <a href="checkout.php" class="sub-item">Check-out</a>
                    </div>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="fa fa-car"></i><span>Manage User</span><i
                            class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="adduser.php" class="sub-item">Add User</a>
                        <a href="manageuser.php" class="sub-item">Manage User</a>
                    </div>
                </div>
                <div class="item"><a href="phmanager.php"><i class="fa fa-history"></i><span>Park History</span></a></div>
                <div class="item"><a href="feedback.php"><i class="fa fa-comment"></i><span>Feedback</span></a></div>
                <div class="item"><a href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a></div>
            </div>
        </div>
    </section>
    <section id="main-content">
        <header class="main-header">
            <div class="header-left1">
                <h2></i> Check-in </h2>
            </div>
            <div class="header-center">
                <h3>Vehicle Parking Management System</h3>
            </div>
            <div class="header-left">
            <img style=" width:46px; height: 46px;" src="../admin/images/<?php echo $photo ?>" class="img-responsive" />
                <p>Manager</p>
            </div>
            <div class="clear"></div>
        </header>
        <form method="post">
        <div class="ddd" style="padding:15px;">
            <div>
                <h3 style="padding:2px;padding-top:25px;padding-bottom:25px;">Total Amount To Be Paid : <?php  echo $total  ?> Tk</h3>
            </div>


            <div>
                <label>Amount Recived</label><br>
                <input type="text" id="p2" name="p2" required>
         </div>
            
            <div>
                <button type="submit" id="subt" name="subt1" required>Submit</button>
            </div>
        </div>
</form>
        <div class="clear"></div>
    </section>
    <script src="jque.js"></script>
    <script src="1234.js"></script>
    <script src="scrip.js"></script>
</body>

</html>