<?php
    include("connection.php");
    if(isset($_POST['submit']))
    {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from login where username = '$username' and password = '$password'";

        $statement = $conn->prepare($sql); 
        $statement->execute(); 
        $count = $statement->fetch(PDO::FETCH_NUM);
        if ($count = 1)
        {
            echo "1";
        }
        else
        {
            echo "3";
        }
    }
    else
    {
        echo "2";
    }



?>