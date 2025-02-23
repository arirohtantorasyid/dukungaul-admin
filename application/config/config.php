<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
| URL ke root proyek backend Anda. WAJIB DIUBAH SESUAI LOKASI PROYEK!
| Jika di localhost XAMPP: 'http://localhost/dukungaul/backend/'
| Jika di server publik: 'https://domain-anda.com/backend/'
*/
$config['base_url'] = 'http://localhost/dukungaul/backend/'; // ⚠️ SESUAIKAN INI DENGAN LOKASI PROYEK ANDA! ⚠️

/*
|--------------------------------------------------------------------------
| Index Page
|--------------------------------------------------------------------------
| Hapus 'index.php' dari URL jika menggunakan mod_rewrite Apache (.htaccess)
| Biarkan kosong jika menggunakan .htaccess untuk menghilangkan index.php
| Jika tidak menggunakan .htaccess, biarkan 'index.php'
*/
$config['index_page'] = ''; // ✅ HILANGKAN 'index.php' JIKA MENGGUNAKAN .htaccess

/*
|--------------------------------------------------------------------------
| URI Protocol
|--------------------------------------------------------------------------
| 'REQUEST_URI' (paling umum dan disarankan untuk Apache dengan mod_rewrite)
| 'PATH_INFO' (jika server Anda mendukung PATH_INFO)
| 'QUERY_STRING' (fallback jika tidak ada yang lain berfungsi)
*/
$config['uri_protocol']    = 'REQUEST_URI'; // ✅ DISARANKAN: REQUEST_URI (untuk Apache dengan mod_rewrite)

/*
|--------------------------------------------------------------------------
| URL Suffix
|--------------------------------------------------------------------------
| Tambahkan akhiran (suffix) pada URL controller Anda (misalnya, '.html')
| Biasanya dibiarkan kosong
*/
$config['url_suffix'] = '';

/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
| Bahasa default aplikasi Anda
*/
$config['language']    = 'english'; // ✅ BAHASA DEFAULT: english (atau 'indonesian' jika ingin bahasa Indonesia default)

/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
| Charset default aplikasi Anda
*/
$config['charset'] = 'UTF-8'; // ✅ CHARSET DEFAULT: UTF-8 (standar web)

/*
|--------------------------------------------------------------------------
| Enable/Disable System Hooks
|--------------------------------------------------------------------------
| Aktifkan/nonaktifkan system hooks CodeIgniter
| Biasanya dibiarkan nonaktif (FALSE) kecuali Anda menggunakan hooks
*/
$config['enable_hooks'] = FALSE;

/*
|--------------------------------------------------------------------------
| Class Extension Prefix
|--------------------------------------------------------------------------
| Prefix untuk subclass core CodeIgniter (libraries, models, controllers, dll.)
| Biarkan 'MY_' (default) atau sesuaikan jika perlu
*/
$config['subclass_prefix'] = 'MY_';

/*
|--------------------------------------------------------------------------
| Composer Auto-autoloading
|--------------------------------------------------------------------------
| Aktifkan auto-autoloading library Composer
| Pastikan COMPOSER sudah terinstall dan autoload.php ada di vendor/autoload.php
*/
//$config['composer_autoload'] = TRUE; // ✅ AKTIFKAN COMPOSER AUTOLOAD (jika Anda menggunakan Composer)
$config['composer_autoload'] = FCPATH . 'vendor/autoload.php';
/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
| Karakter yang diizinkan dalam URI (URL)
| Jangan diubah kecuali Anda punya alasan khusus
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

/*
|--------------------------------------------------------------------------
| Enable Query Strings
|--------------------------------------------------------------------------
| Aktifkan penggunaan query string (misalnya, index.php?c=controller&m=method)
| Biasanya dinonaktifkan (FALSE) jika menggunakan URL yang lebih bersih (tanpa query string)
*/
$config['enable_query_strings'] = FALSE;

/*
|--------------------------------------------------------------------------
| Controller, Function, and Directory URI Triggers
|--------------------------------------------------------------------------
| URI triggers untuk controller, method, dan direktori
| Biarkan default 'c', 'm', 'd' kecuali Anda punya alasan khusus
*/
$config['controller_trigger']    = 'c';
$config['function_trigger']      = 'm';
$config['directory_trigger']     = 'd';

/*
|--------------------------------------------------------------------------
| Allow $_GET Array
|--------------------------------------------------------------------------
| Izinkan penggunaan $_GET array
| Biasanya diaktifkan (TRUE)
*/
$config['allow_get_array']       = TRUE;

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
| Batas level error logging:
| 0 = Nonaktif logging
| 1 = Hanya Error (level ERROR dan CRITICAL) - DISARANKAN UNTUK PRODUKSI
| 2 = Error dan Warning (level ERROR, CRITICAL, dan WARNING)
| 3 = Error, Warning, dan Notice (level ERROR, CRITICAL, WARNING, dan NOTICE)
| 4 = Semua Pesan (termasuk DEBUG) - DISARANKAN UNTUK DEBUGGING
*/
$config['log_threshold'] = 4; // ✅ UBAH KE 4 UNTUK DEBUGGING DETAIL, UBAH KE 1 UNTUK PRODUKSI

