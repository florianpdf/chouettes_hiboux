

    <footer class="page-footer">
        <div class="container-footer">
            <div class="row" id="row-footer">
                <div class="col offset-l1 l2 s12">
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
                    <h5 class="brown-text text-lighten-2">Contacts</h5>
                    <ul>
                        <li><a class="brown-text text-lighten-3" href="./form.php">Formulaire de contact</a></li>
                    </ul>
                </div>
                 <div class="col l4 s12">
                    <div class="row">
                        <div class="col offset-l3 l1 s12">
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="col offset-l3 l1 s12">
                            <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
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
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/modernizr.custom.js"></script>
    

    <!-- index.php 
    Hauteur éléments ROW identique
    Class des élements colCustom -->
    <script>
        $(function() {
            var $heightDiv = $('.colCustom').css('width');
            $('.colCustom').css("height", $heightDiv);
            $('img').css("height", $heightDiv).css("width", $heightDiv);;   
        });
    </script>

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

        $(document).ready(function(){
            $(".button-collapse").sideNav();}
        );

    </script>

    <script src="js/grid.js"></script>
    <script>
      $(function() {
        Grid.init();
        // adding more items
        $('#og-additems').on( 'click', function() {
          var $items = $( '<li><a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/araigne.jpg" class="imglg" data-title="Maité l\'araignée" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot." data-ref="Livre"><img src="images/araigne.jpg" class="thumbs" alt="img01"/></a></li><li><a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/bbb.jpg" class="imglg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu."><img src="images/bbb.jpg" class="thumbs" alt="img02"/></a></li><li><a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/c.jpg" class="imglg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato."><img src="images/c.jpg" class="thumbs" alt="img03"/></a></li><li><a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/ele.jpg" class="imglg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot."><img src="images/ele.jpg" class="thumbs" alt="img01"/></a></li><li><a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/girafe1.jpg" class="imglg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot."><img src="images/girafe1.jpg" class="thumbs" alt="img01"/></a></li><li><a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/hibouxxx.jpg" class="imglg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu."><img src="images/hibouxxx.jpg" class="thumbs" alt="img02"/></a></li><li><a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/hochet.jpg" class="imglg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato."><img src="images/hochet.jpg" class="thumbs" alt="img03"/></a></li><li><a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/mignon.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot."><img src="images/mignon.jpg" class="thumbs" alt="img01"/></a></li><li> <a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/poi.jpg" class="imglg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot."> <img src="images/poi.jpg" class="thumbs" alt="img01"/> </a> </li> <li> <a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/y.jpg" class="imglg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu."> <img src="images/y.jpg" class="thumbs" alt="img02"/> </a> </li> <li> <a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/r.jpg" class="imglg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato."> <img src="images/r.jpg" class="thumbs" alt="img03"/> </a> </li> <li> <a href="http://cargocollective.com/jaimemartinez/" data-largesrc="images/lapin.jpg" class="imglg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot."> <img src="images/lapin.jpg" class="thumbs" alt="img01"/> </a> </li>' ).appendTo( $( '#og-grid' ) );
          Grid.addItems( $items );
          return false;
        } );
      });
    </script>

</body>
</html>

