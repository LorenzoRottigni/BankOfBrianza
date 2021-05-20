<html>


    <head>
        <title>REGISTRATION</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&display=swap" rel="stylesheet">
    </head>


    <body>


        <div class="title">
                 <h1>REGISTRATION</h1>
                 <h2>join our community</h2>
        </div>



        <div class="pwInsertDiv" style="margin-top:1%;">
            <form method="POST">   
                
                    <?php   
                            //IBANgenerator classe generatrice di IBAN presa da un tedesco su gitHub
                            include 'class.IBANgenerator.php';
                            //inizzio sessione per le variabili d'ambiente
                            session_start();   
                            //out current sessione
                            function frand($min, $max, $decimals = 0) {
                                $scale = pow(10, $decimals);
                                return mt_rand($min * $scale, $max * $scale) / $scale;
                            }
                            $bCode="05428";
                            $locationID = "IT";
                            //IBANgenerator()= costrutture istanza iban
                            //passo come parametri il bank code, la chiave esterna ovvero il codU, e la sigla di locazione Italia
                            $ibanGenerator= new IBANgenerator($bCode,$_SESSION['IDutente'],$locationID);
                            $iban=$ibanGenerator->generate();
                            //generate()=get string value of the IBAN obj



                            /* INFORMATION OUTPUT BEFORE PWINSERT*/
                            echo "<h1>welcome ". $_SESSION['nomeU']."!</h1>" ;
                            echo "<h2>YOUR USER BANK ID : ".$_SESSION['IDutente']."</h2>";
                            echo "<h2>YOUR IBAN :".$iban."</h2>";
                            echo "<h2>TIMENOW: ".date('y-m-d')."</h2>";
                            



                            //quando viene premuto il premuto "submit1"
                            if(isset($_POST["submit1"]))
                            {
                                $pw1=$_POST["pw"];
                                $pw2=$_POST["pw2"]; 
                                $IDu=$_SESSION['IDutente'];
                                $nomeU=$_SESSION['nomeU'];
                                $mysqli =  mysqli_connect('127.0.0.1','root','','bankofbrianza');
                                if ($mysqli->connect_error) {
                                    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
                                }
                                

                                if($pw1==$pw2)
                                {
                                    //TIMENOW
                                    $timeNow=date('y-m-d');
                                    //RANDOM FLOAT BALANCE GENERATION
                                    $newBalance=frand(1000, 100000, 2);
                                    //CVC GENERATION
                                    $cvcB=strval(rand(100,999));
                                    //PIN GENERATION
                                    $pinB=strval(rand(10000,99999));
                                    echo "cvc:$cvcB pin:$pinB a";
                                   //md5 crypt pw
                                    $pw1=md5($pw1);
                                    

                                    //INSERT NEW BANKACCOUNT
                                    $sql="INSERT INTO `bankaccount` (`idB`,`balanceB`,`pwB`,`signDateB`,`cvcB`,`pinB`,`codC`)
                                          VALUES ('$iban',$newBalance,'$pw1','$timeNow','$cvcB','$pinB','$IDu');";
                                    $result = $mysqli->query($sql);
                                
                                    //INSERT BANK GIFT MOVEMENT

                                    $sql = "INSERT INTO `movement` (`idM`, `typeM`, `dateM`, `causalM`, `targetIBAN`,
                                            `amountM`, `codB`) VALUES (NULL, 'transfer', '$timeNow', 
                                            'bank gift', '$iban', '$newBalance', 'IT76054280000BNKBRZ');";
                                    $result = $mysqli -> query($sql);

                                    if($result){
                                        $_SESSION['toLogPw'] = $pw1;
                                        $_SESSION['balance'] = $newBalance;

                                        header('Location: chooseBankAccount.php');
                                    }else{
                                                    //se l'inserimento non è andato a buonfine interrompo il processo
                                        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                                    }
                                }                           
                            }    
                    ?>



                    <!--HTML PASSWORD FORM -->
                    <h2>Now lets decide your first bankaccount password!</h2>

                    <table class="pwTable">
                        <tr>
                            <td>
                                <label for="pw">InsertYourPassword</label>
                            </td>
                            <td>
                                <input type="password" id="pw" name="pw" placeholder="password" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pw2">InsertPasswordAgain</label>
                            </td>
                            <td class="longer">
                                <input type="password" id="pw2" name="pw2" placeholder="password" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="buttonInsertPW" name="submit1">NEXT STEP</button>
                            </td>
                        </tr>
                    </table>



            </form>
        </div>
    </body>



    <footer>
        <p><h3>contacts:</h3></p>
        <h4>ProjectManager | phone: +39 3806947004  -  ProjectManager | eMail: lorenzo@rottigni.net
        BankOfBrianza  | phone: +39 0392910216  -  BankOfBrianza  | eMail: BankOfBrianza@rottigni.net</h4>
    </footer>
</html>