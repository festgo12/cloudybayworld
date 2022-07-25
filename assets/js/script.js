(function ($) {
    "use strict";
    $(document).on('click', function (e) {
        var outside_space = $(".outside");
        if (!outside_space.is(e.target) &&
            outside_space.has(e.target).length === 0) {
            $(".menu-to-be-close").removeClass("d-block");
            $('.menu-to-be-close').css('display', 'none');
        }
    })

    $('.prooduct-details-box .close').on('click', function (e) {
        var tets = $(this).parent().parent().parent().parent().addClass('d-none');
        console.log(tets);
    })



    if ($('.page-wrapper').hasClass('horizontal-wrapper')){

        $(".sidebar-list").hover(
            function () {
              $(this).addClass("hoverd");
            },
            function () {
              $(this).removeClass("hoverd");
            }
        );
        $(window).on('scroll', function () {
            if ($(this).scrollTop() < 600) {
                $(".sidebar-list").removeClass("hoverd");
            }         
        });   
      }

    /*----------------------------------------
     passward show hide
     ----------------------------------------*/
    $('.show-hide').show();
    $('.show-hide span').addClass('show');

    $('.show-hide span').click(function () {
        if ($(this).hasClass('show')) {
            $('input[name="password"]').attr('type', 'text');
            $(this).removeClass('show');
        } else {
            $('input[name="password"]').attr('type', 'password');
            $(this).addClass('show');
        }
    });
    $('form button[type="submit"]').on('click', function () {
        $('.show-hide span').addClass('show');
        $('.show-hide').parent().find('input[name="password"]').attr('type', 'password');
    });

    /*=====================
      02. Background Image js
      ==========================*/
    $(".bg-center").parent().addClass('b-center');
    $(".bg-img-cover").parent().addClass('bg-size');
    $('.bg-img-cover').each(function () {
        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();
        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'display': 'block'
        });
        el.hide();
    });

    $(".mega-menu-container").css("display", "none");
    $(".header-search").click(function () {
        $(".search-full").addClass("open");
    });
    $(".close-search").click(function () {
        $(".search-full").removeClass("open");
        $("body").removeClass("offcanvas");
    });
    $(".mobile-toggle").click(function () {
        $(".nav-menus").toggleClass("open");
    });
    $(".mobile-toggle-left").click(function () {
        $(".left-header").toggleClass("open");
    });
    $(".bookmark-search").click(function () {
        $(".form-control-search").toggleClass("open");
    })
    $(".filter-toggle").click(function () {
        $(".product-sidebar").toggleClass("open");
    });
    $(".toggle-data").click(function () {
        $(".product-wrapper").toggleClass("sidebaron");
    });
    $(".form-control-search input").keyup(function (e) {
        if (e.target.value) {
            $(".page-wrapper").addClass("offcanvas-bookmark");
        } else {
            $(".page-wrapper").removeClass("offcanvas-bookmark");
        }
    });
    $(".search-full input").keyup(function (e) {
        console.log(e.target.value);
        if (e.target.value) {
            $("body").addClass("offcanvas");
        } else {
            $("body").removeClass("offcanvas");
        }
    });

    $('body').keydown(function (e) {
        if (e.keyCode == 27) {
            $('.search-full input').val('');
            $('.form-control-search input').val('');
            $('.page-wrapper').removeClass('offcanvas-bookmark');
            $('.search-full').removeClass('open');
            $('.search-form .form-control-search').removeClass('open');
            $("body").removeClass("offcanvas");
        }
    });
    $(".mode").on("click", function () {
        $('.mode i').toggleClass("fa-moon-o").toggleClass("fa-lightbulb-o");
        $('.f-ch').toggleClass("text-dark").toggleClass("text-light");
        $('body').toggleClass("dark-only");
        $('.profile-bar').toggleClass("bar-dark");
        var color = $(this).attr("data-attr");
                
        if (!localStorage.getItem('cloudbay-body')) {
            localStorage.setItem('cloudbay-body', 'light')
        }
        
        
        (localStorage.getItem('cloudbay-body') == 'dark-only') ? 
        localStorage.setItem('cloudbay-body', 'light') : localStorage.setItem('cloudbay-body', 'dark-only');
    });


    // $(window).on("load", function () {
    // document.onload( function () {
            
    $(window).on("load", function () {

        if (localStorage.getItem('cloudbay-body') == 'dark-only') {
            $('body').addClass("dark-only")
            $('.profile-bar').addClass("bar-dark");
            $('.f-ch').removeClass("text-dark").addClass("text-light");
            $('.mode i').removeClass("fa-moon-o").addClass("fa-lightbulb-o");
        } else {
            $('body').removeClass("dark-only")
            $('.f-ch').removeClass("text-light").addClass("text-dark");
            $('.profile-bar').removeClass("bar-dark");
            $('.mode i').addClass("fa-moon-o").removeClass("fa-lightbulb-o");
        }
    
    });

})(jQuery);

