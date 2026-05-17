<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth Routes
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';

// Public Routes
$route['berita'] = 'landing/berita';
$route['berita/(:any)'] = 'landing/berita_detail/$1';
$route['pengumuman'] = 'landing/pengumuman';
$route['galeri'] = 'landing/galeri';
$route['faq'] = 'landing/faq';
$route['kontak'] = 'landing/kontak';
$route['tentang'] = 'landing/tentang';
$route['visi-misi'] = 'landing/visi_misi';
$route['struktur'] = 'landing/struktur';

// Admin Routes
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/warga'] = 'admin/warga';
$route['admin/pengaduan'] = 'admin/pengaduan';
$route['admin/surat'] = 'admin/surat';

// Warga Routes
$route['dashboard'] = 'warga/dashboard';
$route['pengajuan-surat'] = 'warga/surat';
$route['pengaduan'] = 'warga/pengaduan';
$route['warga/profil'] = 'warga/profil';
$route['warga/password'] = 'warga/profil/ganti_password';
