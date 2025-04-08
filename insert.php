<?php
    if (isset($_POST['submit'])) {
        $con=new mysqli("localhost","root","","demo");
        if ($con->connect_error) {
            die("Couldn't Connect to Db".$con->connect_error1);
        }
        $a=$_POST['name'];
        $b=$_POST['age'];
        $c=$_POST['city'];
        $sql="insert into student(snm,age,city) values('$a','$b','$c')";
        if ($con->query($sql)===TRUE) {
            echo "Done";
        }
        else {
            echo "Sorry";
        }
    }
?>