
        <!-- Page Content -->
        <main class="page-content">

            <!-- Shopping Cart Area -->
            <div class="tm-section shopping-cart-area bg-white tm-padding-section">
                <div class="container">

                    <!-- Shopping Cart Table -->
                    <div class="tm-cart-table table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="tm-cart-col-image" scope="col">Image</th>
                                    <th class="tm-cart-col-productname" scope="col">Product</th>
                                    <th class="tm-cart-col-price" scope="col">Price</th>
                                    <th class="tm-cart-col-quantity" scope="col">Quantity</th>
                                    <th class="tm-cart-col-total" scope="col">Total</th>
                                    <th class="tm-cart-col-remove" scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cartItems as $ci): foreach($products as $product):
                                if($ci["pid"]==$product["id"]):    
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="product-details.html" class="tm-cart-productimage">
                                            <img src="<?php echo site_url("assets/images/product_featured/".$product["featured_image"]); ?>"
                                                alt="product image" class="w-50">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="product-details.html" class="tm-cart-productname"><?php echo $product["title"]; ?></a>
                                    </td>
                                    <?php $pricesObj = json_decode($product["prices"],TRUE); ?>
                                    <td class="tm-cart-price">$ <?php echo $pricesObj["na"]; ?></td>
                                    <td>
                                        <div class="tm-quantitybox">
                                            <input type="text" value="<?php echo $ci["qty"]; ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <span class="tm-cart-totalprice">$ <?php  echo $pricesObj["na"]*$ci["qty"]; ?></span>
                                    </td>
                                    <td>
                                        <button id="remove-from-cart" cart_item_id="<?php echo $ci["id"]; ?>" class="tm-cart-removeproduct"><i class="ion-close"></i></button>
                                    </td>
                                </tr>
                                <?php endif; endforeach; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!--// Shopping Cart Table -->

                    <!-- Shopping Cart Content -->
                    <div class="tm-cart-bottomarea">
                        <div class="row">
                            <div class="col-lg-7 mt-50">
                                <div class="tm-buttongroup">
                                    <a href="#" class="tm-button">Continue Shopping</a>
                                    <a href="#" class="tm-button">Update Cart</a>
                                </div>

                            </div>
                            <div class="col-lg-5 mt-50">
                                
                            </div>
                            <div class="col-lg-7 mt-50">
                                <div class="tm-cart-calculateship">
                                    <h6>Caltulate Shipping</h6>
                                    <form action="#" class="tm-form">
                                        <div class="tm-form-inner">
                                            <div class="tm-form-field">
                                                <select name="select-country">
                                                    <option value="1">United Kingdom</option>
                                                    <option value="1">Australia</option>
                                                    <option value="1">Canada</option>
                                                    <option value="1">United States</option>
                                                    <option value="1">France</option>
                                                </select>
                                            </div>
                                            <div class="tm-form-field tm-form-fieldhalf">
                                                <input type="text" placeholder="State / Country">
                                            </div>
                                            <div class="tm-form-field tm-form-fieldhalf">
                                                <input type="text" placeholder="Zip code">
                                            </div>
                                            <div class="tm-form-field">
                                                <button type="submit" class="tm-button tm-button-block">Update
                                                    Totals</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5 mt-50">
                                <div class="tm-cart-pricebox">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="tm-cart-pricebox-subtotal">
                                                    <td>Cart Subtotal</td>
                                                    <td>$175.00</td>
                                                </tr>
                                                <tr class="tm-cart-pricebox-shipping">
                                                    <td>(+) Shipping Charge</td>
                                                    <td>$15.00</td>
                                                </tr>
                                                <tr class="tm-cart-pricebox-total">
                                                    <td>Total</td>
                                                    <td>$190.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="#" class="tm-button tm-button-dark">Proceed To Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Shopping Cart Content -->

                </div>
            </div>
            <!--// Shopping Cart Area -->

        </main>
        <!--// Page Content -->

        <script>
            $("button#remove-from-cart").click(function (e) { 
                e.preventDefault();
                let cartItemId = $(this).attr("cart_item_id");
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url("delete-from-cart"); ?>",
                    data: {
                        "cart_item_id" : cartItemId
                    },
                    success: function (response) {
                        if(response=='deleted'){
                            location.reload();
                        }
                    }
                });
            });
        </script>