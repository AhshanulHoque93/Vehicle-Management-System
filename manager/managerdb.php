<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: ../login/login.php");
        exit;
    }
?>
<?php
    include '../user/connect.php';
     $pa_area=$_SESSION['p_area'];
     $data="select * from `pa_lo` where parking_area='$pa_area'";
     $result=mysqli_query($conn,$data);
     $numr=mysqli_fetch_assoc($result);
     $space= $numr['vacant_space'];
     $photo=$_SESSION['pho_to'];
     
?>

<?php
 $data1="select * from `chk_in` where Parking_zoon='$pa_area'";
 $result1=mysqli_query($conn,$data1);
 $numrows=mysqli_num_rows($result1);
 $vacent_sp=($space-$numrows);

?>
<?php
$amout=0;
 $data12="select * from `add_money` where Parking_zoon='$pa_area'";
 $result4=mysqli_query($conn,$data12);
 while($arr1=mysqli_fetch_assoc($result4))
{
    $val=$arr1["Amount"];
    $amout=($amout+$val);
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css" />
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
                <div class="item"><a href="managerdb.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></div>
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
                <div class="item"><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></div>
            </div>
        </div>
    </section>
    <section id="main-content">
        <header class="main-header">
            <div class="header-left1">
                <h2 class="toggle-btn"><i class="fa fa-bars"></i> Dashboard </h2>
            </div>
            <div class="header-center">
                <h3>Vehicle Parking Management System</h3>
            </div>
            <div class="header-left">
                <img style=" width:46px; height: 46px;" src="../admin/images/<?php echo $photo ?>" class="img-responsive" />
                <p style="margin-left:34%;">Manager</p>
            </div>

            <div class="clear"></div>
        </header>
        <div class="clear"></div>
        <div class="main-content-info container">
            <div class="card-box">
                <p><?php echo  $pa_area ?></p>
                <h3 style="padding-top:5px;">Total Space : <?php echo  $space ?></h3>
            </div>
            <div class="card-box">
                <p>Total Vacant Space</p>
                <h2 class="cus-num cus-pro"><?php echo $vacent_sp ?></h2>
            </div>
            <div class="card-box">
                <p>Occupied Space</p>
                <h2 class="cus-num cus-ord"><?php echo $numrows ?></h2>
            </div>
            <div class="card-box">
                <p>Total Money</p>
                <h2 class="cus-num cus-inc"><?php echo $amout ?></h2>
            </div>
            <div class="clear"></div>
        </div>

        <div class="dddd">
            <form method="post">
            <div class="aaa">
                <h3>Booking Details</h3>
                <input type="text" id="ser" name="search_user" placeholder="Search Parking Area" required>
                <button type="submit" name="search" class="boton" ><i class="fa fa-search"></i></button>
            </div>
            </form>
            <hr>
            <table class="tab" style="margin:10px;">
            <tr>
                <th>sr.no</th>
                <th>Vehicle Name</th>
                <th>Parking Area</th>
                <th>Registration</th>
                <th>Action</th>
            </tr>
            <?php
             if(isset($_REQUEST['search']))
             {
                 $recv=$_REQUEST['search_user'];
                 $data="select * from `booking_info` where reg_num='$recv'";;
 
             }
             else
             {
                $data="SELECT *  from booking_info";
             }
                $result=mysqli_query($conn,$data);
                $sil=0;
                while($arr=mysqli_fetch_assoc($result))
                {
                    if($arr["parking_zone"]==$pa_area)
                    {
                    $sil=$sil+1;  
                                
                ?>
            <tr>
                <th><?php echo $sil; ?></th>
                <th><?php echo $arr["vechil_name"];?></th>
                <th><?php echo $arr["parking_zone"];?></th>
                <th><?php echo $arr["reg_num"];?></th>
                <td><button style="background-color:red; border:none; padding:4px;" class=" btn btn-primary delete"> <a href="delete _book.php? un=<?php echo $arr['User_name']; ?>">Delete</a></button></td>
            </tr>

            <?php
                    }
                }
            ?>
            </table>
    </section>
    <script src="1234.js"></script>
</body>
</html>