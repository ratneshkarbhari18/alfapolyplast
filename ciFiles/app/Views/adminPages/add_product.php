<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h1 class="page-title"><?php echo $title; ?></h1>
        <p class="text-success darken-4"><?php echo $success; ?></p>
        <p class="text-danger darken-4"><?php echo $error; ?></p>

        <form action="<?php echo site_url('add-product-exe'); ?>" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug">
            </div>
            <div class="form-group">
                <label for="category">Category</label>

                <select name="category" id="category" class="form-control">
                    <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category["id"]; ?>"><?php echo $category["title"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="price_in">India Price</label>
                <input class="form-control" type="text" name="price_in" id="price_in">
            </div>
            <div class="form-group">
                <label for="price_na">North America Price</label>
                <input class="form-control" type="text" name="price_na" id="price_na">
            </div>
            <div class="form-group">
                <label for="price_sa">South America Price</label>
                <input class="form-control" type="text" name="price_sa" id="price_sa">
            </div>
            <div class="form-group">
                <label for="price_au">Australia Price</label>
                <input class="form-control" type="text" name="price_au" id="price_au">
            </div>
            <div class="form-group">
                <label for="price_saf">South Africa Price</label>
                <input class="form-control" type="text" name="price_saf" id="price_saf">
            </div>
            <div class="form-group">
                <label for="price_jp">Japan Price</label>
                <input class="form-control" type="text" name="price_jp" id="price_jp">
            </div>
            <div class="form-group">
                <label for="price_uk">UK Price</label>
                <input class="form-control" type="text" name="price_uk" id="price_uk">
            </div>
            <div class="form-group">
                <label for="price_eu">Europe Price</label>
                <input class="form-control" type="text" name="price_eu" id="price_eu">
            </div>

                       
            <div class="form-group">
                <label for="featured_image">Featured Image</label><br>
                <input type="file" name="featured_image" id="featured_image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="gallery_images">Gallery Images</label><br>
                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success"> Add Product </button>

        </form>
        
    </div>
</main>