$('.loader-wrapper').fadeOut('fast', function () {
    $(this).remove();
});

$(window).on('scroll', function () {
    if ($(this).scrollTop() > 600) {
        $('.tap-top').fadeIn();
    } else {
        $('.tap-top').fadeOut();
    }
});



$('.tap-top').click(function () {
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});

function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}
(function ($, window, document, undefined) {
    "use strict";
    var $ripple = $(".js-ripple");
    $ripple.on("click.ui.ripple", function (e) {
        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find(".c-ripple__circle");
        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;
        $circle.css({
            top: y + "px",
            left: x + "px"
        });
        $this.addClass("is-active");
    });
    $ripple.on(
        "animationend webkitAnimationEnd oanimationend MSAnimationEnd",
        function (e) {
            $(this).removeClass("is-active");
        });


})(jQuery, window, document);


// active link

$(".chat-menu-icons .toogle-bar").click(function () {
    $(".chat-menu").toggleClass("show");
});


// Language
var tnum = 'en';

$(document).ready(function () {

    if (localStorage.getItem("primary") != null) {
        var primary_val = localStorage.getItem("primary");
        $("#ColorPicker1").val(primary_val);
        var secondary_val = localStorage.getItem("secondary");
        $("#ColorPicker2").val(secondary_val);
    }


    $(document).click(function (e) {
        $('.translate_wrapper, .more_lang').removeClass('active');
    });
    $('.translate_wrapper .current_lang').click(function (e) {
        e.stopPropagation();
        $(this).parent().toggleClass('active');

        setTimeout(function () {
            $('.more_lang').toggleClass('active');
        }, 5);
    });


    /*TRANSLATE*/
    translate(tnum);

    $('.more_lang .lang').click(function () {
        $(this).addClass('selected').siblings().removeClass('selected');
        $('.more_lang').removeClass('active');

        var i = $(this).find('i').attr('class');
        var lang = $(this).attr('data-value');
        var tnum = lang;
        translate(tnum);

        $('.current_lang .lang-txt').text(lang);
        $('.current_lang i').attr('class', i);


    });
});

function translate(tnum) {
    $('.lan-1').text(trans[0][tnum]);
    $('.lan-2').text(trans[1][tnum]);
    $('.lan-3').text(trans[2][tnum]);
    $('.lan-4').text(trans[3][tnum]);
    $('.lan-5').text(trans[4][tnum]);
    $('.lan-6').text(trans[5][tnum]);
    $('.lan-7').text(trans[6][tnum]);
    $('.lan-8').text(trans[7][tnum]);
    $('.lan-9').text(trans[8][tnum]);
}

