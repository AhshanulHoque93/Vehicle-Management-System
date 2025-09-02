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
    <link rel="stylesheet" href="man.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>
    Park History
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
                <h2> Park History </h2>
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
                <input type="text" id="ser" name="search" placeholder="Search by Username" required>
                <button type="submit" class="boton" ><i class="fa fa-search"></i></button>
            </div>
            </form>
            <hr>
            <table class="tab">
            <tr>
                <th>sr.no</th>
                <th>Username</th>
                <th>Check-in Time</th>
                <th>Check-out Time</th>
                <th>Location</th>
                <th>Status</th>
                <th>Registration Number</th>
            </tr>
            <?php
             $count=0;
             $k=0;
              if(isset($_REQUEST['search']))
              {
                  $recv=$_REQUEST['search'];
                  $data="select * from chk_in where User_name='$recv'";
                  $result2=mysqli_query($conn,$data);
                  $numrows=mysqli_num_rows($result2);
                 if($numrows == 0)
                 {
                    $data="select * from chk_out where User_name='$recv'";
                    $result1=mysqli_query($conn,$data);
                    goto nex;
                 }
   
                 $k=1;
              }
              else
              {
                $sql="SELECT * FROM chk_in";
                $result2=mysqli_query($conn,$sql);
              }
           
            
            while($row=mysqli_fetch_assoc($result2))
            {
                $status1="check in";
                $count++; 
            ?>

             <tr>
                <th><?php echo $count ?></th>
                <th><?php echo $row['User_name']; ?></th>
                <th><?php echo $row['Phone_number']; ?></th>
                <th><?php echo $row['Time']; ?></th>
                <th><?php echo "0000-00-00 00:00:00"; ?></th>
                <th><?php echo $status1 ?></th>
                <th><?php echo $row['Reg_number']; ?></th>
            </tr>
            <?php
            }
            if($k==1)
            {
                goto go;  
            }
              
            ?>
             <?php
            $sql="SELECT * FROM chk_out";
            $result1=mysqli_query($conn,$sql);
            nex:
            while($row=mysqli_fetch_assoc($result1))
            {
                $status1="check out";
                $count++; 
            ?>

             <tr>
                <th><?php echo $count ?></th>
                <th><?php echo $row['User_name']; ?></th>
                <th><?php echo $row['Phone_number']; ?></th>
                <th><?php echo $row['ch_in']; ?></th>
                <th><?php echo $row['ch_out'];?></th>
                <th><?php echo $status1 ?></th>
                <th><?php echo $row['Reg_number']; ?></th>
            </tr>
            <?php
            }
            go:     
            ?>
        </table>
        </div>
    </section>
    <script src="1234.js"></script>
</body>
</html>