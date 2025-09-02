<?php

    include '../user/connect.php';
    $k=$_POST["c"];
    $sql1="select * from booking_info where reg_num={$k}";
    $result=mysqli_query($conn,$sql1);
    while($rows=mysqli_fetch_array($result))
    {

        $data['lname']=$rows["User_name"];
        $data['p2']=$rows["Phone_number"];
        $data['p4']=$rows["parking_zone"];
        $data['p5']=$rows["vechil_name"];
    }

    echo json_encode($data);
?>