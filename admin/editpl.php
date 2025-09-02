<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: login.php");
        exit;
    }
?>
<?php
include 'conect.php';
$Uname=$_REQUEST['un'];
$sqlquery="SELECT * FROM `pa_lo` WHERE parking_area='$Uname'";
$query=mysqli_query($conn,$sqlquery);
$result1=mysqli_fetch_assoc($query);
if(isset($_POST['st1']))
{
$Parea=$_POST["pa1"];
$Vcategory=$_POST["vc1"];
$Parkingrate=$_POST["prate1"];
$Vspace=$_POST["vs1"];
$sql="UPDATE `pa_lo` SET `parking_area`='$Parea',`vechile_category`='$Vcategory',`rate_per_hour`=$Parkingrate,`vacant_space`=$Vspace WHERE parking_area='$Uname'";
mysqli_query($conn,$sql);
header('location:manpark.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="plocc.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>
        Edit Parking Location Information 
    </title>
</head>

<body>
    <section id="sidebar">
        <div class="sidebar-brand">
            <h2>Apps</h2>
        </div>
        <div class="sidebar-menu">
            <div class="menu">
                <div class="item"><a href="#"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="fa fa-user"></i><span>Registration</span><i
                            class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="#" class="sub-item">Add Manager</a>
                        <a href="#" class="sub-item">Manage Manager</a>
                    </div>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="fa fa-car"></i><span>Parking Section</span><i
                            class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="#" class="sub-item">Parking Location</a>
                        <a href="#" class="sub-item">Manage Parking Location</a>
                    </div>
                </div>
                <div class="item"><a href="#"><i class="fa fa-history"></i><span>Park History</span></a></div>
                <div class="item"><a href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a></div>
            </div>
        </div>
    </section>
    <section id="main-content">
        <header class="main-header">
            <div class="header-left1">
                <h2> Parking Location </h2>
            </div>
            <div class="header-center">
                <h3>Vehicle Parking Management System</h3>
            </div>
            <div class="header-left">
                <img src="33.jpg" class="img-responsive" />
                <p>Admin</p>
            </div>
            <div class="clear"></div>
        </header>
        <form method="post">
        <div class="dddd" style="padding:10px;">
            <div>
                <label>Parking Area</label><br>
                <input type="text" id="pa" name="pa1" placeholder="Parking Zone"value="<?php echo $result1['parking_area']; ?>" autocomplete="off" required>
            </div>
            <div>
                <label>Vehicle Category</label><br>
                <input type="text" id="vc" name="vc1" placeholder="Vehicle Category" value="<?php echo $result1['vechile_category']; ?>" autocomplete="off" required>
            </div>
            <div>
                <label>Parking Rate Per Hour</label><br>
                <input type="number" id="prate" name="prate1" placeholder="Rate Per hour" value="<?php echo $result1['rate_per_hour']; ?>"  autocomplete="off" required>
            </div>
            <div>
                <label>Vacant Space</label><br>
                <input type="number" id="vs" name="vs1" placeholder="Vacant Space" value="<?php echo $result1['vacant_space']; ?>" autocomplete="off" required>
            </div>
            <div>
                <button type="submit" id="subtt" name="st1" required>Submit</button>
            </div>
        </div>
        </form>
        <div class="clear"></div>
    </section>
    <script src="1234.js"></script>
</body>

</html>