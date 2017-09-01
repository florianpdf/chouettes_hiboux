//***********************************//
// Index.php                         //
// Hauteur éléments ROW identique    //
// Class des élements colCustom      //
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
    }
// Fin de if
    else {
//Add your javascript for small screens here
        var heightDiv = $('.colCustom').css('width');
        $('.colCustom').css("height", heightDiv/2);
        $('.notForSmall').addClass('hide-on-small-only');
        $('.imgDamier').css("height", heightDiv).css("width", heightDiv);
            $(window).resize(function() {
                var heightDiv = $('.colCustom').css('width');
                $('.colCustom').css("height", heightDiv/2);
                $('.imgDamier').css("height", heightDiv).css("width", heightDiv);
            });
    }
});


//******************************************//
// Changement photo CHOUETTE ANIMEE menu    //
//******************************************//

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
//  Create the BACK TO TOP button    //
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
    $(".button-collapse").sideNav();
    $('.modal').modal();

    }
);

//***********************************//
//         GRID DROP DOWN            //
//***********************************//

$(function() {
Grid.init();
});


//***************************************************//
//    Menu déroulant catégorie admin modèle          //
//***************************************************//
$(document).ready(function() {
    $('select').material_select();
});

//***************************************************//
//    AJAX          //
//***************************************************//

function ajaxForm(selector, idInput) {
    //quand le formulaire est soumi
    $(selector).submit(function (event) {
        // Eviter le comportement par défaut (soumettre le formulaire)
        event.preventDefault();
        var $this = $(this);
        var form = $this.serialize();
        //Ici on peut ajouter un loader...
        $.ajax({
            url: $this.attr('action'),
            type: 'post',
            data: form,
            statusCode: {
                //traitement en cas de succès
                200: function (response) {
                    var successMessage = response.successMessage;
                    //on vide les champs formulaires ou on le supprime ou ...
                    $(selector).trigger("reset");
                    $('#modal1').modal('open');

                    //on prévient l'utilistateur du bonne envoi...

                },
                //traitement en cas d'erreur (on peut aussi traiter le cas erreur 500...)
                412: function (response) {
                    var errorsForm = response.responseJSON.formErrors;
                    //on affiche les erreurs...
                }
            }
        })
    });
}
