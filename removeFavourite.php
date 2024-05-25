<?php
    session_start();
    if(!isset($_SESSION['username'])){ 
        header("Location: login.php");
        exit;
    }
    $conn = mysqli_connect("localhost", "root", "", "opgg_database") or die(mysqli_connect_error());
    if(isset($_POST["favourite"])){
        $favourite = mysqli_real_escape_string($conn, $_POST["favourite"]);
        $username = mysqli_real_escape_string($conn, $_SESSION["username"]);

        $query = "delete from favourites where username='".$username."' and summonerName='".$favourite."'";
        //mysqli_report(MYSQLI_REPORT_OFF);
        $res = mysqli_query($conn, $query);
        if($res) echo "0";
        else echo "-1";
    }
    mysqli_close($conn);
?>