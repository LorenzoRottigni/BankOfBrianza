<html>


    <head>
        <title>REGISTRATION</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&display=swap" rel="stylesheet">
        <script src="allCAP.js"></script>
        <script src="fieldChecks.js"></script>
    </head>
    
    <body onload="writeCap()">



        <div class="title">
                 <h1>REGISTRATION</h1>
                 <h2>join our community</h2>
        </div>
        
        <div style="padding-left:10%;padding-right:10%;margin-top:1%;">
        



        <?php
            //inizializzo la sessione per la gestione delle variabili d'ambiente
            session_start(); 


            //REGISTRAZIONE PHP
            $mysqli =  mysqli_connect('127.0.0.1','root','','bankofbrianza');
                    //check connection error
                    if ($mysqli->connect_error) 
                    {
                        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
                    }
            
            if(isset($_POST["submitPw"]))
            {
                $pw1=$_POST["pw1"];
                $pw2=$_POST["pw2"];
                $idC=$_SESSION['IDutente'];
                $nameC=$_SESSION['nomeU'];
                if($pw1==$pw2){
                        $pw1=md5($pw1);
                            $result = $mysqli->query("
                                CREATE USER '$idC.$nameC'@'localhost';  
                            ");
                            //PASSWORD SET
                            $result = $mysqli->query("
                                SET PASSWORD FOR '$idC.$nameC'@'localhost' = PASSWORD('$pw1');
                            ");
                            //PRIVILEDGE SET
                            $result = $mysqli->query(" 
                                GRANT SELECT, INSERT, UPDATE ON bankofbrianza.* TO '$idC.$nameC'@'localhost';
                            ");
                            if($result){
                                $_SESSION["pwU"]=$pw1;
                                header('Location: query.pwInsert.php');
                            }
                            else{
                                die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                            }
                }
                else{
                    echo "password dont match";
                }
                //header('Location: query.pwInsert.php');
            }
            //eseguo se il pulsante "submit" viene premuto
            if(isset($_POST["submit"]))
            {
                    //dichiarazione variabili prese come input
                    $vName = $_POST["name"];
                    $vSurname = $_POST["surname"];
                    $vTel = $_POST["tel"];
                    //$vPref = $_POST["prefix"];
                    $vPref = "+39";
                    $vCf = $_POST["cf"];
                    $vDataN = date_create('2000-01-01');
                    $vDataN = $_POST["dataN"];
                    $vIndirizzo = $_POST["address"];
                    $vCap = $_POST["cap"];
                    $vCittadinanza = $_POST["cittadinanza"];
                    $vProfessione = $_POST["prof"];
                    $stipendio = $_POST["stipendio"];
                    $vMail = $_POST["mail"];
                    //connection informations
                    
                    //query inserimento DB utente
                    $sql = "INSERT INTO `client` (`idC`, `nameC`, `surnameC`,`cfC`, `areaCodeC`, `p_numberC`, `birthC`, 
                            `addressC`, `capCodeC`, `citizenshipC`, `professionC`, `mailC`, `salaryC`) VALUES (NULL, '$vName',
                            '$vSurname', '$vCf', '$vPref', '$vTel', '$vDataN', '$vIndirizzo', '$vCap', '$vCittadinanza',
                            '$vProfessione', '$vMail','$stipendio');";
                            $insert_row = $mysqli->query($sql);
                    //se l'inserimento è avvenuto con successo:
                    
                    if($insert_row)
                    {
                        //assegno l'ultimo ID inserito alla variabile d'ambiente 'IDutente'
                        $_SESSION['IDutente'] = $mysqli->insert_id;
                        $idC = $_SESSION['IDutente'];
                        $_SESSION['nomeU'] = $vName;
                        $nameC=$vName;
                        echo"
                        <form method=\"post\">
                        <table class=\"insertUserTable\" id=\"registrationTable\">
                            <tr>
                                <td>
                                    <label for=\"pw1\">insert password:</label>
                                </td>
                                <td>
                                    <input type=\"password\"  id=\"pw1\" name=\"pw1\" placeholder=\"insert pw1\" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for=\"pw2\">insert your password again:</label>
                                </td>
                                <td>
                                    <input type=\"password\"  id=\"pw2\" name=\"pw2\" placeholder=\"insert pw2\" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=\"3\">
                                    <button class=\"buttonInsert\"  name=\"submitPw\" id=\"submitPw\">NEXT STEP</button>
                                </td>
                            </tr>
                        </table></form>
                        ";
                        //se l'inserimento utente è andato a buon fino carico l'inserimento pw
                        
                    }else{
                        //se l'inserimento non è andato a buonfine interrompo il processo
                        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                    } 
                     
                } 
        ?>


    <form method="POST">   
        <div id="registrationForm" class="signUpDiv">
            <h3>Insert your personal data:</h3>
            <table class="insertUserTable" id="registrationTable">
                <tr>
                    <td>
                        <label for="nome">Nome</label>
                    </td>
                    <td>
                        <input type="text" onkeyup="checkNum(this.id,'nameCheck')" id="name" name="name" placeholder="name" required>
                    </td>
                    <td id="nameCheck" class="cfCheck">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Cognome">Cognome</label>
                    </td>
                    
                    <td>
                        <input type="text" id="surname" onkeyup="checkNum(this.id,'surnameCheck')" name="surname" placeholder="surname" required>
                    </td>
                    <td id="surnameCheck" class="cfCheck">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tel">Telefono</label >
                    </td>
                    <td>
                        <input type="tel" id="tel" name="tel" placeholder="telefono" required>    
                    </td>
                    <td>
                        <?php include 'allPrefixes.php'; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cf">CodiceFiscale</label>
                    </td>   
                    <td>
                        <input type="text" id="cf" name="cf" placeholder="codice fiscale" onchange="cfCheck(this.value)" required>        
                    </td>
                    <td class="cfCheck" id="cfCheck">
                    <td>
                </tr>
                <tr>
                    <td>
                        <label for="dataN">DataNascita</label>
                    </td>
                    <td>
                        <input type="date" id="dataN" name="dataN" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Indirizzo</label>
                    </td>
                    <td>
                        <input type="text" id="address" name="address" placeholder="indirizzo" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cap">CAP</label>
                    </td>
                    <td id="change"> 
                    </td>
                </tr>    
                <tr>
                    <td>
                        <label for="cittadinanza">CITTADINANZA</label>
                    </td>
                    <td>
                        <select id="cittadinanza" name="cittadinanza">
                            <option value="america">Americana</option>
                            <option value="europe">Europea</option>
                            <option value="other">Altro</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prof">PROFESSIONE</label>
                    </td>
                    <td>
                        <input type="text" onkeyup="checkNum(this.id,'mansionCheck')" id="prof" name="prof" placeholder="professione" required>
                    </td>
                    <td id="mansionCheck" class="cfCheck"></td>
                </tr>
                <tr>
                    <td>
                        <label for="stipendio">STIPENDIO</label>
                    </td>
                    <td>
                        <input type="numeric" id="stipendio" name="stipendio" placeholder="il tuo stipendio">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mail">MAIL</label>
                    </td>
                    <td>
                        <input type="mail" id="mail" name="mail" placeholder="Mail" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button class="buttonInsert"  name="submit">NEXT STEP</button>
                    </td>
                </tr>
            </table>
        </div>
        </form>
        </div>

    </body>



    <!--FOOTER-->
    <footer>
        <p><h3>contacts:</h3></p>
        <h4>ProjectManager | phone: +39 3806947004  -  ProjectManager | eMail: lorenzo@rottigni.net
        BankOfBrianza  | phone: +39 0392910216  -  BankOfBrianza  | eMail: BankOfBrianza@rottigni.net</h4>
    </footer>
</html>