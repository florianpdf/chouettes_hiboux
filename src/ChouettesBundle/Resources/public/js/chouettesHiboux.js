//***********************************//
//index.php                          //
//Hauteur éléments ROW identique     //
//Class des élements colCustom       //
//***********************************//
$(document).ready(function() {

    if ($(window).width() > 739) {
    //Add your javascript for large screens here
    // console.log( "ready!" );
    var heightDiv = $('.colCustom').css('width');
    $('.colCustom').css("height", heightDiv);
    $('.imgDamier').css("height", heightDiv).css("width", heightDiv);
        $(window).resize(function() {
            var heightDiv = $('.colCustom').css('width');
            // console.log(heightDiv);
            $('.colCustom').css("height", heightDiv);
            $('.imgDamier').css("height", heightDiv).css("width", heightDiv);
        });
    } // Fin de if
    else {
    //Add your javascript for small screens here
        var heightDiv = $('.colCustom').css('width');
        $('.colCustom').css("height", heightDiv/2);
        $('.notForSmall').addClass('hide-on-small-only');
        $('.imgDamier').css("height", heightDiv).css("width", heightDiv);
            $(window).resize(function() {
                var heightDiv = $('.colCustom').css('width');
                // console.log(heightDiv);
                $('.colCustom').css("height", heightDiv/2);
                $('.imgDamier').css("height", heightDiv).css("width", heightDiv);
            });
    }
});

//***********************************//
// Changement photo chouette menu    //
//***********************************//
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

//***********************************//
//  create the back to top button    //
//***********************************// 
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

//***********************************//
//  GRID                             //
//***********************************//

$(function() {
Grid.init();
// adding more items
});

//***********************************//
//  GRID                             //
//***********************************//
$(document).ready(function() {
    $('select').material_select();
});
