<?php
//2nd page
require 'Validation.php';

class dataBase{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    protected $con;
    protected $sql;

    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        if (!$this->con) {
            echo"Failed to connect" . mysqli_connect_error(),"<br>";
        } else {
            echo "Successfully connected", "<br>";
        }
    }

    public function CheckDataBaseExist($name)
    {
        if (empty(mysqli_fetch_array(mysqli_query($this->con, "SHOW DATABASES LIKE '$name'")))) {
            return "true";
        } else {
            return "false";
        }
    }

    public function createDataBase($name)
    {
        $this->sql = "CREATE DATABASE $name";
        if (mysqli_query($this->con, $this->sql)) {
            echo "$name Database have been successfully Created", "<br>";
        } else {
            echo "Error in connection".mysqli_connect_error(),"<br>";
        }
      return $this->con;
    }

    public function connectDataBase($name)
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password, $name);
        if ($this->con) {
            echo "$name has been connected","<br>";
            // echo"<br>",$name;
            return $this->con;
        } else {
            echo "Failed to connect" . mysqli_connect_error(),"<br>";
            return NULL;
        }
    }

}

class Table extends dataBase{
    public function CheckTable($name, $con)
    {
        $table_check = "SHOW TABLES LIKE '$name'";
        $table_result = mysqli_query($con, $table_check);
        if (mysqli_num_rows($table_result) == 1) {
            return "true";
        } elseif (mysqli_num_rows(mysqli_query($con, $table_check)) == 0) {
            return "false";
        }
    }
    public function CreateTable($name, $con)
    {
        $this->sql = "CREATE TABLE `$name` (`s.no` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `phone_Number` INT(10) NOT NULL ,`date_of_birth` VARCHAR(10) NOT NULL, `email` VARCHAR(30) NOT NULL , `address` VARCHAR(40) NOT NULL , `website` VARCHAR(15) NOT NULL , `maths` INT(3) NOT NULL , `physics` INT(3) NOT NULL , `chemistry` INT(3) NOT NULL ,`image` longblob NOT NULL, PRIMARY KEY (`s.no`))";
        if (mysqli_query($con, $this->sql)) {
            echo "$name table have been successfully Created", "<br>";
            return true;
        } else {
            echo "Error in Creation".mysqli_error(),"<br>";
            return null;
        }
    }
}
class Insertdata{
    public function InsertIntoTable($tableName, $con, $name, $number, $DateOfBirth, $Email, $address, $website, $maths, $physics, $chemistry,$imgContent )
    {
        $sql = "INSERT INTO $tableName ( name , phone_number, date_of_birth, email, address, website, maths, physics, chemistry, image ) VALUES ('$name','$number','$DateOfBirth','$Email','$address','$website','$maths','$physics','$chemistry','$imgContent')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "Inserted","<br>";
        } else {
            echo "failed" . mysqli_error(),"<br>";
        }
    }
}

$connection = "";
$TableStatus= false;
$data = new dataBase();
$databasename = "form_content";
$result1 = $data->CheckDataBaseExist($databasename);
if ($result1 == "true")
{
    $connection = $data->createDataBase($databasename);
}
else
{
   $connection = $data->connectDataBase($databasename);
}
$tableName = "form_Contents_table";
$table = new Table();
$result = $table->CheckTable($tableName, $connection);
if ($result == "true")
{
    echo "already exist","<br>";
    $TableStatus = true;

}
elseif ($result == "false")
{
    $TableStatus = $table->CreateTable($tableName, $connection);
    echo "successfully Created","<br>";
}
if($TableStatus = true){
    $data = new Insertdata();
    $data->InsertIntoTable($tableName, $connection, $name, $number, $DateOfBirth, $Email, $address, $website, $maths, $physics, $chemistry,$imgContent );
}
require 'DisplayDatabase.php';





