<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/aksespintu', 'CekLogin::index');
$routes->post('/ceklogin', 'CekLogin::cek');
$routes->get('/logout', 'CekLogin::logout');
$routes->get('/enc', 'CekLogin::enc');
$routes->get('/tes', 'CekLogin::tes');

// pegawai
$routes->group('pegawai', static function ($routes) {
    $routes->get('/', 'Pegawai::index');
    $routes->post('tambah', 'Pegawai::add');
    $routes->get('detail/(:segment)', 'Pegawai::detail/$1');
    $routes->post('updatepersonal/(:segment)', 'Pegawai::update/$1');
    $routes->post('gantifoto', 'Pegawai::changefoto');
    // keluarga
    $routes->post('tambahpasangan/(:segment)', 'Pegawai::addpasangan/$1');
    $routes->post('editpasangan', 'Pegawai::editpasangan');
    $routes->post('proseditpasangan', 'Pegawai::pros_editpasangan');
    $routes->get('deletekeluarga/(:segment)', 'Pegawai::deletekeluarga/$1');
    // pendidikan
    $routes->post('tambahpendidikan/(:segment)', 'Pegawai::addpendidikan/$1');
    $routes->post('editpendidikan/', 'Pegawai::editpendidikan/');
    $routes->post('proseditpendidikan/', 'Pegawai::proseditpendidikan/');
    $routes->get('hapuspendidikan/(:segment)', 'Pegawai::deletependidikan/$1');
    $routes->get('pencarian/(:segment)', 'Pegawai::search/$1');
    $routes->post('autocomplete', 'Pegawai::pencarian');
});

$routes->get('/Goldarah', 'GolDarah::index');
$routes->group('goldarah', static function ($routes) {
    $routes->post('add/', 'GolDarah::add');
    $routes->get('delete/(:segment)', 'GolDarah::delete/$1');
    $routes->post('modaledit', 'GolDarah::modaledit');
    $routes->post('edit', 'GolDarah::edit');
});

$routes->group('Agama', static function ($routes) {
    $routes->get('/', 'Agama::index');
    $routes->post('add/', 'Agama::add');
    $routes->get('delete/(:segment)', 'Agama::delete/$1');
    $routes->post('modaledit', 'Agama::modaledit');
    $routes->post('edit', 'Agama::edit');
});

$routes->get('/TingkatDidik', 'TingkatDidik::index');
$routes->group('TingkatDidik', static function ($routes) {
    $routes->post('add/', 'TingkatDidik::add');
    $routes->get('delete/(:segment)', 'TingkatDidik::delete/$1');
    $routes->post('modaledit', 'TingkatDidik::modaledit');
    $routes->post('edit', 'TingkatDidik::edit');
});

$routes->get('/StatusKeluarga', 'StatusKeluarga::index');
$routes->group('StatusKeluarga', static function ($routes) {
    $routes->post('add/', 'StatusKeluarga::add');
    $routes->get('delete/(:segment)', 'StatusKeluarga::delete/$1');
    $routes->post('modaledit', 'StatusKeluarga::modaledit');
    $routes->post('edit', 'StatusKeluarga::edit');
});

$routes->get('/StatusPegawai', 'StatusPegawai::index');
$routes->group('StatusPegawai', static function ($routes) {
    $routes->post('add/', 'StatusPegawai::add');
    $routes->get('delete/(:segment)', 'StatusPegawai::delete/$1');
    $routes->post('modaledit', 'StatusPegawai::modaledit');
    $routes->post('edit', 'StatusPegawai::edit');
});

$routes->get('/Aktif', 'Aktif::index');
$routes->group('Aktif', static function ($routes) {
    $routes->post('add/', 'Aktif::add');
    $routes->get('delete/(:segment)', 'Aktif::delete/$1');
    $routes->post('modaledit', 'Aktif::modaledit');
    $routes->post('edit', 'Aktif::edit');
});

