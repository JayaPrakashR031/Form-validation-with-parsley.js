<?php
//1st page
if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST["name"];
        $number = $_POST["number"];
        $DateOfBirth = $_POST["date"];
        $Email = $_POST["email"];
        $address = $_POST["address"];
        $website = $_POST["website"];
        $maths = $_POST["maths"];
        $physics = $_POST["physics"];
        $chemistry = $_POST["chemistry"];
        $image  = $_FILES["image"]["tmp_name"];
        $imgContent = addslashes(file_get_contents($image));
}
