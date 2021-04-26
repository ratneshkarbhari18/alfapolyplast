<main class="page-container" id="customer-login" >

    <div class="container">

        <div class="row" style="padding-top: 10%;">
        
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">
            

                <h1 class="text-center"><?php echo $title; ?></h1>
                <p class="text-danger text-center"><?php echo $error; ?></p>        


                <form action="<?php echo site_url('customer-login-exe'); ?>" method="post">
                
                    <div class="form-group">
                    
                        <label for="customer-email">Email</label>
                        <input class="form-control" type="email" name="customer-email" id="customer-email">
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="customer-password">Password</label>
                        <input class="form-control" type="password" name="customer-password" id="customer-password">
                    
                    </div>

                    <button type="submit" style="margin: 3% 0;" class="btn btn-success btn-block">Login</button>
                
                </form>
            
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>


        </div>
    
    </div>

</main>

<style>

header,footer{
    display: none;
}

</style>