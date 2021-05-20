<!DOCTYPE html>
<html>


    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <title>BANK OF BRIANZA</title>
    </head>



    <body>


        <!-- BIG TITLE -->


        <div class="title">
            <h1>BANK OF BRIANZA</h1>
        </div>  


        <!-- REGISTRATION FORM -->



        <div class="underTitle">
            <form method="POST" action="query.userInsert.php">
                <div class="signUp">
                    <input type="submit" class="indexButtons" name="signUp" id="signUP" value="SIGN UP">
                </div>
            </form>
            <form method="POST" action="query.Login.php">
                <div class="signIn">
                    <input type="submit" class="indexButtons" name="signIn" id="signIn" value="SIGN IN">
                </div>
            </form>
        </div>



        <!--SIDENAV-->


        <div class="sidenav">
            <a href="sidenavLinks/about.php">About us</a>
            <a href="/sidenavLinks/FAQ.php">FAQ - Frequently Asked Questions</a>
            <a href="/bancaProve/sidenavLinks/analisiGPOI.php">Analisi di progetto [GPOI]</a>
            <a href="/sidenavLinks/organigramma.php">Organigramma & altro [GPOI]</a>
            <a href="/sidenavLinks/TCPIP.php">Organizzazione bancaria modello TCP/IP [SISTEMI]</a>
            <a href="/sidenavLinks/query.myDB.php">Interroga il mio database [INFORMATICA]</a>
            
        </div>
        



        <!-- SLIDESHOW -->



        <div class="slideshow-container">

                        <span class="mySlides fade">
                        <a href="slideShowLinks/security.php"><img src="images/security.jpg" height="802px" width="1280px"  style="width:100%"></a>
                        <p class="slideShowP">Learn about out security</p>
                        </span>

                        <span class="mySlides fade">
                        <a href="slideShowLinks/cardRequest.php"><img src="images/creditCard.jpg" height="802px" width="1280px" style="width:100%"></a>
                        <p class="slideShowP">Get our credit card</p>
                        </span>

                        <span class="mySlides fade">
                        <a href="slideShowLinks/covidHelp.php"><img src="images/covid19.jpg" height="802px" width="1280px" style="width:100%"></a>
                        <p class="slideShowP">Initiatives to help families afflicted by COVID-19</p>
                        </span>

                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <!-- JS SLIDESHOW -->
            <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                    showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                    showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {slideIndex = 1}    
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";  
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";  
                    dots[slideIndex-1].className += " active";
                    }
            </script>
    </body>



    <!-- FOOTER -->




    <footer>
        <p><h3>contacts:</h3></p>
        <h4>ProjectManager | phone: +39 3806947004  -  ProjectManager | eMail: lorenzo@rottigni.net
        BankOfBrianza  | phone: +39 0392910216  -  BankOfBrianza  | eMail: BankOfBrianza@rottigni.net</h4>
    </footer>




</html>