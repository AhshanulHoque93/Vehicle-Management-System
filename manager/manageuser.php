<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: ../login/login.php");
        exit;
    }
    $photo=$_SESSION['pho_to'];
?>
<?php
    include '../user/connect.php';

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
        Admin Dashboard
    </title>
</head>
<body>
    <section id="sidebar">
        <div class="sidebar-brand">
            <h2><i class="fa fa-apps"></i>Apps</h2>
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
                <h2> Manage User </h2>
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
        <div class="dddd">
            <form method="post">
            <div class="aaa">
                <h3>List</h3>
                <input type="text" id="ser" name="search_user" placeholder="Search By User_Name" required>
                <button type="submit" name="search" class="boton" ><i class="fa fa-search"></i></button>
            </div>
            </form>
            <hr>
            <table class="tab">
            <tr>
                <th>s.no</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $count=0;
            if(isset($_REQUEST['search']))
            {
                $recv=$_REQUEST['search_user'];
                $sql="select * from `add_manager` where username='$recv'";;

            }
            else
            {
            $sql="SELECT * FROM `add_manager` ";
            }
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                if($row['User_type']=='User')
                {
                $count++;
            ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><button class="edit"><a href='edit.php? un=<?php echo $row['username']; ?>'>Edit</a><button></td>
                <td><button class=" btn btn-primary delete"> <a href="delete.php? un=<?php echo $row['username']; ?>">Delete</a></button></td>
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