<?php
    session_start();
    include("logindb.php");

    if(!isset($_SESSION['login']))
    {
        header("Location: login.php");
        exit;
    }

    $userid=$_SESSION['login'];

    $sql = "DELETE FROM register WHERE username='$userid'";
    if($conn->query($sql)==FALSE)
    {
        echo "Error deleting profile: ".$conn->error;
    }
    else
    {
        unset($_SESSION["login"]);
        echo '<script>alert("Profile deleted successfully.")</script>';
        header("Location:login.php");
    }
?>