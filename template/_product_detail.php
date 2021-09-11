<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
    $item_id =$_GET['item_id']??1;
    foreach ($product->getData() as $item):
        if($item['item_id'] == $item_id):


?>

<section id="product" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?php echo $item['item_image']; ?>" alt="product" class="img-fluid">
                </div>
                <div class="col-sm-6 py-5">
                    <h5 class="font-baloo font-size-20"><?php echo $item['item_name']; ?></h5>
                    <hr>
                    <table class="my-3">
                        <tr class="font-rale font-size-14">
                            <td>Price:</td>
                            <td class="font-size-20 text-danger"><?php echo $item['item_price']; ?>đ</td>
                        </tr>
                    </table>
                    <!-- product qty secton -->

                     <!-- !product qty secton -->
                    <div class="form-row pt-4 font-size-16 font-baloo">
                        <div class="col">
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
            </div>
        </div>
      </section>
        <?php
        endif;
         endforeach;
            ?>