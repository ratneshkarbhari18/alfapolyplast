<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PageLoader');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Site Page Routes
$routes->get('/', 'PageLoader::home');
$routes->get("admin-login","PageLoader::admin_login");
$routes->get("product/(:any)","PageLoader::product/$1");
$routes->get("category/(:any)","PageLoader::category/$1");

// Authentication
$routes->post("admin-login-exe","Authentication::admin_login");
$routes->get("logout","Authentication::logout");

// cart endpoints
$routes->post("atc-endpoint","Cart::add");

// Admin Pages
$routes->get("dashboard","PageLoader::dashboard");
$routes->get("manage-categories","PageLoader::manage_categories");
$routes->get("add-category","PageLoader::add_category");
$routes->get("edit-category/(:any)","PageLoader::edit_category/$1");
$routes->get("manage-products","PageLoader::manage_products");
$routes->get("add-product","PageLoader::add_product");
$routes->get("edit-product/(:any)","PageLoader::edit_product/$1");

// Category Routes
$routes->post("add-category-exe","Categories::add");
$routes->post("update-category-exe","Categories::update");
$routes->post("delete-category-exe","Categories::delete");

// Product Routes
$routes->post("add-product-exe","Products::add");
$routes->post("update-product-exe","Products::update");
$routes->post("delete-product-exe","Products::delete");


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
