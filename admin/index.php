<?php
        session_start();
        if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
        {
            header("location: ../login/login.php");
            exit;
        }       
        $Name=0;
        $VehicleCategory=0;
        $VehicleName=0;
        $Date=0;
        $ParkingZoon=0;
        $Amount=0;
        include 'conect.php';
        $username=$_SESSION['reg_no'];
        $sql="SELECT * FROM `chk_out` WHERE Reg_number=$username";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $Name=$row['User_name'];
                $VehicleName=$row['vechile_name'];
                $Date=$row['ch_out'];
                $ParkingZoon=$row['Parking_zoon'];
            }
        }
        $sql="SELECT * FROM `add_money` WHERE Reg_number=$username";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $Amount=$row['Amount'];
            }
        }
        require('fpdf184/fpdf.php');
        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,10,'RRR Vechicle Parking Lot',0,1,'C');
        $pdf->Cell(190,10,'Money Receipt',0,1,'C');
        $pdf->Cell(100,10,'Zoon Name:',1,0,'L');
        $pdf->Cell(90,10,$ParkingZoon,1,1,'L');
        $pdf->Cell(100,10,'User Name:',1,0,'L');
        $pdf->Cell(90,10,$Name,1,1,'L');
        $pdf->Cell(100,10,'Vehicle Name:',1,0,'L');
        $pdf->Cell(90,10,$VehicleName,1,1,'L');
        $pdf->Cell(100,10,'Date:',1,0,'L');
        $pdf->Cell(90,10,$Date,1,1,'L');
        $pdf->Cell(100,10,'Total Amount:',1,0,'L');
        $pdf->Cell(90,10,$Amount,1,1,'L');
        $pdf->Cell(190,10,'',0,1,'C');
        $pdf->Cell(190,10,'_________________',0,1,'R');
        $pdf->Cell(190,10,'Manager Signature',0,1,'R');
        //$file=time().'.pdf';
        $pdf->Output();
?>