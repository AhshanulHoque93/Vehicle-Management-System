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
$sqlquery="SELECT * FROM `add_manager` WHERE username='$Uname'";
$query=mysqli_query($conn,$sqlquery);
$result1=mysqli_fetch_assoc($query);
if(isset($_POST['subt1']))
{
$First_name=$_POST["fname1"];
$Last_name=$_POST["lname1"];
$Phone_number=$_POST["pnum1"];
$Gender=$_POST["gender1"];
$Address=$_POST["Address1"];
$Photo=$_POST["pfile1"];
$Join_date=$_POST["esince1"];
$User_name=$_POST["uname1"];
$password=$_POST["pass1"];

$sql="UPDATE `add_manager` SET `first_name`='$First_name', `last_name`='$Last_name', `phone_number`='$Phone_number', `gender`='$Gender', `address`= '$Address',`photo`='$Photo', `add_date`='$Join_date', `username`='$User_name', `password`='$password' WHERE username='$Uname'";
mysqli_query($conn,$sql);
header('location:managem.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="addm.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>
        Edit Manager Information
    </title>
</head>

<body>
    <section id="sidebar">
        <div class="sidebar-brand">
            <h2>Apps</h2>
        </div>
        <div class="sidebar-menu">
            <div class="menu">
                <div class="item"><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="fa fa-user"></i><span>Registration</span><i
                            class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="add manager.php" class="sub-item">Add Manager</a>
                        <a href="managem.php" class="sub-item">Manage Manager</a>
                    </div>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="fa fa-car"></i><span>Parking Section</span><i
                            class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="ploc.php" class="sub-item">Parking Location</a>
                        <a href="manpark.php" class="sub-item">Manage Parking Location</a>
                    </div>
                </div>
                <div class="item"><a href="ph.php"><i class="fa fa-history"></i><span>Park History</span></a></div>
                <div class="item"><a href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a></div>
            </div>
        </div>
    </section>
    <section id="main-content">
        <header class="main-header">
            <div class="header-left1">
                <h2></i> ADD MANAGER </h2>
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
        <div class="ddd" style="padding:10px;">
            <div>
                <label>First Name</label><br>
                <input type="text" id="fname" name="fname1" placeholder="First name" value="<?php echo $result1['first_name']; ?>"  autocomplete="off" required>
            </div>
            <div>
                <label>Last Name</label><br>
                <input type="text" id="lname" name="lname1" placeholder="Last name" value="<?php echo $result1['last_name']; ?>"  autocomplete="off" >
            </div>
            <div>
                <label>Phone Number</label><br>
                <input type="text" id="pnum" name="pnum1" placeholder="Phone Number" value="<?php echo $result1['phone_number']; ?>" autocomplete="off" required>
            </div>
            <div class="gender">
                <label >Gender</label><br>
                <input type="radio" id="male" name="gender1" value="male" autocomplete="off"  required> Male <br>
                <input type="radio" name="gender1" value="female"> Female <br>
                <input type="radio" name="gender1" value="other"> Others
            </div>
            <div>
                <label>Address</label><br>
                <textarea id="Address" name="Address1" rows="4" cols="50" autocomplete="off"  required></textarea>
            </div>
            <div>
                <label>Employee Since</label><br>
                <input type="date" id="esince" name="esince1" value="<?php echo $result1['add_date']; ?>" autocomplete="off"  required>
            </div>
            <div>
                <label>User Name</label><br>
                <input type="text" id="uname" name="uname1" placeholder="user name" value="<?php echo $result1['username']; ?>" autocomplete="off"  required>
            </div>
            <div>
                <label>Password</label><br>
                <input type="password" id="pass" name="pass1" placeholder="password" value="<?php echo $result1['password']; ?>" autocomplete="off" required>
            </div>
            <div>
                <label>Upload Photo</label><br>
                <input type="file" id="pfile" name="pfile1" autocomplete="off"   required>
            </div>
            <div>
                <button type="submit" id="subt" name="subt1" required>Submit</button>
            </div>
        </div>
</form>
        <div class="clear"></div>
    </section>
    <script src="1234.js"></script>
</body>

</html>