$routes->get('/Berkala', 'Berkala::index');
$routes->group('Berkala', static function ($routes) {
    $routes->post('add/', 'Berkala::add');
    $routes->post('modal/', 'Berkala::modal');
    $routes->get('delete/(:segment)', 'Berkala::delete/$1');
    $routes->post('modaledit', 'Berkala::modaledit');
    $routes->post('edit', 'Berkala::edit');
});

$routes->group('Arsip', static function ($routes) {
    $routes->post('add', 'Arsip::add');
    $routes->post('modal/', 'Arsip::modal');
    $routes->get('delete/(:segment)', 'Arsip::delete/$1');
    $routes->post('modaledit', 'Arsip::modaledit');
    $routes->post('edit', 'Arsip::edit');
});

$routes->group('Jabatan', static function ($routes) {
    $routes->get('/', 'Jabatan::index');
    $routes->post('add', 'Jabatan::add');
    $routes->post('modal/', 'Jabatan::modal');
    $routes->get('delete/(:segment)', 'Jabatan::delete/$1');
    $routes->post('modaledit', 'Jabatan::modaledit');
    $routes->post('edit', 'Jabatan::edit');
});

$routes->group('TrJabatan', static function ($routes) {
    $routes->get('/', 'TrJabatan::index');
    $routes->post('add', 'TrJabatan::add');
    $routes->post('modal/', 'TrJabatan::modal');
    $routes->get('delete/(:segment)', 'TrJabatan::delete/$1');
    $routes->post('modaledit', 'TrJabatan::modaledit');
    $routes->post('edit', 'TrJabatan::edit');
});

$routes->group('Keluarga', static function ($routes) {
    $routes->get('/', 'Keluarga::index');
    $routes->post('add', 'Keluarga::add');
    $routes->post('modal/', 'Keluarga::modal');
    $routes->get('delete/(:segment)', 'Keluarga::delete/$1');
    $routes->post('modaledit', 'Keluarga::modaledit');
    $routes->post('edit', 'Keluarga::edit');
});

$routes->group('Pendidikan', static function ($routes) {
    $routes->get('/', 'Pendidikan::index');
    $routes->post('add', 'Pendidikan::add');
    $routes->post('modal/', 'Pendidikan::modal');
    $routes->get('delete/(:segment)', 'Pendidikan::delete/$1');
    $routes->post('modaledit', 'Pendidikan::modaledit');
    $routes->post('edit', 'Pendidikan::edit');
    $routes->post('setpendidikanakhir', 'Pegawai::setpendidikanakhir');
});

$routes->group('Pelatihan', static function ($routes) {
    $routes->get('/', 'Pelatihan::index');
    $routes->post('add', 'Pelatihan::add');
    $routes->post('modal/', 'Pelatihan::modal');
    $routes->get('delete/(:segment)', 'Pelatihan::delete/$1');
    $routes->post('modaledit', 'Pelatihan::modaledit');
    $routes->post('edit', 'Pelatihan::edit');
});

$routes->group('Departemen', static function ($routes) {
    $routes->get('/', 'Departemen::index');
    $routes->post('add', 'Departemen::add');
    $routes->post('modal/', 'Departemen::modal');
    $routes->get('delete/(:segment)', 'Departemen::delete/$1');
    $routes->post('modaledit', 'Departemen::modaledit');
    $routes->post('edit', 'Departemen::edit');
});

$routes->group('Level', static function ($routes) {
    $routes->get('/', 'Level::index');
    $routes->post('add', 'Level::add');
    $routes->post('modal/', 'Level::modal');
    $routes->get('delete/(:segment)', 'Level::delete/$1');
    $routes->post('modaledit', 'Level::modaledit');
    $routes->post('edit', 'Level::edit');
});

$routes->get('/json', 'Home::json');

$routes->post('auth', 'AuthController::login');
$routes->group('Api', static function ($routes) {
    $routes->post('detailpegawai', 'Api\UserController::getDetail');
    $routes->post('getKeluarga', 'Api\UserController::getKeluarga');
    $routes->post('getPendidikan', 'Api\UserController::getPendidikan');
    $routes->post('getTrJabatan', 'Api\UserController::getTrJabatan');
    $routes->post('getBerkala', 'Api\UserController::getBerkala');
});
