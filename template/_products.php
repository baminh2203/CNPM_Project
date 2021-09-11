<?php

include ('login_check.php');
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
?>
<section id="coffee">
          <div class="container py-5">
              <h3 class="font-rubik ">Coffee</h3>
              <div class="owl-carousel owl-theme">
                  <?php
                    foreach ($product_shuffle as $item):
                        if($item['item_type']=='Coffee'):
                  ?>
                  <div class="item py-2">
                      <div class="product font-rale">
                          <a href="<?php printf('%s?item_id=%s','product_detail.php', $item['item_id']);?>"> <img src="<?php echo $item['item_image']?>"  alt="product1" class="img-fluid"></a>
                          <br>
                          <div class="text-center">
                              <h4><?php echo $item['item_name']?></h4>
                              <div class="price py-2">
                                <span><?php echo $item['item_price']?>đ</span>
                              </div>
                              <form method="post">
                                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                  <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                  <?php
                                    if(in_array($item['item_id'], $cart->getCardID($product->getData('cart'))??[])){
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the cart</button>';
                                    }else{
                                       echo '<button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                    }
                                  ?>
                              </form>
                          </div>
                      </div>
                  </div>
                    <?php
                  endif;
                  endforeach;?>
              </div>
          </div>
      </section>
      <section id="tea">
        <div class="container py-5">
            <h3 class="font-rubik ">Tea</h3>
            <div class="owl-carousel owl-theme">
                <?php
                foreach ($product_shuffle as $item):
                if($item['item_type']=='Tea'):
                ?>
                    <div class="item py-2">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?item_id=%s','product_detail.php', $item['item_id']);?>"><img src="<?php echo $item['item_image']?>"  alt="product1" class="img-fluid"></a>
                            <br>
                            <div class="text-center">
                                <h4><?php echo $item['item_name']?></h4>
                                <div class="price py-2">
                                    <span><?php echo $item['item_price']?>đ</span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if(in_array($item['item_id'], $cart->getCardID($product->getData('cart'))??[])){
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the cart</button>';
                                    }else{
                                        echo '<button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                    }

                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                endif;
                endforeach;?>
            </div>
        </div>
    </section>