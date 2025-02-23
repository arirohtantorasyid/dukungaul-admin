<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| --------------------------------------------------------------------------
|  PENGATURAN RUTE UTAMA (DEFAULT ROUTING)
| --------------------------------------------------------------------------
|  Rute default untuk aplikasi.
|  Jika URL dasar backend diakses (misal: http://localhost/dukungaul/backend/),
|  akan diarahkan ke halaman login admin.
*/
$route['default_controller'] = 'admin/AuthAdmin/login';

/*
| --------------------------------------------------------------------------
|  PENANGANAN ERROR 404 (404 OVERRIDE)
| --------------------------------------------------------------------------
|  Controller yang akan menangani error 404 (Halaman Tidak Ditemukan).
*/
$route['404_override'] = 'Errors/not_found';

/*
| --------------------------------------------------------------------------
|  UBAH DASH URI (TRANSLATE URI DASHES)
| --------------------------------------------------------------------------
|  Konfigurasi untuk mengubah URI dashes (-) menjadi underscores (_) dalam
|  nama controller dan method.
|  Contoh: 'nama-controller/nama-method' menjadi 'nama_controller/nama_method'.
*/
$route['translate_uri_dashes'] = FALSE;

/*
| --------------------------------------------------------------------------
|  GRUP RUTE API (FRONTEND) - API ROUTES (FRONTEND)
| --------------------------------------------------------------------------
|  Rute-rute API untuk aplikasi frontend (misalnya, aplikasi Android).
|  Semua rute API berada di bawah awalan 'api/'.
*/

// Rute Default API (Jika hanya '/api/' diakses)
$route['api'] = 'api/Auth/login';

// --- GRUP RUTE AUTENTIKASI (API Authentication Routes) ---
$route['api/auth/register'] = 'api/Auth/register';
$route['api/auth/login']    = 'api/Auth/login';

// --- GRUP RUTE USER (API User Routes) ---
$route['api/user/profile/(:num)'] = 'api/User/get_user_profile/$1';

// --- GRUP RUTE DUKUN (API Dukun Routes) ---
$route['api/dukuns']            = 'api/Dukun/get_dukuns';
$route['api/dukuns/(:num)']     = 'api/Dukun/get_dukun_detail/$1';

// --- GRUP RUTE ARTIKEL (API Artikel Routes) ---
$route['api/articles']         = 'api/ArticleController/get_articles';
$route['api/articles/(:num)']  = 'api/ArticleController/get_article_detail/$1';

// --- GRUP RUTE FITUR CARDS (API Feature Cards Routes) ---
$route['api/feature_cards']    = 'Api/FeatureCardController/index_get';

// --- GRUP RUTE BANNER SLIDERS (API Banner Sliders Routes) ---
$route['api/banner_sliders']   = 'Api/BannerSliderController/index_get';

// --- GRUP RUTE LIVE SESSIONS (API Live Sessions Routes) ---
$route['api/live-sessions']        = 'LiveSessionController/list';
$route['api/live-sessions/create']   = 'LiveSessionController/create';


/*
| --------------------------------------------------------------------------
|  GRUP RUTE ADMIN PANEL (BACKEND) - ADMIN PANEL ROUTES (BACKEND)
| --------------------------------------------------------------------------
|  Rute-rute untuk halaman Admin Panel (Backend).
|  Semua rute admin panel berada di bawah awalan 'admin/'.
*/

// --- GRUP RUTE AUTENTIKASI ADMIN (Admin Authentication Routes) ---
$route['admin/auth/login']         = 'admin/AuthAdmin/login';
$route['admin/auth/process_login'] = 'admin/AuthAdmin/process_login';
$route['admin/auth/logout']        = 'admin/AuthAdmin/logout';

// --- GRUP RUTE DASHBOARD ADMIN (Admin Dashboard Routes) ---
$route['admin/dashboard']          = 'admin/Dashboard/index';

// --- GRUP RUTE MANAJEMEN DUKUN ADMIN (Admin Dukun Management Routes) ---
$route['admin/dukuns']               = 'admin/AdminDukun/index';
$route['admin/dukuns/create']        = 'admin/AdminDukun/create';
$route['admin/dukuns/save']          = 'admin/AdminDukun/save';
$route['admin/dukuns/edit/(:num)']   = 'admin/AdminDukun/edit/$1';
$route['admin/dukuns/update/(:num)'] = 'admin/AdminDukun/update/$1';
$route['admin/dukuns/delete/(:num)'] = 'admin/AdminDukun/delete/$1';

// --- GRUP RUTE MANAJEMEN ARTIKEL ADMIN (Admin Artikel Management Routes) ---
$route['admin/articles']             = 'admin/AdminArticle/index';
$route['admin/articles/create']      = 'admin/AdminArticle/create';
$route['admin/articles/save']        = 'admin/AdminArticle/save';
$route['admin/articles/edit/(:num)'] = 'admin/AdminArticle/edit/$1';
$route['admin/articles/update/(:num)'] = 'admin/AdminArticle/update/$1';
$route['admin/articles/delete/(:num)'] = 'admin/AdminArticle/delete/$1';

// --- GRUP RUTE KONFIGURASI SISTEM ADMIN (Admin System Config Routes) ---
$route['admin/system/config']              = 'admin/AdminSystemConfig/index';
$route['admin/system/config/update_smtp']    = 'admin/AdminSystemConfig/update_smtp_config';
$route['admin/system/config/update_payment'] = 'admin/AdminSystemConfig/update_payment_gateway_config';

// Rute Admin Panel Fitur Cards (Manajemen Fitur Cards di Admin Panel)
$route['admin/feature_card'] = 'admin/AdminFeatureCard/index';
$route['admin/feature_card/create'] = 'admin/AdminFeatureCard/create_form';
$route['admin/feature_card/save'] = 'admin/AdminFeatureCard/save';
$route['admin/feature_card/edit/(:num)'] = 'admin/AdminFeatureCard/edit/$1';
$route['admin/feature_card/delete/(:num)'] = 'admin/AdminFeatureCard/delete/$1';

// --- GRUP RUTE BANNER SLIDERS ADMIN ---
$route['admin/banner_slider']          = 'admin/AdminBannerSlider/index';
$route['admin/banner_slider/create']   = 'admin/AdminBannerSlider/create';
$route['admin/banner_slider/save']     = 'admin/AdminBannerSlider/save';
$route['admin/banner_slider/edit/(:num)'] = 'admin/AdminBannerSlider/edit/$1';
$route['admin/banner_slider/update/(:num)'] = 'admin/AdminBannerSlider/update/$1';
$route['admin/banner_slider/delete/(:num)'] = 'admin/AdminBannerSlider/delete/$1';