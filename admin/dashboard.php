
<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: ../login/login.php");
        exit;
    }
   $data1=0;
   $data2=0;
   $data3=0;
   $data4=0;
   
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
                <div class="item"><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></div>
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
                <img src="33.jpg" class="img-responsive" />
                <p>Admin</p>
            </div>
            <div class="clear"></div>
        </header>
        <div class="clear"></div>
        <div class="main-content-info container">
        <?php
            include 'conect.php';
            $sql="SELECT COUNT(DISTINCT parking_area) AS `park_area1` FROM `pa_lo` ";
            $query=mysqli_query($conn,$sql);
            $result1=mysqli_fetch_assoc($query);
            $data1=$result1['park_area1'];
            if($data1==0)
            {
                $data1=0;
            }?>
            <div class="card-box">
                <p>Total Parking Locations</p>
                <h2 class="cus-num cus-h"><?php echo $data1?></h2>
            </div>
            <?php
            include 'conect.php';
            $sql="SELECT SUM(vacant_space) AS `vac_space1` FROM `pa_lo` ";
            $query=mysqli_query($conn,$sql);
            $result1=mysqli_fetch_assoc($query);
            $data2=$result1['vac_space1'];
            if($data2==0)
            {
                $data2=0;
            }
            ?>
            <div class="card-box">
                <p>Total Vacant Space</p>
                <h2 class="cus-num cus-pro"><?php echo $data2?></h2>
            </div>
            <?php
            include 'conect.php';
            $sql="SELECT COUNT(*) AS `vac_space1` FROM `chk_in` ";
            $query=mysqli_query($conn,$sql);
            $result1=mysqli_fetch_assoc($query);
            $data3=$result1['vac_space1'];
            if($data3==0)
            {
                $data3=0;
            }
            ?>
            <div class="card-box">
                <p>Occupied Space</p>
                <h2 class="cus-num cus-ord"><?php echo $data2-$data3;?></h2>
            </div>
            <?php
            include 'conect.php';
            $sql="SELECT SUM(Amount) AS `vac_space1` FROM `add_money` ";
            $query=mysqli_query($conn,$sql);
            $result1=mysqli_fetch_assoc($query);
            $data4=$result1['vac_space1'];
            if($data4==0)
            {
                $data4=0;
            }
            ?>
            <div class="card-box">
                <p>Total Money</p>
                <h2 class="cus-num cus-inc"><?php echo $data4;?></h2>
            </div>
            <div class="clear"></div>
        </div>

        <div class="dddd">
            <form method="post">
            <div class="aaa">
                <h3>Booking Details</h3>
                <input type="text" id="ser" name="search" placeholder="Search Parking Area" required>
                <button type="submit" class="boton" ><i class="fa fa-search"></i></button>
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
                $count=0;
                if(isset($_POST['search']))
                {
                    $ser=$_POST['search'];
                    $sql="SELECT * FROM `booking_info` WHERE reg_num =$ser ";
                    $ser=null;
                }else
                $sql="SELECT * FROM `booking_info`";

                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                while($row=mysqli_fetch_assoc($result))
                {
                    $count++;
                ?>
                <tr>
                    <td style='height:5px;'><?php echo $count ?></td>
                    <td style='height:5px;'><?php echo $row['vechil_name']; ?></td>
                    <td style='height:5px;'><?php echo $row['parking_zone']; ?></td>
                    <td style='height:5px;'><?php echo $row['reg_num']; ?></td>
                    <td style='height:5px; '><button class="delete"><a href="deletebi.php? un=<?php echo $row['reg_num']; ?>" style='color:white; background-color:red;'>Delete</a></button></td>
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