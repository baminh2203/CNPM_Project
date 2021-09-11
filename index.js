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
       let $price = $(`.product-price[data-id='${$(this).data("id")}']`);
        let $deal_price = $("#deal-price");
       $.ajax({url: "template/ajax.php", type:'post', data: {itemid: $(this).data("id")}, success: function (result){
           let obj = JSON.parse(result);
           let item_price = obj[0]['item_price'];

               if($input.val() >= 1 && $input.val() <= 19){
                   $input.val(function(i, oldval){
                       return ++oldval;
                   })
                   $price.text(parseInt(item_price * $input.val()));
                   let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                   $deal_price.text(subtotal);
               }

       }});

   });

   $qty_down.click(function(e) {
       let $input= $(`.qty_input[data-id='${$(this).data("id")}']`);
       let $price = $(`.product-price[data-id='${$(this).data("id")}']`);
       let $deal_price = $("#deal-price");
       $.ajax({url: "template/ajax.php", type:'post', data: {itemid: $(this).data("id")}, success: function (result){
               let obj = JSON.parse(result);
               let item_price = obj[0]['item_price'];

               if($input.val() > 1 && $input.val() <= 20){
                   $input.val(function(i, oldval){
                       return --oldval;
                   })
                   $price.text(parseInt(item_price * $input.val()));
                   let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                   $deal_price.text(subtotal);
               }

           }});
   });
});