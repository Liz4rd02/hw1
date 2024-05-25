<?php
    $result = 0; //0 -> nessun errore
    $max_lenght_onDB = 16;
    function contieneCarattereSpeciale($stringa) {
        $caratteriSpeciali = "!£/=?!@#$%^&*()-+'^\|.;,:_°[]<>";
        for ($i = 0; $i < strlen($stringa); $i++) {
            if (strpos($caratteriSpeciali, $stringa[$i]) !== false) {
                return true;
            }
        }
        return false;
    }
    function contieneCarattereNumerico($stringa) {
        $caratteriNumerici = "0123456789";
        for ($i = 0; $i < strlen($stringa); $i++) {
            if (strpos($caratteriNumerici, $stringa[$i]) !== false) {
                return true;
            }
        }
        return false;
    }

    if(isset($_POST["username"]) && isset($_POST["password"])) {
        if(strlen($_POST["username"])>$max_lenght_onDB or strlen($_POST["password"])>$max_lenght_onDB){
            global $result;
            $result = 2;
        }
        else if(!contieneCarattereSpeciale($_POST["password"]) or !contieneCarattereNumerico($_POST["password"])){
            global $result;
            $result = 1;
        }
        else{
            $conn = mysqli_connect("localhost", "root", "", "opgg_database") or die(mysqli_connect_error());
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);

            $query = "insert into users values ('".$username."','".$password."')";

            mysqli_report(MYSQLI_REPORT_OFF);
            
            $res = mysqli_query($conn, $query);
            if($res){
                mysqli_close($conn);
                header("Location: login.php");
                exit;
            }
            else{
                mysqli_close($conn);
                global $result;
                $result = 3;
            }
    
        }
    }

?>



<html>
    <head>
        <link rel='stylesheet' href='login.css'>
        <script src='register.js' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
            <a href="index.php" id="logo">OP.GG</a>
        </header>
        <div id="login_container">
            <h2>Register</h2>
            <form name="login_form" method='post'>
                <label>Username<input type='text' name='username' class="in1"></label>

                <label>Password <input type='password' name='password' class="in1"></label>

                <span class="invalid_data username hidden"></span>
                <span class="invalid_data password hidden"></span>
                <?php
                    if($result === 2){
                        echo "<span class='invalid_data inv2'>";
                        echo "lunghezza max username/password: 16 caratteri.";
                        echo "</span>";
                    }
                    else if($result === 1){
                        echo "<span class='invalid_data inv2'>";
                        echo "la password richiede almeno 1 carattere speciale e numerico.";
                        echo "</span>";
                    }
                    else if($result === 3){
                        echo "<span class='invalid_data inv2'>";
                        echo "Registrazione fallita: username già in uso.";
                        echo "</span>";
                    }
                ?>

                <label id="submit_container"><input type='submit' id="submit" name="submitButton"></label>

            </form>
            <span>Already a member? <a href="login.php">Login now!</a></span>
        </div>  
    </body>
</html>