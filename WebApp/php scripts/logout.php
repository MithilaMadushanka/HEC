<?php
    require_once('dbConnection.php');

    session_start();


    $id=$_SESSION['user_id'];
    $query;
    $result;

    $query="DELETE FROM logginList WHERE user_id=$id";
    $result=mysqli_query($con,$query);
    if ($result) {
    	header('Location: ../index.php');
    }
    $_SESSION= array();
   
    if(isset($_COOKIE[session_name()]))
    {
        setcookie(session_name(),'',time()-86400,'/');
    }
    session_destroy();


    
?>