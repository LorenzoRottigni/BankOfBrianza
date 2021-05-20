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
                 <h1>LOGIN</h1>
                 <h2>join our community</h2>
        </div>
        <form method="POST"> 
            <div class="loginDiv" id="registrationForm" style="margin-top:1%;">
                
                <table class="userTable" id="registrationTable" cellspacing="50">
                                <tr>
                                    <td>
                                        <label for="bankId">BankID-YourName:</label>
                                    </td>
                                    <td>
                                        <input type="numerical" id="bankID" name="bankID" placeholder="yourBankId">
                                        <input type="text" id="nameC" name="nameC" placeholder="yourName">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pw">Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" id="pw" name="pw" placeholder="surname">
                                    </td>
                                </tr>
                                <tr>
                                <td colspan="3">
                                    <button class="buttonLogin"  name="submit">LOGIN</button>
                                </td>
                                </tr>
                </table>
            </div>
        </form>
            
                <?php
                    session_start(); 
                    //connection informations
                    
                    
                    //check connection error
                    
                    
                    if(isset($_POST["submit"])){
                        $insertedID = $_POST["bankID"];
                        $insertedName = $_POST["nameC"];
                        $insertedPW = $_POST["pw"];
                        $insertedPW=md5($insertedPW);
                        $mysqli = new mysqli("localhost","$insertedID.$insertedName","$insertedPW","bankofbrianza");
                        if ($mysqli->connect_error) 
                    {
                        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
                    }else{
                            $_SESSION['IDutente']=$insertedID;
                            $_SESSION['nomeU']= $insertedName;
                            $_SESSION['toLogPw'] = $insertedPW;
                            header('Location: chooseBankAccount.php');
                        }
                        /*if($pw!=$insertedPW){
                            echo "<script>alert('Wrong password');</script>";
                            //header("Location: query.Login.php");
                        }else{
                            //se l'inserimento non è andato a buonfine interrompo il processo
                            die($insertedPW.'Error : ('. $mysqli->errno .') '. $mysqli->error);
                        }*/
                    }
                ?>
            
    </body>
    <footer>
        <p><h3>contacts:</h3></p>
        <h4>ProjectManager | phone: +39 3806947004  -  ProjectManager | eMail: lorenzo@rottigni.net
        BankOfBrianza  | phone: +39 0392910216  -  BankOfBrianza  | eMail: BankOfBrianza@rottigni.net</h4>
    </footer>
</html>