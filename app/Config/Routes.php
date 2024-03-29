<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
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

/**
 * 1) For homepage, login, and logout function
 */
$routes->get("/", "Home::index");
$routes->get("/login", "Home::index");
$routes->post("/login", "Home::login");
$routes->get("/logout", "Home::logout");

/**
 * 2) Dashboard
 */
$routes->get("/dashboard", "Dashboard::index");

/**
 * 3) Konsumen
 */
$routes->get("/konsumen", "Konsumen::index");
$routes->get("/konsumen/detail/(:any)", "Konsumen::displayDetailKonsumen/$1");
$routes->get("/konsumen/id/(:any)", "Konsumen::getDataKonsumen/$1");
$routes->get("/konsumen/search/(:any)", "Konsumen::getDataKonsumenByKeyword/$1");
$routes->post("/konsumen/create", "Konsumen::createNewKonsumen");
$routes->post("/konsumen/update", "Konsumen::updateKonsumen");
$routes->get("/konsumen/delete/(:any)", "Konsumen::deleteKonsumen/$1");

/**
 * 4) Pemesanan
 */
$routes->get("/pemesanan", "Pemesanan::index");
$routes->get("/pemesanan/detail/(:any)", "Pemesanan::displayDetailPemesanan/$1");
$routes->get("/pemesanan/edit/(:any)", "Pemesanan::editPesanan/$1");
$routes->post("/pemesanan/update", "Pemesanan::updatePesanan");
$routes->get("/pemesanan/delete/(:any)", "Pemesanan::deletePemesanan/$1");
$routes->get("/buat-pemesanan", "Pemesanan::pemesananForm");
$routes->post("/buat-pemesanan/create", "Pemesanan::createNewPemesanan");
$routes->post("/pemesanan/bayar", "Pemesanan::addPembayaranKredit");
$routes->get("/pemesanan/cancel/(:any)", "Pemesanan::cancelPemesanan/$1");
$routes->get("/pemesanan/activate/(:any)", "Pemesanan::activatePemesanan/$1");

/**
 * 5) Kredit
 */
$routes->get("/kredit/progress", "Kredit::onProgress");
$routes->get("/kredit/terbayar", "Kredit::kreditTerbayar");
$routes->post("/kredit/progress/cari", "Kredit::onProgress");
$routes->post("/kredit/terbayar/cari", "Kredit::kreditTerbayar");
$routes->get("/kredit/log/id/(:any)", "Kredit::getKreditLog/$1");
$routes->post("/kredit/log/update", "Kredit::updateKreditLog");
$routes->get("/kredit/log/delete/(:any)", "Kredit::deleteKreditLog/$1");

/**
 * 6) Master Data
 */
$routes->get("/masters/(:alpha)", "Masters::index/$1");
$routes->get("/masters/sales/id/(:any)", "Masters::getMasterDataSales/$1");
$routes->post("/masters/sales/create", "Masters::createMasterSales");
$routes->post("/masters/sales/update", "Masters::updateMasterSales");
$routes->get("/masters/sales/delete/(:any)", "Masters::deleteMasterSales/$1");

$routes->get("/masters/collector/id/(:any)", "Masters::getMasterDatacollector/$1");
$routes->post("/masters/collector/create", "Masters::createMastercollector");
$routes->post("/masters/collector/update", "Masters::updateMastercollector");
$routes->get("/masters/collector/delete/(:any)", "Masters::deleteMastercollector/$1");

$routes->post("/masters/lensa/create", "Masters::createMasterDataLensa");
$routes->get("/masters/lensa/(:alpha)/(:num)", "Masters::getMasterDataLensa/$1/$2");
$routes->post("/masters/lensa/update", "Masters::updateMasterDataLensa");
$routes->get("/masters/lensa/delete/(:alpha)/(:num)", "Masters::deleteMasterDataLensa/$1/$2");
$routes->get("/masters/lensa/kategori/(:alpha)/(:num)", "Masters::getMasterDataLensByCategory/$1/$2");

/**
 * 7) User and Roles
 */
$routes->get("/admin", "Pengguna::index");
$routes->get("/admin/id/(:any)", "Pengguna::getDataAdmin/$1");
$routes->post("/admin/create", "Pengguna::createAdmin");
$routes->post("/admin/update", "Pengguna::updateAdmin");
$routes->match(["get", "post"], "/admin/delete/(:any)", "Pengguna::deleteAdmin/$1");

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
