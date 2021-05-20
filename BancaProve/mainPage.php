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
    <?php
        //inizializzazione variabili di sessione
        session_start(); 
        include 'class.IBANgenerator.php';
        function frand($min, $max, $decimals = 0) {
            $scale = pow(10, $decimals);
            return mt_rand($min * $scale, $max * $scale) / $scale;
        }
        //collegamento db bankofbrianza
            $idC=$_SESSION['IDutente'];
            $nameC=$_SESSION['nomeU'];
            $pwU=$_SESSION['pwU'];

        //ADMIN USER RECOGNITION*/
        if($idC=='1337'){
            header('Location: adminMainPage.php');
        }
        //DATABASE CONNECTION
        $mysqli = new mysqli("localhost","$idC.$nameC","$pwU","bankofbrianza");
        // Check connection
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        
        
        

        //CHOOSE WHAT ACCOUNT SELECT
        


        //TOP USER LOG BAR
        //IF PRESS LOGOUT
        if(isset($_POST["logout"])){
            header('Location: index.php');
        }
        if(isset($_POST["Home"])){
            header('Location: indexLogged.php');
        }
        //LOGGED USER TOP SCREEN LEFT       AND         LOGOUT TOP RIGHT
        echo "<form method=\"post\"><div class=\"topLog\">
            <h2> PRIVATE USER AREA: $idC - $nameC. |   <img align=\"center\" src=\"images/greenCheck.png\">
            </h2></div><div class=\"topLogout\"><div class=\"topLogoutLeft\"><input type=\"submit\" name=\"Home\" id=\"Home\" value=\"HOME\"></div><div class=\"topLogoutRight\"><input type=\"submit\" name=\"logout\" id=\"logout\" value=\"LOGOUT\"></div></div></form>";    
    ?>
    


    

    <div class="title">
        <h1>your account info:</h1>
    </div>


    <!--DISPLAY CLIENT INFORMATIONS -->
    <div class="userDiv">
        <?php
            $sql = "SELECT * FROM client WHERE idC = $idC;";
            $result = $mysqli -> query($sql);// First parameter is just return of "mysqli_connect()" function
            echo "<br>";
            echo "<table class=\"userTable\" border='1'>";
            
            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                echo "<tr><th>ID</th><th>COGNOME</th><th>NOME</th><th>CF</th><th>PREFISSO</th><th>TELEFONO</th><th>dataNascita</th><th>INDIRIZZO</th><th>CAP</th><th>CITTADINANZA</th><th>PROFESSIONE</th><th>MAIL</th><th>STIPENDIO</th>";
                echo "<tr>";
                foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>





    
    <!-- SIDENAV -->
    <div class="sidenav">

        <!-- DISPLAY BANKACCOUNT INFORMATIONS-->
        <div class="logBankaccount">Your IBAN:
            <?php 
                //GETTING IBAN OF THE BANKACCOUNT
                $result = $mysqli -> query("SELECT idB FROM bankaccount WHERE codC = $idC;");
                //$idB = ($result->fetch_assoc()["idB"])
                $idB = $_SESSION["idB"];
                //PRINT
                echo $idB."<br>";
                //GETTING SIGNDATE OF THE BANKACCOUNT
                $result = $mysqli -> query("SELECT signDateB FROM bankaccount WHERE codC = $idC;");
                $signDateB = ($result->fetch_assoc()["signDateB"]);
                //PRINT
                echo "Your sign date:<br> ".$signDateB;
            ?>
        </div>



        <!-- CHANGE PASSWORD OPTION -->
        <a href="mainPage.php?changePw=true" id="changePw" name="changePw">Change your password</a>
        <?php 
            /*CHANGE PW FORM*/
            if(isset($_GET["changePw"])){
            echo "<form method=\"post\"><div  class=\"logBankaccount\"><table>";
            echo "<tr><td><label for=\"oldPw\">Old password:</label></td>";
            echo "<td><input type=\"password\" id=\"oldPw\" name=\"oldPw\" required></td></tr>";
            echo "<tr><td><label for=\"newPw\">New password:</label></td>";
            echo "<td><input type=\"password\" id=\"newPw\" name=\"newPw\" required></td></tr>";
            echo "<tr><td colspan=\"2\"><input type=\"submit\" class=\"sidebarButton\"  id=\"changePwButton\" name=\"changePwButton\" value=\"CHANGE PASSWORD\" ></td></tr>";
            echo "</table></div></form>";
            }
            //IF SUBMIT CHANGE PASSWORD
            if(isset($_POST["changePwButton"]))
            {
                //non utilizzo la variabile di sessione per rendere piu sicuro il pw change
                //GET CURRENT BANKACCOUNT PW
                $result = $mysqli -> query("SELECT pwB FROM bankaccount WHERE codC = '$idC';");
                $correctOldPw = ($result->fetch_assoc()["pwB"]);

                //getting inserted old and new pw
                $newPw=$_POST["newPw"];
                $oldPw=$_POST["oldPw"];
                //encrypting pws
                $oldPw=md5($oldPw);
                $newPw=md5($newPw);
                //case no password inserted
                if($newPw==""){
                    echo "<div  class=\"logBankaccount\">insert a value</div>";
                }
                else{
                    //if pws match
                    if($oldPw==$correctOldPw){
                        //PW CHANGE
                        $queryChangePw=$mysqli -> query("UPDATE `bankaccount` SET `pwB` = '$newPw' WHERE `bankaccount`.`codC` = '$idC'");
                        if($queryChangePw){
                            echo "<form action=\"mainPage.php\"><div  class=\"logBankaccount\">password changed!<br><input type=\"submit\" class=\"sidebarButton\"  id=\"confirmPw\" name=\"confirmPw\" value=\"Confirm\" ></div></form>";
                        }else{
                            echo "<div  class=\"logBankaccount\">error, try again</div>";
                        }
                        
                    }else{
                        echo "<form action=\"mainPage.php\" ><div id=\"errorPw\" class=\"logBankaccount\">you have inserted a wrong password<br><input type=\"submit\" class=\"sidebarButton\"  id=\"confirmPw\" name=\"confirmPw\" value=\"Confirm\" ></div>";
                    }
                }
            }
        ?>
        <a href="mainPage.php?showCVC=true" id="showCVC" name="showCVC">Show your card CVC</a>
        <?php 
            if(isset($_GET["showCVC"])){
                echo "<div  class=\"logBankaccount\">";
                //GETTING CVC 
                $result = $mysqli -> query("SELECT cvcB FROM bankaccount WHERE codC = $idC;");
                $cvcB = ($result->fetch_assoc()["cvcB"]);
                //PRINTING CVC
                echo "<h4>your CVC is: $cvcB </h4></div>";
            }?>
        <a href="mainPage.php?showPIN=true" id="showPIN" name="showPIN">Show your card PIN</a>
        <?php 
            if(isset($_GET["showPIN"])){
                echo "<div  class=\"logBankaccount\">";
                //GETTING PIN
                $result = $mysqli -> query("SELECT pinB FROM bankaccount WHERE codC = $idC;");
                $pinB = ($result->fetch_assoc()["pinB"]);
                //PRINTING PIN
                echo "<h4>your PIN is: $pinB </h4></div>";
            }?>
    </div>  


    <!-- SIDENAV END -->








    <!-- SELECT * FROM movement -->
    <div class="movementDiv">  
            <?php
            $result = $mysqli -> query("SELECT balanceB FROM bankaccount WHERE codC = '$idC';");
            $balanceB = ($result->fetch_assoc()["balanceB"]) ;  
            
            echo "<h1>BALANCE : ".$balanceB." €</h1>";
            echo "<h2> your latest movements: </h2>";
            echo "<table class=\"movementTable\" border='1'>";
            echo $idB;
            $sql = "SELECT * FROM Movement WHERE codB = '$idB';";
            $result = $mysqli -> query($sql);// First parameter is just return of "mysqli_connect()" function
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




    <!-- TOPNAV -->

    <div class="topnav">
            <a class="active" name="bonifico" href="javascript:home();">home</a>
            <!--<a href="mainPage.php?bonifico">Bonifico?</a>-->
            <a href="javascript:writeBonifico();">bonifico</a>
            <a href="javascript:writeBonifico();">Versamento</a>
            <a href="javascript:writePrelevamento();">Prelevamento</a>
            <a href="javascript:writeImposta();">Pagamento imposte</a>
    </div>


    <!-- DONATION DIV -->
    <div class="donation">
        <form method="post"><h2>send us a donation:</h2>
        <input type="number" id="importoD" name="importoD" placeholder="importo" min="0">
    <input type="submit" class="insertM_button" name="insDonation" id="insDonation" value="INSERT MOVEMENT"></form>
    <?php
    if(isset($_POST["insDonation"])){
        $importo=$_POST["importoD"];
        $timenow=date('y-m-d');
        $getIdB = $mysqli->query("SELECT idB FROM bankaccount WHERE codC = ".$idC.";");
        $idB = ($getIdB->fetch_assoc()["idB"]);
        $result = $mysqli -> query("SELECT balanceB FROM bankaccount WHERE codC = '$idC';");
        $balanceB = ($result->fetch_assoc()["balanceB"]) ;
        $balanceB = $balanceB-$importo;
        $updateBalanceRequester=$mysqli -> query("UPDATE `bankaccount` SET `balanceB` = '$balanceB' WHERE `bankaccount`.`idB` = '$idB'");
        if($updateBalanceRequester){
            echo "<h4>thanks for your donation!</h4>";
            $result = $mysqli -> query("
                        INSERT INTO `movement` (`idM`, `typeM`, `dateM`, `causalM`, `targetIBAN`,
                         `amountM`, `codB`) VALUES (NULL, 'transfer', '$timenow', 
                         'Donation', 'IT95054280000001017', '$importo', '$idB');
                    ");
            if($result)
                    {
                        echo "<h4>movement inserted</h4>";
                    }
        }
    }?>
    </div>
    




    <!-- INSERIMENTO MOVIMENTI -->



    <div id="writeHere" class="skipSidenav">
            <?php
                //$tipoM=$_POST["bonifico"];
                $timenow=date('y-m-d');
                if(isset($_POST["insBonifico"]))
                {
                    $causale=$_POST["causale"];
                    $IBANbeneficiario=$_POST["IBAN1"];
                    $importo=$_POST["importo"];
                    $result = $mysqli -> query("
                        INSERT INTO `movement` (`idM`, `typeM`, `dateM`, `causalM`, `targetIBAN`,
                         `amountM`, `codB`) VALUES (NULL, 'transfer', '$timenow', 
                         '$causale', '$IBANbeneficiario', '$importo', '$idB');
                    ");
                    if($result)
                    {
                        echo "<h2>movement inserted</h2>";
                        $result = $mysqli -> query("SELECT balanceB FROM bankaccount WHERE codC = '$idC';");
                        $balanceB = ($result->fetch_assoc()["balanceB"]) ;
                        $balanceB = $balanceB-$importo;
                        $result = $mysqli -> query("SELECT balanceB FROM bankaccount WHERE idB = '$IBANbeneficiario';");
                        $balanceBTarget = ($result->fetch_assoc()["balanceB"]) ;
                        $balanceBTarget = $balanceBTarget+$importo;
                        $updateBalanceRequester=$mysqli -> query("UPDATE `bankaccount` SET `balanceB` = '$balanceB' WHERE `bankaccount`.`idB` = '$idB'");
                        $updateBalanceTarget=$mysqli -> query("UPDATE `bankaccount` SET `balanceB` = '$balanceBTarget' WHERE `bankaccount`.`idB` = '$IBANbeneficiario'");
                        if($updateBalanceRequester){ 
                            echo "<h2>balance changed.</h2>";
                        }else{
                            //se l'inserimento non è andato a buonfine interrompo il processo
                            die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                        } 
                        if($updateBalanceTarget){
                            echo "<h2>target balance changed</h2>";
                        }else{
                            //se l'inserimento non è andato a buonfine interrompo il processo
                            die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                        }
                        
                    }else{
                        //se l'inserimento non è andato a buonfine interrompo il processo
                        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                    } 
                }
                if(isset($_POST["insVersamento"]))
                {
                    $causale=$_POST["causale"];
                    $IBANbeneficiario=$_POST["IBAN1"];
                    $importo=$_POST["importo"];
                    $result = $mysqli -> query("
                        INSERT INTO `movement` (`idM`, `typeM`, `dateM`, `causalM`, `targetIBAN`,
                         `amountM`, `codB`) VALUES (NULL, 'payment', '$timenow', 
                         '$causale', '$IBANbeneficiario', '$importo', '$idB');
                    ");
                    if($result)
                    {
                        echo "<h2>movement inserted</h2>";
                        
                        $result = $mysqli -> query("SELECT balanceB FROM bankaccount WHERE codC = '$idC';");
                        $balanceB = ($result->fetch_assoc()["balanceB"]) ;
                        $balanceB = $balanceB-$importo;
                        $result = $mysqli -> query("SELECT balanceB FROM bankaccount WHERE idB = '$IBANbeneficiario';");
                        $balanceBTarget = ($result->fetch_assoc()["balanceB"]) ;
                        $balanceBTarget = $balanceBTarget+$importo;
                        $updateBalanceRequester=$mysqli -> query("UPDATE `bankaccount` SET `balanceB` = '$balanceB' WHERE `bankaccount`.`idB` = '$idB'");
                        $updateBalanceTarget=$mysqli -> query("UPDATE `bankaccount` SET `balanceB` = '$balanceBTarget' WHERE `bankaccount`.`idB` = '$IBANbeneficiario'");
                        if($updateBalanceRequester){ 
                            echo "<h2>balance changed.</h2>";
                        }else{
                            //se l'inserimento non è andato a buonfine interrompo il processo
                            die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                        } 
                        if($updateBalanceTarget){
                            echo "<h2>target balance changed</h2>";
                        }else{
                            //se l'inserimento non è andato a buonfine interrompo il processo
                            die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                        }
                        
                    }else{
                        //se l'inserimento non è andato a buonfine interrompo il processo
                        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                    } 
                }
                if(isset($_POST["insPrelevamento"]))
                {
                    
                    $importo=$_POST["importo"];
                    $getIdB = $mysqli->query("SELECT idB FROM bankaccount WHERE codC = ".$idC.";");
                    $idB = ($getIdB->fetch_assoc()["idB"]);
                    $result = $mysqli -> query("
                        INSERT INTO `movement` (`idM`, `typeM`, `dateM`, `causalM`, `targetIBAN`,
                        `amountM`, `codB`)  VALUES (NULL, 'withdrawal', '$timenow', 
                         'prelevamento bancomat', 'nc' , '$importo', '$idB');
                    ");
                    if($result)
                    {
                        echo "<h2>movement inserted</h2>";
                        

                        $result = $mysqli -> query("SELECT idB FROM bankaccount WHERE codC = '$idC';");
                        $idB = ($result->fetch_assoc()["idB"]) ;
                        $result = $mysqli -> query("SELECT balanceB FROM bankaccount WHERE codC = '$idC';");
                        $balanceB = ($result->fetch_assoc()["balanceB"]) ;
                        $balanceB = $balanceB-$importo;
                        $updateBalance=$mysqli -> query("UPDATE `bankaccount` SET `balanceB` = '$balanceB' WHERE `bankaccount`.`idB` = '$idB'");
                        if($updateBalance){ 
                            echo "<h2>balance changed.</h2>";
                        }else{
                            //se l'inserimento non è andato a buonfine interrompo il processo
                            //die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                        } 



                    }else{
                        //se l'inserimento non è andato a buonfine interrompo il processo
                        
                    } 
                }
            ?>
    </div>

    <div class="yourAccounts">
        ciao
    </div>



    <form method="post">
    <div class="newBankaccount">
        <button id="newAccountButton" name="newAccountButton" class="newAccountButton"><h1>CREATE A NEW BANK ACCOUNT:</h1></button>
    </div>
    </form>
    <?php
        if(isset($_POST["newAccount"])){
            $pw1=$_POST["pwA1"];
            $pw2=$_POST["pwA2"];
            $timeNow=date('y-m-d');
            $newIban=$_SESSION["newIban"];
            //CVC GENERATION
            $cvcB=strval(rand(100,999));
            //PIN GENERATION
            $pinB=strval(rand(10000,99999));
            if($pw1==$pw2){
                    $pw1=md5($pw1);
                    $sql="INSERT INTO `bankaccount` (`idB`,`balanceB`,`pwB`,`signDateB`,`cvcB`,`pinB`,`codC`)
                    VALUES ('$newIban',0,'$pw1','$timeNow','$cvcB','$pinB','$idC');";
                    $result = $mysqli->query($sql);
                    if($result){
                        echo "<h2>New Account Inserted</h2>";
                    }
                    else{
                        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                    }

            }
        }
        if(isset($_POST["newAccountButton"])){
            $bCode="05428";
            $locationID = "IT";
            $randomIban =frand(2, 100);
            $new_idC=($idC*$randomIban);
            
            //IBANgenerator()= costrutture istanza iban
            //passo come parametri il bank code, la chiave esterna ovvero il codU, e la sigla di locazione Italia
            $ibanGenerator= new IBANgenerator($bCode,$new_idC,$locationID);
            $iban=$ibanGenerator->generate();
            $_SESSION["newIban"]=$iban;
            echo"
                        <form method=\"post\">
                        <div class=\"newBAccount\">
                        <h2>YOUR NEW ACCOUNT IBAN :".$iban."</h2>
                        <h2>TIMENOW: ".date('y-m-d')."</h2>
                        <table class=\"insertUserTable\" id=\"registrationTable\">
                            <tr>
                                <td>
                                    <label for=\"pw1\">insert password:</label>
                                </td>
                                <td>
                                    <input type=\"password\"  id=\"pwA1\" name=\"pwA1\" placeholder=\"insert pw1\" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for=\"pw2\">insert your password again:</label>
                                </td>
                                <td>
                                    <input type=\"password\"  id=\"pwA2\" name=\"pwA2\" placeholder=\"insert pw2\" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=\"3\">
                                    <button class=\"buttonInsert\"  name=\"newAccount\" id=\"newAccount\">NEXT STEP</button>
                                </td>
                            </tr>
                        </table></div></form>
                        ";
        }
    ?>
</body>
<footer>
        <p><h3>contacts:</h3></p>
        <h4>ProjectManager | phone: +39 3806947004  -  ProjectManager | eMail: lorenzo@rottigni.net
        BankOfBrianza  | phone: +39 0392910216  -  BankOfBrianza  | eMail: BankOfBrianza@rottigni.net</h4>
    </footer>
</html>