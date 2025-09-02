<?php

    include '../user/connect.php';
    $k=$_POST["c"];
    $sql1="select * from chk_in where Reg_number={$k}";
    $result=mysqli_query($conn,$sql1);
    while($rows=mysqli_fetch_array($result))
    {

        $data['lname']=$rows["User_name"];
        $data['p2']=$rows["Phone_number"];
        $data['p4']=$rows["Parking_zoon"];
        $data['p5']=$rows["vechile_name"];
        $data['esince1']=$rows["Time"];

    }

    echo json_encode($data);
?>