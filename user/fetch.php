<?php

    include 'connect.php';
    $k=$_POST["c"];
    $sql1="select * from pa_lo where id ={$k}";
    $result=mysqli_query($conn,$sql1);
    while($rows=mysqli_fetch_array($result))
    {

        $data['zones']=$rows["parking_area"];
        

    }
    echo json_encode($data);
?>