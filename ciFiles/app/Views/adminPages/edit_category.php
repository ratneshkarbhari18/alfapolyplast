<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h1 class="page-title"><?php echo $title; ?></h1>
        <p class="text-success darken-4"><?php echo $success; ?></p>
        <p class="text-danger darken-4"><?php echo $error; ?></p>

        <form action="<?php echo site_url('update-category-exe'); ?>" enctype="multipart/form-data" method="post">

            <input type="hidden" name="id" value="<?php echo $category["id"];  ?>">

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="<?php echo $category["title"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug" value="<?php echo $category["slug"]; ?>">
            </div>
            <img src="<?php echo site_url("assets/images/category_featured/".$category["featured_image"]); ?>" style="width: 30%;">
            <div class="form-group">
                <label for="featured_image">Featured Image</label><br>
                <input type="file" name="featured_image" id="featured_image" accept="image/*">
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?php echo $category["description"]; ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success"> Update Category </button>

        </form>
        
    </div>
</main>