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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="feedback.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>
        Manager Dashboard
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
                <div class="item"><a href="feedback.php"><i class="fa fa-comments"></i><span>Feedback</span></a></div>
                <div class="item"><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></div>
            </div>
        </div>
    </section>
    <section id="main-content">
        <header class="main-header">
            <div class="header-left1">
                <h2 class="toggle-btn"> Feedback </h2>
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
        <div class="dddd">
            <form method="post">
            <div class="aaa">
                <h3>Message From Users</h3>
            </div>
            <div class="clear"></div>
            </form>
            <hr>
            <table class="tab" style="margin:10px;">
                <tr>
                    <th style='width:20px'>sr.no</th>
                    <th style='width:150px'>Name</th>
                    <th style='width:150px'>Email</th>
                    <th>Message</th>
                </tr>
                <?php
                $count=0;
                $sql="SELECT * FROM `feedback`";

                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                while($row=mysqli_fetch_assoc($result))
                {
                    $count++;
                ?>
                <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['message']; ?></td>
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