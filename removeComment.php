<?php
    session_start();
    if(!isset($_SESSION['username'])){ 
        header("Location: login.php");
        exit;
    }
    $conn = mysqli_connect("localhost", "root", "", "opgg_database") or die(mysqli_connect_error());
    if(isset($_POST["champName"]) and isset($_POST["comment_date"]) and isset($_POST["comment_time"])){
        $username = mysqli_real_escape_string($conn, $_SESSION["username"]);
        $champName = mysqli_real_escape_string($conn, $_POST["champName"]);
        $comment_date = mysqli_real_escape_string($conn, $_POST["comment_date"]);
        $comment_time = mysqli_real_escape_string($conn, $_POST["comment_time"]);


        $query = "delete from comments where username='".$username."' and champName='".$champName."' and comment_date='".$comment_date."' and comment_time='".$comment_time."'";
        //mysqli_report(MYSQLI_REPORT_OFF);
        $res = mysqli_query($conn, $query);
        if($res) echo ("0");
        else echo ("-1");
        mysqli_close($conn);
    }
?>