<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Paket-paket yang di-autoload saat sistem diinisialisasi.
| DIKOSONGKAN SAJA (biasanya tidak perlu diisi).
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| Library-library yang di-autoload saat sistem diinisialisasi.
| **KEMBALIKAN KE KONDISI AWAL - HAPUS 'rest_controller' DARI DAFTAR INI (JIKA ADA)**
*/
$autoload['libraries'] = array('database', 'session', 'form_validation'); // **KEMBALIKAN KE KONDISI AWAL - HAPUS 'rest_controller' JIKA ADA**

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| Driver-driver yang di-autoload saat sistem diinisialisasi.
| DIKOSONGKAN SAJA.
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helpers
| -------------------------------------------------------------------
| Helper-helper yang di-autoload saat sistem diinisialisasi.
*/
$autoload['helper'] = array('url', 'form');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| File-file konfigurasi custom yang di-autoload saat sistem diinisialisasi.
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Languages
| -------------------------------------------------------------------
| Language files to autoload
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Model files to autoload
*/
$autoload['model'] = array('UserModel', 'DukunModel', 'ArticleModel', 'SystemAdminModel');