/*
|--------------------------------------------------------------------------
| Log Path
|--------------------------------------------------------------------------
| Path direktori untuk menyimpan file log
| Pastikan direktori ini writable oleh server
*/
$config['log_path'] = APPPATH . 'logs/'; // ✅ PATH LOG: APPPATH . 'logs/' (direktori 'logs' di dalam 'application/')

/*
|--------------------------------------------------------------------------
| Log File Extension
|--------------------------------------------------------------------------
| Ekstensi file log
*/
$config['log_file_extension'] = 'log';

/*
|--------------------------------------------------------------------------
| Log File Permissions
|--------------------------------------------------------------------------
| Permissions untuk file log
*/
$config['log_file_permissions'] = 0644;

/*
|--------------------------------------------------------------------------
| Log Date Format
|--------------------------------------------------------------------------
| Format tanggal di log
*/
$config['log_date_format'] = 'Y-m-d H:i:s';

/*
|--------------------------------------------------------------------------
| Error Views Directory Path
|--------------------------------------------------------------------------
| Path direktori untuk view error (misalnya, 404, 500)
| Pastikan path ini benar
*/
$config['error_views_path'] = VIEWPATH . 'errors/'; // ✅ PATH ERROR VIEWS: VIEWPATH . 'errors/' (direktori 'errors' di dalam 'views/')

/*
|--------------------------------------------------------------------------
| Cache Directory Path
|--------------------------------------------------------------------------
| Path direktori untuk cache aplikasi
| Biarkan kosong jika tidak menggunakan cache
*/
$config['cache_path'] = '';

/*
|--------------------------------------------------------------------------
| Cache Query String
|--------------------------------------------------------------------------
| Apakah query string mempengaruhi cache
| Biasanya dinonaktifkan (FALSE)
*/
$config['cache_query_string'] = FALSE;

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
| Key enkripsi untuk aplikasi Anda. WAJIB DIGANTI DENGAN KEY YANG KUAT DAN UNIK!
| Gunakan key yang panjang, acak, dan sulit ditebak.
*/
$config['encryption_key'] = 'GantiDenganKeyYangSangatPanjangDanAcak!'; // ⚠️ GANTI DENGAN KEY ENKRIPSI YANG SANGAT KUAT! ⚠️

/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
| Konfigurasi session CodeIgniter
*/
$config['sess_driver'] = 'files';
$config['sess_cookie_name']     = 'ci_session';
$config['sess_expiration']    = 7200;
$config['sess_save_path'] = sys_get_temp_dir(); // ✅ PATH SESSION: sys_get_temp_dir() (atau direktori writable lain)
$config['sess_match_ip']       = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
| Konfigurasi cookie
*/
$config['cookie_prefix']    = '';
$config['cookie_domain']    = '';
$config['cookie_path']      = '/';
$config['cookie_secure']    = FALSE;
$config['cookie_httponly']     = TRUE; // ✅ COOKIE HTTPONLY: TRUE (untuk keamanan)

/*
|--------------------------------------------------------------------------
| Standardize Newlines
|--------------------------------------------------------------------------
| Apakah standarisasi newlines
| Biarkan FALSE (default)
*/
$config['standardize_newlines'] = FALSE;

/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
| Apakah aktifkan filter XSS global
| Biasanya dinonaktifkan (FALSE) dan filter XSS dilakukan secara selektif
*/
$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| CSRF Protection
|--------------------------------------------------------------------------
| Aktifkan CSRF protection untuk keamanan. DISARANKAN DI AKTIFKAN DI PRODUKSI
| Untuk development, bisa dinonaktifkan sementara
*/
$config['csrf_protection'] = FALSE; // ⚠️ AKTIFKAN CSRF PROTECTION DI PRODUKSI (UBAH KE TRUE)! ⚠️

$config['csrf_token_name'] = 'csrf_token';
$config['csrf_cookie_name'] = 'csrf_cookie';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
| Apakah kompres output HTML
| Biasanya dinonaktifkan (FALSE) atau diaktifkan di server web (misalnya, gzip di Nginx/Apache)
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Time Reference
|--------------------------------------------------------------------------
| Referensi waktu aplikasi Anda
*/
$config['time_reference'] = 'local';

/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
| Apakah rewrite PHP short tags (<? ?>) menjadi <?php ?>
| Biarkan FALSE (default)
*/
$config['rewrite_short_tags'] = FALSE;

/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
| IP address reverse proxy Anda (jika ada)
| Biarkan kosong jika tidak menggunakan reverse proxy
*/
$config['proxy_ips'] = '';