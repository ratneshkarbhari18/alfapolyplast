<main class="page-content">

    <!-- Products Area -->
    <div class="tm-products-area tm-section tm-padding-section bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-12 col-12">
                    <!-- Product Details -->
                    <div class="tm-prodetails">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="tm-prodetails-images">
                                    <div class="tm-prodetails-largeimages">
                                        <div class="tm-prodetails-largeimage">
                                            <a data-fancybox="tm-prodetails-imagegallery"
                                                href="<?php echo site_url("assets/images/product_featured/".$focusProduct["featured_image"]); ?>"
                                                data-caption="Product Zoom Image 1">
                                                <img src="<?php echo site_url("assets/images/product_featured/".$focusProduct["featured_image"]); ?>"
                                                    alt="product image">
                                            </a>
                                        </div>
                                        <!-- <div class="tm-prodetails-largeimage">
                                            <a data-fancybox="tm-prodetails-imagegallery"
                                                href="assets/images/products/product-image-2.jpg"
                                                data-caption="Product Zoom Image 2">
                                                <img src="assets/images/products/product-image-2.jpg"
                                                    alt="product image">
                                            </a>
                                        </div> -->
                                        <?php $gallery_images = json_decode($focusProduct["gallery_images"],TRUE); foreach($gallery_images as $gi): ?>
                                        <div class="tm-prodetails-largeimage">
                                            <a data-fancybox="tm-prodetails-imagegallery"
                                                href="<?php echo site_url("assets/images/gallery_product/".$gi); ?>"
                                                data-caption="Product Zoom Image 3">
                                                <img src="<?php echo site_url("assets/images/gallery_product/".$gi); ?>"
                                                    alt="product image">
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="tm-prodetails-thumbnails"> 
                                        <?php foreach($gallery_images as $gi): ?>
                                        <div class="tm-prodetails-thumbnail">
                                            <img src="<?php echo site_url("assets/images/gallery_product/".$gi); ?>"
                                                alt="product image">
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="tm-prodetails-content">
                                    <h4 class="tm-prodetails-title"><?php echo $focusProduct["title"]; ?></h4>
                                    <div class="tm-ratingbox d-none">
                                        <span class="is-active"><i class="ion-android-star"></i></span>
                                        <span class="is-active"><i class="ion-android-star"></i></span>
                                        <span class="is-active"><i class="ion-android-star"></i></span>
                                        <span class="is-active"><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                    </div>
                                    <?php $pricesObj = json_decode($focusProduct["prices"],TRUE); ?>
                                    <div class="tm-prodetails-price">
                                        <span>$ <?php echo $pricesObj["na"]; ?></span>
                                    </div>
                                    <ul class="tm-prodetails-infos d-none">
                                        <li>Catagory: <a href="shop.html">Fishing equipments</a></li>
                                        <li>Tags: <a href="shop.html">fishing woobler</a>, <a
                                                href="shop.html">fising hook</a>, <a href="shop.html">fishing
                                                reels</a></li>
                                        <li>Product ID: 100</li>
                                        <li>Available: <span class="color-theme">In stock</span></li>
                                    </ul>
                                    <p id="success-message" class="text-success"></p>
                                    <p id="error-message" class="text-danger"></p>
                                    <div class="tm-prodetails-quantitycart">
                                        <div class="tm-quantitybox">
                                            <input type="text" id="qtyBox" value="1">
                                        </div>
                                        <a href="#" id="atc-button" class="tm-button tm-button-dark">Add To Cart</a>
                                    </div>

                                    <div class="tm-prodetails-paras">
                                        <p><?php echo $focusProduct["description"]; ?></p>
                                    </div>
                                    
                                    <div class="tm-prodetails-share d-none">
                                        <h6>Share :</h6>
                                        <ul>
                                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a>
                                            </li>
                                            <li><a href="#"><i class="ion-social-skype-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-social-pinterest-outline"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Product Details -->
                    
                </div>
            </div>
        </div>
    </div>
    <!--// Products Area -->

</main>
<style>
    .page-content{
        margin-top: 16vh;
    }
</style>
<script>
    $("a#atc-button").click(function (e) { 
        e.preventDefault();
        alert("Clicked");
        let pid = '<?php echo $focusProduct["id"]; ?>';
        let qty = $("input#qtyBox").val();
        let cid = '<?php if (isset($_SESSION["first_name"])) {
            echo $_SESSION["id"];
        } else {
            echo '0';
        }
         ?>';
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("atc-endpoint"); ?>",
            data: {
                "pid": pid,
                "qty" : qty,
                "cid" : cid
            },
            success: function (response) {
                console.log(response);
                if (response=="added-to-cart") {
                    $("p#success-message").html("Product Added to Cart");
                }else{
                    $("p#error-message").html("Product Not Added to Cart");
                }                
            }
        });
    });
</script>