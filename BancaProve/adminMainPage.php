<!DOCTYPE html>
<html>


<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>LorenzoRottigni's bank</title>
</head>




<body class="BGadmin">
    <?php
        //inizializzazione variabili di sessione
        session_start(); 
        //collegamento db bankofbrianza
        $mysqli = new mysqli("localhost","1337.Lorenzo","c5bd49af1f55c8fc93489e4fd4a4b370","bankofbrianza");
        // Check connection
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }


        //LOGGED USER TOP SCREEN LEFT       AND         LOGOUT TOP RIGHT
        echo "<form method=\"post\"><div class=\"topLogA\"><h2 class=\"topLogA\">- ADMIN USER AREA -</h2></div><div class=\"topLogout\"><input type=\"submit\" name=\"logout\" id=\"logout\" value=\"LOGOUT\"></div></form>";
    

        //IF PRESS LOGOUT
        if(isset($_POST["logout"])){
            header('Location: index.php');
        }
        ?>
        <br>


        <div class="userDiv">
    <h1>WELCOME BACK MASTER!</h1>
    </div>
     
    <!--SELECT * FROM CLIENT -->
    <div class="userDiv">
    <h1 class="topLogA">YOUR CUSTOMERS:</h1>
        <?php
            $sql = "SELECT * FROM Client;";
            
            $result = $mysqli -> query("SELECT * FROM client;");// First parameter is just return of "mysqli_connect()" function
            echo "<br>";
            echo "<table class=\"adminOutput\" border='1'>";
            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                echo "<tr>";
                foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
    <div class="userDiv">
    <h1 class="topLogA">YOUR CUSTOMERS BANK ACCOUNTS:</h1>
        <?php
            $sql = "SELECT * FROM Client;";
            
            $result = $mysqli -> query("SELECT * FROM bankaccount;");// First parameter is just return of "mysqli_connect()" function
            echo "<br>";
            echo "<table class=\"adminOutput\" border='1'>";
            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                echo "<tr>";
                foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
    <div class="userDiv">
    <h1 class="topLogA">MOVEMENTS:</h1>
        <?php
            $sql = "SELECT * FROM Movement;";
            
            $result = $mysqli -> query($sql);// First parameter is just return of "mysqli_connect()" function
            echo "<br>";
            echo "<table class=\"adminOutput\" border='1'>";
            
            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                echo "<tr>";
                foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
    <fieldset class="userDiv">
    <p>TOWN(cap[PK], nameT);</p>
    <p>CLIENT(idC[PK], nameC, surnameC, cfC, areaCodeC, p_numberC, birthC, addressC, capCodeC[FK], citizenshipC, professionC, mailC, salaryC)</p>
    <p>BANKACCOUNT(idB[PK], balanceB, pwB, signDateB, cvcB, pinB, codC[FK])</p>
    <p>MOVEMENT(idM[PK], typeM, dateM, causalM, targetIBAN, amountM, codB[FK])</p>
            <div><form method="POST">
                <h2>PERFORM YOUR OWN QUERY</h2>
                <textArea maxlength="180"  cols="50" rows="6" wrap="hard" name="query">SELECT * FROM client;</textarea><br>
                <input type="submit" class="queryButton" name="performQ" id="performQ" value="performQ">
                <?php
                    if(isset($_POST["performQ"])){
                    $sql = $_POST["query"];
                    $result = $mysqli -> query($sql);// First parameter is just return of "mysqli_connect()" function
                    echo "<br>";
                    echo "<table class=\"adminOutput\" border='1'>";
                    
                    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                        echo "<tr>";
                        foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                            echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                ?>
            </form></div>
    </fieldset>
    
</body>
</html>