var trans = [{
        en: 'General',
        pt: 'Geral',
        es: 'Generalo',
        fr: 'GÃ©nÃ©rale',
        de: 'Generel',
        cn: 'ä¸€èˆ¬',
        ae: 'Ø­Ø¬Ù†Ø±Ø§Ù„ Ù„ÙˆØ§Ø¡'
    }, {
        en: 'Dashboards,widgets & layout.',
        pt: 'PainÃ©is, widgets e layout.',
        es: 'Paneloj, fenestraÄµoj kaj aranÄo.',
        fr: "Tableaux de bord, widgets et mise en page.",
        de: 'Dashboards, widgets en lay-out.',
        cn: 'ä»ªè¡¨æ¿ï¼Œå°å·¥å…·å’Œå¸ƒå±€ã€‚',
        ae: 'Ù„ÙˆØ­Ø§Øª Ø§Ù„Ù…Ø¹Ù„ÙˆÙ…Ø§Øª ÙˆØ§Ù„Ø£Ø¯ÙˆØ§Øª ÙˆØ§Ù„ØªØ®Ø·ÙŠØ·.'
    }, {
        en: 'Dashboards',
        pt: 'PainÃ©is',
        es: 'Paneloj',
        fr: 'Tableaux',
        de: 'Dashboards',
        cn: ' ä»ªè¡¨æ¿ ',
        ae: 'ÙˆØ­Ø§Øª Ø§Ù„Ù‚ÙŠØ§Ø¯Ø© '
    }, {
        en: 'Default',
        pt: 'PadrÃ£o',
        es: 'Vaikimisi',
        fr: 'DÃ©faut',
        de: 'Standaard',
        cn: 'é›»å­å•†å‹™',
        ae: 'ÙˆØ¥ÙØªØ±Ø§Ø¶ÙŠ'
    }, {
        en: 'Ecommerce',
        pt: 'ComÃ©rcio eletrÃ´nico',
        es: 'Komerco',
        fr: 'Commerce Ã©lectronique',
        de: 'E-commerce',
        cn: 'é›»å­å•†å‹™',
        ae: 'ÙˆØ§Ù„ØªØ¬Ø§Ø±Ø© Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©'
    }, {
        en: 'Widgets',
        pt: 'Ferramenta',
        es: 'Vidin',
        fr: 'Widgets',
        de: 'Widgets',
        cn: 'å°éƒ¨ä»¶',
        ae: 'ÙˆØ§Ù„Ø­Ø§Ø¬ÙŠØ§Øª'
    }, {
        en: 'Page layout',
        pt: 'Layout da pÃ¡gina',
        es: 'PaÄa aranÄo',
        fr: 'Tableaux',
        de: 'Mise en page',
        cn: 'é é¢ä½ˆå±€',
        ae: 'ÙˆØªØ®Ø·ÙŠØ· Ø§Ù„ØµÙØ­Ø©'
    }, {
        en: 'Applications',
        pt: 'FormulÃ¡rios',
        es: 'Aplikoj',
        fr: 'Applications',
        de: 'Toepassingen',
        cn: 'æ‡‰ç”¨é ˜åŸŸ',
        ae: 'ÙˆØ§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§Øª'
    }, {
        en: 'Ready to use Apps',
        pt: 'Pronto para usar aplicativos',
        es: 'Preta uzi Apps',
        fr: ' Applications prÃªtes Ã  lemploi ',
        de: 'Klaar om apps te gebruiken',
        cn: 'ä»ªè¡¨æ¿',
        ae: 'Ø¬Ø§Ù‡Ø² Ù„Ø§Ø³ØªØ®Ø¯Ø§Ù… Ø§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§Øª'
    },

];

$(".mobile-title svg").click(function () {
    $(".header-mega").toggleClass("d-block");
});

$(".onhover-dropdown").on("click", function () {
    $(this).children('.onhover-show-div').toggleClass("active");
});



$("#flip-btn").click(function(){
    $(".flip-card-inner").addClass("flipped")
});

$("#flip-back").click(function(){
    $(".flip-card-inner").removeClass("flipped")
});

// Notifier

