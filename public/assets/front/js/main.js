(function ($) {
    // AOS.init();
    "use strict";

    /*------ Hero slider  ----*/
    $('.hero-slider-active').slick({
        draggable: true,
        autoplay: true, /* this is the new line */
        autoplaySpeed: 1000,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        touchThreshold: 100,
        speed: 1500,
        arrows: false
    });

    /*====== Sidebar menu Active ======*/
    function mobileHeaderActive() {
        var navbarTrigger = $('.mobile-header-button-active'),
            endTrigger = $('.sidebar-close'),
            container = $('.mobile-header-active'),
            wrapper4 = $('.main-wrapper');

        wrapper4.prepend('<div class="body-overlay-1"></div>');

        navbarTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('sidebar-visible');
            wrapper4.addClass('overlay-active-1');
        });

        endTrigger.on('click', function() {
            container.removeClass('sidebar-visible');
            wrapper4.removeClass('overlay-active-1');
        });

        $('.body-overlay-1').on('click', function() {
            container.removeClass('sidebar-visible');
            wrapper4.removeClass('overlay-active-1');
        });
    };
    mobileHeaderActive();

    /*-------------------------
         hide image on click
      --------------------------*/
    $('.sh_preview_image_close').click(function (e) {
        e.preventDefault();
        let parent_container = $(this).parent('.sh_preview_image_container');
        parent_container.addClass('d-none');
        parent_container.siblings("input[type='file']").val('');
        // parent_container.siblings("input[type='hidden']").val('');
        // $(this).siblings('.sh_preview_img_element').attr('src','#');
        // $("#file_upload").replaceWith($("#file_upload").val('').clone(true));
    });

    /*-------------------------
        checkout one click toggle function
    --------------------------*/
    var checked = $( '.payment-select-div input:checked' )
    var parent_element = $(checked).parent('.payment-select-div');
    if(checked){
        $(parent_element).siblings( '.payment-box' ).slideDown(900);
    };
     $( '.payment-select-div input' ).on('change', function() {
         let parent_element = $(this).parent('.payment-select-div');
        $( '.payment-box' ).slideUp(900);
        $(parent_element).siblings( '.payment-box' ).slideToggle(900);
    });

    // Reward and feature report check box toggle
    $("#rewardCheckBox").on('click', function (e){
        if($(this).is(':checked')){
            $('.rewardInput').slideDown();
        }else{
            $('.rewardInput').slideUp();
        }
    });

    $("#featureCheckBox").on('click', function (e){
        if($(this).is(':checked')){
            $('.featureReportInput').slideDown();
            $('.feature-image-box').slideDown();
        }else{
            $('.featureReportInput').slideUp();
            $('.feature-image-box').slideUp();
        }
    });

    // Jquery initialization for multiple image upload
    $('.input-images').imageUploader({
        'extensions': ['.jpg', '.jpeg', '.png', '.JPG'],
        'mimes':   ['image/jpeg', 'image/png',],
        'maxFiles': 5,
        'imagesInputName': 'product_photo'
    });

    // phone number filed validaiton
    $('.numeric').on('input', function (event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $(".front-logout").on('click', function (e){
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });


    // var product_isotope = $('.product-grid').isotope({
    //     // options
    //     itemSelector: '.product-item',
    //     filter: '.lost-product',
    //     layoutMode: 'fitRows'
    // });
    // let isotope_lost_product_btn =  $('.lost-product-btn');
    // let isotope_found_product_btn =  $('.found-product-btn');
    //
    // isotope_lost_product_btn.on('click', function(){
    //     // $(this).prop('disabled', true);
    //     // $(this).removeClass('bg-front-gray');
    //     // $(this).addClass('bg-theme-blue');
    //
    //     // isotope_celebrities_btn.prop('disabled', false);
    //     // isotope_celebrities_btn.addClass('bg-front-gray');
    //     // isotope_celebrities_btn.removeClass('bg-theme-blue');
    //     product_isotope.isotope({ filter: '.lost-product' });
    // });
    //
    // isotope_found_product_btn.on('click', function(){
    //     // $(this).prop('disabled', true);
    //     // $(this).removeClass('bg-front-gray');
    //     // $(this).addClass('bg-theme-blue');
    //     //
    //     // isotope_collection_btn.prop('disabled', false);
    //     // isotope_collection_btn.removeClass('bg-theme-blue');
    //     // $(isotope_collection_btn).addClass('bg-front-gray');
    //     product_isotope.isotope({ filter: '.found-product' });
    // });

    /*-------------------------------------
       Product details big image slider
   ---------------------------------------*/
    $('.product-details-big-img-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        draggable: false,
        fade: false,
        asNavFor: '.product-details-small-img-slider',
    });

    /*---------------------------------------
        Product details small image slider
    -----------------------------------------*/
    $('.product-details-small-img-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-details-big-img-slider',
        dots: false,
        infinite: true,
        focusOnSelect: true,
        fade: false,
        prevArrow: '<span class="pro-dec-prev"><i class="icon-arrow-left"></i></span>',
        nextArrow: '<span class="pro-dec-next"><i class="icon-arrow-right"></i></span>',
        variableWidth: true,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

})(jQuery);

/** preview currently uploaded images on form**/
function loadPreview(input, id) {
    id = id || '#sh_preview_img';
    let image_container = $(input).siblings('div');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        image_container.removeClass("d-none");
    }
}

window.onscroll = function() {myFunction()};
var header = document.getElementById("sh_nav_bar");
// Get the offset position of the navbar
var sticky = header.offsetTop + 70;
// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky-nav");
    } else {
        header.classList.remove("sticky-nav");
    }
}

