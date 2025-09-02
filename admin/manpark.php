
<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: ../login/login.php");
        exit;
    }
   
?>


<?php
include 'conect.php';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
$User_name=$_POST["search"];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="parkman.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>
    Manage Parking Section 
    </title>
</head>
<body>
    <section id="sidebar">
        <div class="sidebar-brand">
            <h2><i class="fa fa-apps"></i>Apps</h2>
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
                <h2> Manage Parking Section </h2>
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
        <div class="dddd">
            <form method="post">
            <div class="aaa">
                <h3>List</h3>
                <input type="text" id="ser" name="search" placeholder="Search Parking Area" required>
                <button type="submit" class="boton" ><i class="fa fa-search"></i></button>
            </div>
            </form>
            <hr>
            <table class="tab">
            <tr>
                <th>s.no</th>
                <th>Parking Area</th>
                <th>Vehicle Category</th>
                <th>Parking Rate Per Hour</th>
                <th>Vacant Space</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $count=0;
            if(isset($_POST['search']))
            {
                $ser=$_POST['search'];
                $sql="SELECT * FROM `pa_lo` WHERE parking_area LIKE '%$ser%'";
                $ser=null;
            }else
            $sql="SELECT * FROM `pa_lo`";

            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0)
            {
            while($row=mysqli_fetch_assoc($result))
            {
                $count++;
            ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $row['parking_area']; ?></td>
                <td><?php echo $row['vechile_category']; ?></td>
                <td><?php echo $row['rate_per_hour']; ?></td>
                <td><?php echo $row['vacant_space']; ?></td>
                <td><button class="edit"><a href='editpl.php? un=<?php echo $row['parking_area']; ?>'style='color:white;'>Edit</a><button></td>
                <td><button class="delete"><a href="deletepl.php? un=<?php echo $row['parking_area']; ?>" style='color:white;'>Delete</a></button></td>
            </tr>
            <?php
            }
            }        
            ?>
        </table>
        </div>
    </section>
    <script src="1234.js"></script>
</body>
</html>