const notice = ( message,type= 'info')=>{
    $.notify({
        message: message
     },
     {
        type: type,
        allow_dismiss:true,
        newest_on_top:true ,
        mouse_over:false,
        showProgressbar:true,
        spacing:20,
        timer:200,
        placement:{
          from:'top',
          align:'right'
        },
        offset:{
          x:31,
          y:30
        },
        delay:100 ,
        z_index:1000,
        animate:{
          enter:'animated flash',
          exit:'animated bounce'
      }
    });
}



// add to cart
$(document).on("click", ".addtocart" , function(e){

    e.preventDefault();
  window.location = $(this).data('href');
  notice('added to cart');

    
});


// add to cart ajax
$(document).on("click", ".addcart" , function(){

    $.get( $(this).data('href') , function( data ) {
        if(data == 'digital') {
        }
        else if(data == 0) {
          }
          else {
            // console.log('success');
            $("#cart-count").html(data[0]);
            // console.log(data);
          $("#cart-items").load(mainurl+'/carts/view');
          notice('added to cart');
          }
    });
                return false;
});


// romove from  cart
$(document).on('click', '.cart-remove', function(){
    var $selector = $(this).data('class');

    $.get( $(this).data('href') , function( data ) {
          $('.'+$selector).hide();
        notice('Item removed');
        // console.log(data);
          if(data == 0) {
              $("#cart-count").html(data);
             $('.cart-table').html('<center class="">Your cart is Empty</center>');
              $('#cart-items').html('<center class="mt-5">Your cart is Empty</center>');
              $('.cartpage .col-lg-4').html('');
            }
          else {
            $("#cart-count").html(data[1]);
            //  $('.cart-quantity').html(data[1]);
             $('.cart-total').html(data[0]);
             $('.mini-total').html(data[0]);
            //  $('.coupon-total').val(data[0]);
             $('.main-total').html(data[3]);
            }
            

      });
  });

// Adding Muliple Quantity Ends

// Add By ONE

$(document).on("click", ".bootstrap-touchspin-up" , function(){
    //get data
    var pid =  $(this).parent().parent().parent().find('.prodid').val();
    var itemid =  $(this).parent().parent().parent().find('.itemid').val();
    var size_qty = $(this).parent().parent().parent().find('.size_qty').val();
    var size_price = $(this).parent().parent().parent().find('.size_price').val();
    var stck = $("#stock"+itemid).val();
    var qty = $(".qty"+itemid).val();
    // console.log(pid);
    if(stck != "")
    {
    var stk = parseInt(stck);
      if(qty < stk)
      {
         qty++;
     $(".qty"+itemid).val(qty);
      }
    }
    else{
     qty++;
     $(".qty"+itemid).html(qty);
    }
        $.ajax({
                type: "GET",
                url:mainurl+"/addbyone",
                data:{id:pid,itemid:itemid,size_qty:size_qty,size_price:size_price},
                success:function(data){
                    if(data == 0)
                    {
                    }
                    else
                    {
                        // console.log(data);
                    // $(".discount").html($("#d-val").val());
                    $(".cart-total").html(data[0]);
                    $(".mini-total").html(data[0]);
                    $(".main-total").html(data[3]);
                    $(".prc"+itemid).html(data[2]);
                    // $(".coupon-total").val(data[3]);
                    // $("#prct"+itemid).html(data[4]);
                    // $("#cqt"+itemid).html(data[1]);
                    $(".qty"+itemid).val(data[1]);
                    notice('1 More Added');
                    }
                  },
                  error: function(err){
                    // console.log(err);
                  }
          });
   });


   // Reduce By ONE

   $(document).on("click", ".bootstrap-touchspin-down" , function(){
        


    var pid =  $(this).parent().parent().parent().find('.prodid').val();
    var itemid =  $(this).parent().parent().parent().find('.itemid').val();
    var size_qty = $(this).parent().parent().parent().find('.size_qty').val();
    var size_price = $(this).parent().parent().parent().find('.size_price').val();
    var stck = $("#stock"+itemid).val();
    var qty = $(".qty"+itemid).val();
    qty--;

    
    if(qty < 1)
     {
     $(".qty"+itemid).val("1");
     }
     else{
     $(".qty"+itemid).val(qty);
        $.ajax({
                type: "GET",
                url:mainurl+"/reducebyone",
                data:{id:pid,itemid:itemid,size_qty:size_qty,size_price:size_price},
                success:function(data){
                  
                    // $(".discount").html($("#d-val").val());
                    $(".cart-total").html(data[0]);
                    $(".mini-total").html(data[0]);
                    $(".main-total").html(data[3]);
                    $(".prc"+itemid).html(data[2]);
                    // $(".coupon-total").val(data[3]);
                    // $("#prct"+itemid).html(data[4]);
                    // $("#cqt"+itemid).html(data[1]);
                    $(".qty"+itemid).val(data[1]);
                    notice('1 More Removed');
                  }
          });
     }
   });



