
<?php
include ('login_check.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['delete-cart'])){
            $delete = $cart->deleteCart($_POST['item_id']);
        }
    }
?>

<section id="cart" class="py-3 mb-5">
            <div class="container-fluid">
                <h5 class="font-baloo font-size-20">Shopping Cart</h5>
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                            foreach ($product->getData('cart') as $item):
                                $list = $product->getProduct($item['item_id']);
                                $subtotal[] = array_map(function ($item){
                        ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image']; ?>" style="height: 200px;"alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name']; ?></h5>
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex font-rale w-25">
                                        <button class="qty-down border bg-light" data-id="<?php echo $item['item_id']; ?>"><i class="fas fa-angle-down"></i></button>
                                        <input type="text" data-id="<?php echo $item['item_id']; ?>" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                        <button data-id="<?php echo $item['item_id']; ?>" class="qty-up border bg-light"><i class="fas fa-angle-up"></i></button>
                                    </div>
                                    <form method="post" >
                                        <input type="hidden" value="<?php echo $item['item_id']; ?>" name="item_id">
                                        <button type="submit" name="delete-cart" class="btn font-baloo text-danger px3">Delete</button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="font-size-20 text-danger font-baloo mt-5">
                                    <span class="product-price" data-id="<?php echo $item['item_id'] ?>"><?php echo $item['item_price']; ?>đ</span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    return $item['item_price'];
                            }, $list);
                            endforeach;

                        ?>
                        <form action="" method="POST">
                            <table class="tbl-30">
                                <tr>
                                    <td class="font-size-16">Your address:</td>
                                    <td><input type="text" name="address" placeholder="Enter your address here"></td>
                                </tr>
                                <tr>
                                    <td class="font-size-16">Phone number:</td>
                                    <td><input type="text" name="phone_number" placeholder="Your phone number"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="col-sm-3">

                        <div class="sub-total text-center border mt-2">
                            <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE delivery</h6>
                            <div class="border-top py-4">
                                <h5 class="font-baloo font-size-20">Sub total(<?php echo isset($subtotal)?count($subtotal) :0; ?> item):&nbsp;<span class="text-danger" id="deal-price"><?php echo isset($subtotal) ? $cart->getSum($subtotal):0; ?></span><span class="text-danger">đ</span></h5>
                                <form action="" method="POST">
                                        <tr>
                                            <td>
                                                <a href="submit.php" class="btn btn-warning mt-3">Proceed to Buy</a>
                                            </td>
                                        </tr>
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>