$(document).ready(function() {

    /**
     * custom
     */
    $('.mini-attachments img').click(function () {
        var src = $(this).attr('src');
        console.log(src);
        $(this).closest('.product').find('img.product-image').attr('src',src);
    });

    /**
     * end custom
     */

    $('.popup').popup();

    // fix main menu to page on passing
    $('.main.menu').stick_in_parent({parent: '.main'});
    // lazy load images
    $('.image').visibility({
        type: 'image',
        transition: 'vertical flip in',
        duration: 1500
    });

    // show dropdown on hover
    $('.menu  .ui.dropdown').dropdown({
        on: 'hover'
    });

    $('.rating').rating({
            initialRating: 2,
            maxRating: 5
    });
    $('.popup.right-center').popup({
        position   : 'right center'
    })
    $("#carousel-bestsellers, #carousel-news").owlCarousel({

        navigation : true,
        mouseDrag: true,
        slideSpeed : 300,
        paginationSpeed : 400,
        margin: 10,
        stagePadding: 5,
        dots: false,
        nav: true,
        autoplay:true,
        responsive : {
            0 : {
                items:1
            },
            480 : {
                items:2
            },
            768 : {
                items:3
            }
        }
    });
    $('ul#vendors-slider').owlCarousel({

        navigation : false,
        mouseDrag: true,
        slideSpeed : 300,
        paginationSpeed : 400,
        margin: 10,
        stagePadding: 5,
        dots: false,
        nav: true,
        autoplay:true,
        responsive : {
            0 : {
                items:2
            },
            480 : {
                items:3
            },
            768 : {
                items:5
            }
        }
    });
    $('div.cart-icon').click(function () {
        $('.ui.sidebar').sidebar('setting', {
                transition: 'overlay'
        }).sidebar('toggle');
    })


    //fo validation and sendjavascript
    var buttons = $('button');
    buttons.attr('disabled', false);
    $('.ui.checkbox').checkbox();
    $('form').submit(function () {
        buttons.attr('disabled', true);
        $(this).addClass('loading');
    });

    $('.social-login button').click(function () {
        buttons.attr('disabled', true);
        $(this).addClass('loading').attr('disabled', true);
        $(this).addClass('loading').attr('disabled', true);
        //TODO SOCIAL LOGIN LOGIC
    })

    $('.tabs .item').tab();

    $('.ui.dropdown').dropdown({
        forceSelection: false,
        fullTextSearch: true
    })

    $("#product_old_images .fileuploader-action-remove").click(function () {
        $(this).closest(".old-image").remove()
    })
});