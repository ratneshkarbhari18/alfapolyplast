<main class="page-content">

            <!-- My Account Area -->
            <div class="tm-section tm-my-account-area bg-white tm-padding-section">
                <div class="container">
                    <div class="tm-myaccount">

                        <ul class="nav text-center tm-tabgroup2" id="account" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab"
                                    href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                    aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                    role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address"
                                    role="tab" aria-controls="account-address" aria-selected="false">Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-acdetails-tab" data-toggle="tab"
                                    href="#account-acdetails" role="tab" aria-controls="account-acdetails"
                                    aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-logout-tab" href="<?php echo site_url("logout"); ?>" role="tab"
                                    aria-controls="account-address" aria-selected="false">Logout</a>
                            </li>
                        </ul>

                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-10 col-12">


                                <div class="tab-content" id="account-ontent">
                                    <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                        aria-labelledby="account-dashboard-tab">
                                        <div class="tm-myaccount-dashboard">
                                            <p>Hello <b><?php echo session("first_name").' '.session("last_name"); ?></b> (not <b><?php echo session("first_name").' '.session("last_name"); ?></b>? <a
                                                    href="login-register.html">Log
                                                    out</a>)</p>
                                            <p>From your account dashboard you can view your recent orders, manage your
                                                shipping and billing addresses, and edit your password and account
                                                details.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                        aria-labelledby="account-orders-tab">
                                        <div class="tm-myaccount-orders">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0 d-none">
                                                    <thead>
                                                        <tr>
                                                            <th class="tm-myaccount-orders-col-id">ORDER ID</th>
                                                            <th class="tm-myaccount-orders-col-date">DATE</th>
                                                            <th class="tm-myaccount-orders-col-status">STATUS</th>
                                                            <th class="tm-myaccount-orders-col-total">TOTAL</th>
                                                            <th class="tm-myaccount-orders-col-view">VIEW</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#12345</td>
                                                            <td>30 December 2018</td>
                                                            <td>On Hold</td>
                                                            <td>$132.00 for 2 items</td>
                                                            <td><a href="#" class="tm-button tm-button-small">View</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#12346</td>
                                                            <td>30 December 2018</td>
                                                            <td>On Hold</td>
                                                            <td>$220.00 for 3 items</td>
                                                            <td><a href="#" class="tm-button tm-button-small">View</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p>No Orders Found</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-address" role="tabpanel"
                                        aria-labelledby="account-address-tab">
                                        <div class="tm-myaccount-address">
                                            <p><b>The following addresses will be used on the checkout page by
                                                    default.</b></p>
                                            <div class="row d-none">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="tm-myaccount-address-billing">
                                                        <a href="#" class="edit-button">Edit</a>
                                                        <h5>Billing Address</h5>
                                                        <address>
                                                            Jonathon Doe<br>
                                                            Example company<br>
                                                            516 Wintheiser Circles <br>
                                                            Lake Jordanmouth <br>
                                                            Jordan
                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mt-30 mt-md-0">
                                                    <div class="tm-myaccount-address-shipping">
                                                        <a href="#" class="edit-button">Edit</a>
                                                        <h5>Shipping Address</h5>
                                                        <address>
                                                            Jonathon Doe<br>
                                                            Example company<br>
                                                            516 Wintheiser Circles <br>
                                                            Lake Jordanmouth <br>
                                                            Jordan
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-acdetails" role="tabpanel"
                                        aria-labelledby="account-acdetails-tab">
                                        <div class="tm-myaccount-acdetails">
                                            <form action="#" class="tm-form tm-form-bordered">
                                                <h4>Account Details</h4>
                                                <div class="tm-form-inner">
                                                    <div class="tm-form-field tm-form-fieldhalf">
                                                        <label for="acdetails-firstname">First name</label>
                                                        <input type="text" id="acdetails-firstname" value="<?php echo session("first_name"); ?>">
                                                    </div>
                                                    <div class="tm-form-field tm-form-fieldhalf">
                                                        <label for="acdetails-lastname">Last name</label>
                                                        <input type="text" id="acdetails-lastname" value="<?php echo session("last_name"); ?>">
                                                    </div>
                                                    
                                                    <div class="tm-form-field">
                                                        <label for="acdetails-email">Email address</label>
                                                        <input type="email" id="acdetails-email" value="<?php echo session("email"); ?>">
                                                    </div>
                                                    <!-- <div class="tm-form-field">
                                                        <label for="acdetails-password">Old password</label>
                                                        <input type="password" id="acdetails-password">
                                                    </div>
                                                    <div class="tm-form-field">
                                                        <label for="acdetails-newpassword">New password</label>
                                                        <input type="password" id="acdetails-newpassword">
                                                    </div>
                                                    <div class="tm-form-field">
                                                        <label for="acdetails-confirmpass">Confirm password</label>
                                                        <input type="password" id="acdetails-confirmpass">
                                                    </div> -->
                                                    <!-- <div class="tm-form-field">
                                                        <input type="checkbox" name="acdetails-agreeterms"
                                                            id="acdetails-agreeterms">
                                                        <label for="acdetails-agreeterms">I have read and agree to the
                                                            Privacy
                                                            Policy</label>
                                                    </div> -->
                                                    <div class="tm-form-field">
                                                        <button type="submit" class="tm-button">Save Changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// My Account Area -->


        </main>