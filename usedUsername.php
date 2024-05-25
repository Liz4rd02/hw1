<?php
    if(isset($_GET["username"])) {
       
        $conn = mysqli_connect("localhost", "root", "", "opgg_database") or die(mysqli_connect_error());
        $username = mysqli_real_escape_string($conn, $_GET["username"]);

        $query = "select * from users where username='".$username."'";
            
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res)>0){
            mysqli_close($conn);
            echo "-1";
        }
        else{
            mysqli_close($conn);
            echo "0";
        } 
    }

?>