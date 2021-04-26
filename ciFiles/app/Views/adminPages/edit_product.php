<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h1 class="page-title"><?php echo $title; ?></h1>
        <p class="text-success darken-4"><?php echo $success; ?></p>
        <p class="text-danger darken-4"><?php echo $error; ?></p>

        <form action="<?php echo site_url('update-product-exe'); ?>" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="<?php echo $product["title"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug" value="<?php echo $product["slug"]; ?>">
            </div>
            <select name="category" id="category" class="form-control">
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category["id"]; ?>" <?php if($product["category"]==$category["id"]){echo "selected";} ?>><?php echo $category["title"]; ?></option>
                <?php endforeach; ?>
            </select>
            <?php $pricesObj = json_decode($product["prices"],TRUE); ?>
            <div class="form-group">
                <label for="price_in">India Price</label>
                <input class="form-control" type="text" name="price_in" value="<?php echo $pricesObj["in"]; ?>" id="price_in">
            </div>
            <div class="form-group">
                <label for="price_na">North America Price</label>
                <input class="form-control" type="text" name="price_na" id="price_na" value="<?php echo $pricesObj["na"]; ?>">
            </div>
            <div class="form-group">
                <label for="price_sa">South America Price</label>
                <input class="form-control" type="text" name="price_sa" id="price_sa" value="<?php echo $pricesObj["sa"]; ?>">
            </div>
            <div class="form-group">
                <label for="price_au">Australia Price</label>
                <input class="form-control" type="text" name="price_au" id="price_au" value="<?php echo $pricesObj["au"]; ?>">
            </div>
            <div class="form-group">
                <label for="price_saf">South Africa Price</label>
                <input class="form-control" type="text" name="price_saf" id="price_saf" value="<?php echo $pricesObj["saf"]; ?>">
            </div>
            <div class="form-group">
                <label for="price_jp">Japan Price</label>
                <input class="form-control" type="text" name="price_jp" id="price_jp" value="<?php echo $pricesObj["jp"]; ?>">
            </div>
            <div class="form-group">
                <label for="price_uk">UK Price</label>
                <input class="form-control" type="text" name="price_uk" id="price_uk" value="<?php echo $pricesObj["uk"]; ?>">
            </div>
            <div class="form-group">
                <label for="price_eu">Europe Price</label>
                <input class="form-control" type="text" name="price_eu" id="price_eu" value="<?php echo $pricesObj["eu"]; ?>">
            </div>

            <img src="<?php echo site_url("assets/images/product_featured/".$product["featured_image"]); ?>" style="width: 20%;">
            <div class="form-group">
                <label for="featured_image">Featured Image</label><br>
                <input type="file" name="featured_image" id="featured_image" accept="image/*">
            </div>
            <?php $gallery_images = json_decode($product["gallery_images"],TRUE); 
            foreach($gallery_images as $gi):
            ?>
            <img src="<?php echo site_url("assets/images/gallery_product/".$gi); ?>" style="width: 20%;">
            <?php endforeach; ?>
            <div class="form-group">
                <label for="gallery_images">Replace Gallery Images</label><br>
                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?php echo $product["description"]; ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success"> Update Product </button>

        </form>
        
    </div>
</main>