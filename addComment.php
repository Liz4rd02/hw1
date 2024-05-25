
<?php
    session_start();
    if(!isset($_SESSION['username'])){ 
        header("Location: login.php");
        exit;
    }
    $conn = mysqli_connect("localhost", "root", "", "opgg_database") or die(mysqli_connect_error());
    if(isset($_POST["comment"])){
        $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
        $username = mysqli_real_escape_string($conn, $_SESSION["username"]);
        $champName = mysqli_real_escape_string($conn, $_POST["champName"]);

        $date = date("d/m/Y");
        $time = date("H:i:s");

        $query = "insert into comments values ('".$champName."','".$username."','".$date."','".$time."','".$comment."')";

        //mysqli_report(MYSQLI_REPORT_OFF);
        $res = mysqli_query($conn, $query);
        if($res) echo "0";
        else echo "-1";
        mysqli_close($conn);
    }
?>