// Wishlist Section

    $(document).on('click', '.addwish', function(){
        $.get( $(this).data('href') , function( data ) {

            if(data[0] == 1) {
              notice('added to Wishlist');
              $('#wishlist-count').html(data[1]);
              
            }
            else {
                notice('Already in Wishlist');
                
              }

        });

              return false;
    });


    $(document).on('click', '.move-cart', function(e){

        e.preventDefault();

        // remove wishlist item
        $(this).parent().parent().parent().parent().remove();
        $.get( $(this).data('href') , function( data ) {
            

            if (!data[1]) {
                $('.wishlist').html('<center class="">Your Wishlist  is Empty</center>');
            }
         });


            // add item to cart json

            $.get( $(this).data('href2') , function( data ) {
                if(data == 'digital') {
                }
                else if(data == 0) {
                  }
                  else {
                    // console.log('success');
                    $("#cart-count").html(data[0]);
                    // console.log(data);
                  $("#cart-items").load(mainurl+'/carts/view');
                //   notice('added to cart');
                  notice('Wish Moved');
                  }
            });



            
    });

 


    $(document).on('click', '.wishlist-remove', function(){
      $(this).parent().parent().parent().parent().remove();
        $.get( $(this).data('href') , function( data ) {
        //   $('#wishlist-count').html(data[1]);
        notice('Wish Removed');

          if (!data[1]) {
            $('.wishlist').html('<center class="">Your cart is Empty</center>');
          }
        });
    });

// Wishlist Section Ends

// Rating 

$('#u-rating-fontawesome').on('change', (e)=>{
    e.preventDefault()
    notice($('#u-rating-fontawesome').val()+ ' stars');
    $('.select-star').html($('#u-rating-fontawesome').val()+ ' stars');
})


$(document).on('submit','#reviewform',function(e){
    var $this = $(this);
    e.preventDefault();
    // $('.gocover').show();
    $('button.review-btn').prop('disabled',true);
        $.ajax({
         method:"POST",
         url:$(this).prop('action'),
         data:new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success:function(data)
         {
            if ((data.errors)) {

              for(var error in data.errors)
              {
                notice(data.errors[error],'danger');
              }
              $('#reviewform textarea').eq(0).focus();

            }
            else
            {
                notice(data[0]);

           
              $('#reviewform textarea').eq(0).focus();
              $('#reviewform textarea').val('');
              $('#reviews-section').load($(this).data('href'));
            }
            $('button.review-btn').prop('disabled',false);
         }

        });
  });

//End rating

//Checkout 
$(document).on('click', '.wishlist-remove', function(){
    $(this).parent().parent().parent().parent().remove();
      $.get( $(this).data('href') , function( data ) {
      //   $('#wishlist-count').html(data[1]);
      notice('Wish Removed');

        if (!data[1]) {
          $('.wishlist').html('<center class="">Your wishlist is Empty</center>');
        }
      });
  });

