

    <footer class="page-footer">
        <div class="container">
            <div class="row" id="row-footer">
                <div class="col l3 s12">
                    <h5>Catégories</h5>
                   <ul>
                        <li><a class="doudous" href="./doudous.php">Les doudous</a></li>
                        <li><a class="bijoux" href="./bijoux.php">Les bijoux</a></li>
                        <li><a class="accessoires" href="./accessoires.php">Les accessoires</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5>A propos</h5>
                    <ul>
                        <li><a class="whoami" href="./about.php">Qui suis-je ?</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5>Contacts</h5>
                    <ul>
                        <li><a class="contactme" href="./form.php">Formulaire de contact</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5>Réseaux sociaux</h5>
                        <div class="row">
                            <div class="col l6 s12">
                                <img src="./images/chouettefb.png" class="social" />
                            </div>
                            <div class="col l6 s12">
                                <img src="./images/chouetteig.png" class="social" />
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
    

    <!-- ************************************************************************ -->
    <!-- index.php 
    Hauteur éléments ROW identique
    Class des élements colCustom -->
    <script>
    $(document).ready(function() {

    if ( $(window).width() > 739) {      
      //Add your javascript for large screens here
      console.log( "ready!" );
        var heightDiv = $('.colCustom').css('width');
        $('.colCustom').css("height", heightDiv);
        $('.imgDamier').css("height", heightDiv).css("width", heightDiv); 
            $(window).resize(function() {
                var heightDiv = $('.colCustom').css('width');
                console.log(heightDiv);
                $('.colCustom').css("height", heightDiv);
                $('.imgDamier').css("height", heightDiv).css("width", heightDiv);   
            }); 
    } 
    else {
      //Add your javascript for small screens here
      var heightDiv = $('.colCustom').css('width');
        $('.colCustom').css("height", heightDiv/2);
        $('.notForSmall').addClass('hide-on-small-only')
        $('.imgDamier').css("height", heightDiv).css("width", heightDiv); 
            $(window).resize(function() {
                var heightDiv = $('.colCustom').css('width');
                console.log(heightDiv);
                $('.colCustom').css("height", heightDiv/2);
                $('.imgDamier').css("height", heightDiv).css("width", heightDiv);   
            }); 
    }

    });
    </script>

    <!-- Changement photo chouette menu -->
    <script>
    var sourceSwap = function () {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        $this.data('alt-src', $this.attr('src'));
        $this.attr('src', newSource);
    }
    $(document).ready(function() {
        $(function() {
            $('img[data-alt-src]').each(function() { 
                new Image().src = $(this).data('alt-src'); 
            }).hover(sourceSwap, sourceSwap); 
        });
    });
    </script>
    <!-- index.php  -->
    <!-- ************************************************************************ -->

    <!-- create the back to top button
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

    <script>
    $(document).ready(function() {
    $('select').material_select();
  });
    </script>

</body>
</html>

