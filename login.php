<?php
    session_start();

    if(isset($_SESSION["username"])) {
        header("Location: index.php");
        exit;
    }
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        $conn = mysqli_connect("localhost", "root", "", "opgg_database") or die(mysqli_connect_error());
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
        $res = mysqli_query($conn, $query);
        

        if(mysqli_num_rows($res) > 0){
            $_SESSION["username"] = $_POST["username"];
            mysqli_free_result($res);
            mysqli_close($conn);
            header("Location: index.php");
            exit;
        }
        else{
            mysqli_free_result($res);
            mysqli_close($conn);
            $errore = true;
        }
    }

?>


<html>
    <head>
        <link rel='stylesheet' href='login.css'>
        <script src='login.js' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
            <a href="index.php" id="logo">OP.GG</a>
        </header>
        <div id="login_container">
            <h2>Log in</h2>
            <form name="login_form" method='post'>
                <label>Username<input type='text' name='username' class="in1"></label>

                <label>Password <input type='password' name='password' class="in1"></label>

                <span class="invalid_data hidden"></span>
                <?php
                    if(isset($errore)){
                        echo "<span class='invalid_data' id='credenziali_errate'>";
                        echo "Credenziali non valide.";
                        echo "</span>";
                    }
                ?>
                <label id="submit_container"><input type='submit' id="submit"></label>

            </form>
            <span>Not a member? <a href="register.php">Register now!</a></span>   
        </div>  
    </body>
</html>