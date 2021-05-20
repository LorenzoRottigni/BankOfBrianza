<!DOCTYPE html>
<html>


<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="movementsForm.js"></script>

    <title>LorenzoRottigni's bank</title>
</head>




<body>
<div class="title">
            <h1>BANK OF BRIANZA</h1>
        </div> 
        <div class="chooseB">
            <div>
                <form method="post">
    <?php
        session_start();
        $idC=$_SESSION['IDutente'];
        $nameC=$_SESSION['nomeU'];
        $pwU=$_SESSION['pwU'];
        $mysqli = new mysqli("localhost","$idC.$nameC","$pwU","bankofbrianza");
        // Check connection
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        $sql = "SELECT idB FROM bankaccount WHERE codC = '$idC';";
        $result = $mysqli -> query($sql);
        if(isset($_POST["logB"])){
            $insertedIBAN=$_POST["writeId"];
            $_SESSION['idB']=$insertedIBAN;
            Header('Location: mainPage.php');
        }
        echo "<h2>your bankaccounts:</h2>";
        echo " <table class=\"userTable\" border='1'>";
            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                echo "<tr><th>ID</th>";
                echo "<tr>";
                foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
            }
            
            echo "</table>";
            echo "<div><label for=\"WriteId\"<h3>Write here the bank account IBAN you want to access to:</h3></label><br>";
            echo "<input type\"textBox\" id=\"writeId\" name=\"writeId\" placeholder=\"IBAN\">
                  <br><button class=\"buttonInsertPW\" id=\"logB\" name=\"logB\">SUBMIT</button></div>";
            

        ?>
        </div>
        </div>
        </form>
</body>
</html>