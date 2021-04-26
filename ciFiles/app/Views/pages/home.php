<main class="page-content" id="home">

    <section id="all-products" class="usual-section">

        <div class="container">

            <h1 class="text-center">All Products</h1>

            <div class="row">
                <?php foreach($products as $product): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="<?php echo site_url("product/".$product["slug"]); ?>">
                        <div class="card">

                            <img src="<?php echo site_url("assets/images/product_featured/".$product["featured_image"]); ?>" class="card-img-top">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product["title"]; ?></h5>
                                <p class="card-text product-price">$ <?php $prices = json_decode($product["prices"],TRUE); echo $prices["na"]; ?></p>
                            </div>                    
                        
                        </div>
                    </a>
                
                
                </div>
                <?php endforeach; ?>
            
            </div>

        </div>
    
    </section>    

</main>