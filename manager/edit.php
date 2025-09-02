<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: ../login/login.php");
        exit;
    }
    include '../user/connect.php';
    $photo=$_SESSION['pho_to'];
?>
<?php
$showalart=false;
include '../user/connect.php';
$Uname=$_REQUEST['un'];
$sql1="SELECT * FROM `add_manager` WHERE username='$Uname'";
$query=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($query);
?>

<?php
if($_SERVER["REQUEST_METHOD"]=='POST')
{
    
   
   $First_name=$_POST["f_n"];
   $Last_name=$_POST["l_n"];
   $Phone_number=$_POST["p_n"];
   $Email=$_POST["em"];
   $User_name=$_POST["u_n"];
   $password=$_POST["pa"];
   $exists=false;
   $existsql="select * from `add_manager` where username='$User_name'";
   $result=mysqli_query($conn,$existsql);
   $numrows=mysqli_num_rows($result);
   if($numrows > 0)
   {
     echo "This user name already have!!!";
   }
   else
   {
    $sql="UPDATE `add_manager` SET `first_name`='$First_name', `last_name`='$Last_name', `phone_number`='$Phone_number',`Email`='$Email',`username`='$User_name', `password`='$password' WHERE username='$Uname'";
    $result1=mysqli_query($conn,$sql);
    if($result1)
    {
        $showalart=true;
    }
    header('location:manageuser.php');
    
   }
   
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
                <h2></i> Edit User </h2>
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
        <div class="ddd" style="padding:10px;">
            <div>
                <label>First Name</label><br>
                <input type="text" id="fname" name="f_n" value="<?php echo $row['first_name'] ?>" placeholder="First name" required>
            </div>
            <div>
                <label>Last Name</label><br>
                <input type="text" id="pnum" name="l_n" value="<?php echo $row['last_name'] ?>" placeholder="Last Name" required>
            </div>
            <div>
                <label>Phone Number</label><br>
                <input type="text" id="pnum" name="p_n" value="<?php echo $row['phone_number'] ?>" placeholder="Phone Number" required>
            </div>
            <div>
                <label>Email</label><br>
                <input type="text" id="pnum" name="em" value="<?php echo $row['Email'] ?>" placeholder="Email" required>
            </div>
            <div>
                <label>User Name</label><br>
                <input type="text" id="esince" name="u_n" value="<?php echo $row['username'] ?>" placeholder="User Name" required>
            </div>
            <div>
                <label>Password</label><br>
                <input type="password" id="esince" name="pa" value="<?php echo $row['password'] ?>" placeholder="Password" required>
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