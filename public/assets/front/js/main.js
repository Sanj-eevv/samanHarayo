(function ($) {
    "use strict";

    /*------ Hero slider  ----*/
    // This hero slider is needed in home page.
    // Slider for featured product
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
            container.toggleClass('sidebar-visible');
            wrapper4.toggleClass('overlay-active-1');
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
        'imagesInputName': 'item_image'
    });

    // phone number filed validation
    $('.numeric').on('input', function (event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });


    // Submit logout form
    // Sign out user from the system
    $(".front-logout").on('click', function (e){
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });


    //Isotopes Home page
    let lost_product_btn = $('.product-area .lost-product-btn');
    let found_product_btn = $('.product-area .found-product-btn');

    var product_isotope = $('.product-area .product-grid').isotope({
        itemSelector: '.product-item',
        filter: '.lost-product',
        layoutMode: 'fitRows'
    });

    lost_product_btn.on('click', function(){
        $(this).prop('disabled', true);
        $(this).addClass('active');
        found_product_btn.prop('disabled', false);
        found_product_btn.removeClass('active');
        product_isotope.isotope({ filter: '.lost-product' });
    });

    found_product_btn.on('click', function(){
        $(this).prop('disabled', true);
        $(this).addClass('active');
        lost_product_btn.prop('disabled', false);
        lost_product_btn.removeClass('active');
        product_isotope.isotope({ filter: '.found-product' });
    });



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
        lazyLoad: 'ondemand',
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
        arrows: true,
        fade: false,
        prevArrow: '<span class="pro-dec-prev"><i class="icon-arrow-left"></i></span>',
        nextArrow: '<span class="pro-dec-next"><i class="icon-arrow-right"></i></span>',
        // variableWidth: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
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

    /*Faq page accordion*/
    $('.accordion-title').on('click', function (e){
        e.preventDefault();
       let accordion_inner =  $(this).siblings('.accordion-inner');
       if($(this).hasClass('active')){
           accordion_inner.slideUp();
           $(this).removeClass('active');
           accordion_inner.removeClass('active');
       }else{
           accordion_inner.slideDown();
           $(this).addClass('active');
           accordion_inner.addClass('active');
       }
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

