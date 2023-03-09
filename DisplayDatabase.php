<?php
//3rd page
class Display{
    private $sql;
    public function Displaydata($con,$tableName){
        $this->sql= "SELECT * FROM $tableName";
        $Result = mysqli_query($con,$this->sql);
        return $Result;
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table,th,td{
        border: 2px solid black;
        border-collapse: collapse;
        padding: 10px;
    }
</style>
<body>
    <table>
        <tr>
            <th>S.No:</th>
            <th>NAME:</th>
            <th>PHONE NUMBER:</th>
            <th>DATE OF BIRTH:</th>
            <th>E-MAIL:</th>
            <th>ADDRESS:</th>
            <th>WEBSITE:</th>
            <th>MATHS:</th>
            <th>PHYSICS:</th>
            <th>CHEMISTRY:</th>
            <th>AVERAGE:</th>
        </tr>
        <?php
        $display =new Display();
        $DisplaydataResult=$display->Displaydata($connection,$tableName);
        if( mysqli_num_rows($DisplaydataResult)> 0){
            while($row =  mysqli_fetch_assoc($DisplaydataResult)){
                echo "<tr><td>",$s_no =$row['s.no'],"</td>";
                echo "<td>",$name =$row['name'],"</td>";
                echo "<td>",$PhoneNumber =$row['phone_Number'],"</td>";
                echo "<td>",$DateOfBirth =$row['date_of_birth'],"</td>";
                echo "<td>",$email =$row['email'],"</td>";
                echo "<td>",$address =$row['address'],"</td>";
                echo "<td>",$website =$row['website'],"</td>";
                echo "<td>",$maths =$row['maths'],"</td>";
                echo "<td>",$physics =$row['physics'],"</td>";
                echo "<td>",$chemistry =$row['chemistry'],"</td>";
                echo "<td>",$average = number_format((float)($row['chemistry']+$row['maths']+$row['physics'])/3, 2, '.', ''),"</td>";
                echo "<td>";echo "<img src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."'/>";echo "</td></tr>";
            }
        }?>
    </table>
</body>
</html>

