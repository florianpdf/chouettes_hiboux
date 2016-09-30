

    <footer class="page-footer">
        <div class="container-footer">
            <div class="row" id="row-footer">
                <div class="col l2 s12">
                    <h5 class="brown-text text-lighten-2">Catégories</h5>
                   <ul>
                        <li><a class="brown-text text-lighten-3" href="./doudous.php">Les doudous</a></li>
                        <li><a class="brown-text text-lighten-3" href="./bijoux.php">Les bijoux</a></li>
                        <li><a class="brown-text text-lighten-3" href="./accessoires.php">Les accessoires</a></li>
                    </ul>
                </div>
                <div class="col l2 s12">
                    <h5 class="brown-text text-lighten-2">A propos</h5>
                    <ul>
                        <li><a class="brown-text text-lighten-3" href="./about.php">Qui suis-je ?</a></li>
                    </ul>
                </div>
                <div class="col l2 s12">
                    <h5 class="brown-text text-lighten-2">Contact</h5>
                    <ul>
                        <li><a class="brown-text text-lighten-3" href="./form.php">Formulaire de contact</a></li>
                    </ul>
                </div>
                 <div class="col l6 s12">
                    <h5 class="white-text"></h5>
                </div>

           
<!--            <div class="col l6 s12" id="logos_reseaux_sociaux">
                    <img src="https://s18.postimg.org/lmcvfezy1/Les_hiboux.gif" alt="icone1" width="500px" />
                </div> -->
            </div>        
        </div>

        <div class="footer-copyright">
            <div class="container">
                © 2016 All Rights Reserved Chouettes Hiboux Doudous | Design by WCS
            </div>
        </div>
    </footer>

    <!--  Scripts-->
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.js"></script>
    
    <!-- create the back to top button -->
    <script> 
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

        var amountScrolled = 300;

        $(window).scroll(function() {
            if ( $(window).scrollTop() > amountScrolled ) {
                $('a.back-to-top').fadeIn('slow');
            } else {
                $('a.back-to-top').fadeOut('slow');
            }
        });
        $('a.back-to-top, a.simple-back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 700);
            return false;
        });
    </script>

</body>
</html>

