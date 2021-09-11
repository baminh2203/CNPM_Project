$(document).ready(function(){

    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    $("#coffee .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        reponsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    $("#tea .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        reponsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });


    // product qty section
   let $qty_up= $(".qty .qty-up");
   let $qty_down= $(".qty .qty-down");  
   //let $input= $(".qty .qty_input");


   $qty_up.click(function(e){
        let $input= $(`.qty_input[data-id='${$(this).data("id")}']`);
       if($input.val() >= 1 && $input.val() <= 19){
           $input.val(function(i, oldval){
               return ++oldval;
           })
       }
   });

   $qty_down.click(function(e){
    let $input= $(`.qty_input[data-id='${$(this).data("id")}']`);
   if($input.val() > 1 && $input.val() <= 19){
       $input.val(function(i, oldval){
           return --oldval;
       })
   }
});
});
