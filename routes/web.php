<?php

use App\Models\mspebimbingpenguji;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengujiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\mspenggunaController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\DashboardDAAAController;
use App\Http\Controllers\DashboardPengujiController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardPebimbingController;
use App\Http\Controllers\mskategoripenilaianController;
use App\Http\Controllers\DashboardKepalaProdiController;
use App\Http\Controllers\TrPendaftaranSidangTaController;
use App\Http\Controllers\DashboardKoordinatorTAController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
});
//Mahasiswa
Route::get('/DashboardMahasiswa', [DashboardMahasiswaController::class, 'index'])->name('DashboardMahasiswa.index');
Route::get('/DashboardPesyaratan_Pendaftaran', [DashboardMahasiswaController::class, 'Pesyaratan_Pendaftaran'])->name('DashboardPesyaratan_Pendaftaran.Pesyaratan_Pendaftaran');
Route::get('/DashboardPendaftaran_Sidang', [DashboardMahasiswaController::class, 'Pendaftaran_Sidang'])->name('DashboardPendaftaran_Sidang.Pendaftaran_Sidang');
Route::get('/DashboardHasil_Sidang', [DashboardMahasiswaController::class, 'Hasil_sidang'])->name('DashboardHasil_Sidang.Hasil_sidang');
//DAA
Route::get('/DashboardDAAA', [DashboardDAAAController::class, 'index'])->name('DashboardDAAA.index');
Route::get('/DashboardUndangan', [DashboardDAAAController::class, 'Undangan'])->name('DashboardUndangan.Undangan');
Route::post('/DashboardUpload', [DashboardDAAAController::class, 'UndanganStore'])->name('DashboardUndangan.Upload');
//Pebimbing
Route::get('/DashboardPebimbing', [DashboardPebimbingController::class, 'index'])->name('DashboardPebimbing.index');
Route::get('/Dashboardhasilsidang', [DashboardPebimbingController::class, 'hasilSidang'])->name('Dashboardhasilsidang.hasilSidang');
Route::get('/DashboardSidang_BAP_SIdang', [DashboardPebimbingController::class, 'Sidang_bap_ta'])->name('DashboardSidang_BAP_SIdang.Sidang_bap_ta');
Route::get('/DashboardUndangansidang', [DashboardPebimbingController::class, 'Undangan_sidang'])->name('DashboardUndangansidang.Undangan_sidang');
//Pengunji
Route::get('/DashboardPenguji', [DashboardPengujiController::class, 'index'])->name('DashboardPenguji.index');
Route::get('/DashboardhasilSidang', [DashboardPengujiController::class, 'hasil_sidang'])->name('DashboardhasilSidang.hasil_sidang');
Route::get('/DashboardhBAPsidangTA', [DashboardPengujiController::class, 'BAP_sidang_TA'])->name('DashboardhBAPsidangTA.BAP_sidang_TA');
Route::get('/DashboardhForm_sidang_ta', [DashboardPengujiController::class, 'Form_Penilaian'])->name('DashboardhForm_sidang_ta.Form_Penilaian');
Route::get('/DashboardhPenilaian_sidang_ta', [DashboardPengujiController::class, 'Penilaian_Sidang_TA'])->name('DashboardhPenilaian_sidang_ta.Penilaian_Sidang_TA');
//Kepala Prodi
Route::get('/DashboardKepalaProdi', [DashboardKepalaProdiController::class, 'index'])->name('DashboardKepalaProdi.index');
Route::get('/DashboardHasil_sidang_Mahasiswa', [DashboardKepalaProdiController::class, 'Hasilsidang'])->name('DashboardHasil_sidang_Mahasiswa.Hasilsidang');
Route::get('/DashboardGrafik_data', [DashboardKepalaProdiController::class, 'grafik_data'])->name('DashboardGrafik_data.grafik_data');

//Koordinator TA
Route::get('/DashboardKoordinatorTA', [DashboardKoordinatorTAController::class, 'index'])->name('DashboardKoordinatorTA.index');
Route::get('/DashboardKoordinatorTA/Pembimbing', [DashboardKoordinatorTAController::class, 'Pembimbing'])->name('DashboardKoordinatorTA.Pembimbing');
Route::get('/DashboardKoordinatorTA/HasilSidang', [DashboardKoordinatorTAController::class, 'HasilSidang'])->name('DashboardKoordinatorTA.HasilSidang');
Route::get('/DashboardKoordinatorTA/PenilaianSidang', [DashboardKoordinatorTAController::class, 'PenilaianSidang'])->name('DashboardKoordinatorTA.PenilaianSidang');



Route::get('/kategori_penilaian', [mskategoripenilaianController::class, 'index'])->name('kategori_penilaian');
Route::get('/Create', [mskategoripenilaianController::class, 'Create'])->name('Create'); 
Route::post('/insertdata', [mskategoripenilaianController::class, 'insertdata'])->name('insertdata');
Route::get('/Edit/{mkp_id}', [mskategoripenilaianController::class, 'Edit'])->name('Edit'); 
Route::post('/updatedata/{mkp_id}', [mskategoripenilaianController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{mkp_id}', [mskategoripenilaianController::class, 'delete'])->name('delete');

Route::get('/kategori_penilaian', [mskategoripenilaianController::class, 'index'])->name('kategori_penilaian');
Route::get('/kategori_penilaian/Create', [mskategoripenilaianController::class, 'Create'])->name('kategori_penilaian.Create'); 
Route::post('/kategori_penilaian', [mskategoripenilaianController::class, 'insertdata'])->name('kategori_penilaian.insertdata');
Route::get('/kategori_penilaian/Edit/{mkp_id}', [mskategoripenilaianController::class, 'Edit'])->name('kategori_penilaian.Edit'); 
Route::post('/kategori_penilaian/updatedata/{mkp_id}', [mskategoripenilaianController::class, 'updatedata'])->name('kategori_penilaian.updatedata');
Route::get('/kategori_penilaian/delete/{mkp_id}', [mskategoripenilaianController::class, 'delete'])->name('kategori_penilaiandelete');

//Penguji
Route::get('/Penguji', [PengujiController::class, 'index'])->name('Penguji');
Route::get('/Penguji/Create', [PengujiController::class, 'Create'])->name('Penguji.Create'); // Fixed the route name
Route::post('/Penguji/Insert', [PengujiController::class, 'Insert'])->name('Penguji.Insert');
Route::get('/Penguji/Edit/{pbn_id}', [PengujiController::class, 'Edit'])->name('Penguji.Edit'); // Fixed the double slash
Route::post('/Penguji/Update/{pbn_id}', [PengujiController::class, 'updateDataPebimbingPengguna'])->name('Penguji.Update');
Route::post('/Penguji/Delete/{pbn_id}', [PengujiController::class, 'delete'])->name('Penguji.Delete');

//Pembimbing
Route::get('/Pembimbing', [PembimbingController::class, 'index'])->name('Pembimbing');
Route::get('/Pembimbing/Create', [PembimbingController::class, 'Create'])->name('Pembimbing.Create'); // Fixed the route name
Route::post('/Pembimbing/Insert', [PembimbingController::class, 'Insert'])->name('Pembimbing.Insert');
Route::get('/Pembimbing/Edit/{pbn_id}', [PembimbingController::class, 'Edit'])->name('Pembimbing.Edit'); // Fixed the double slash
Route::post('/Pembimbing/Update/{pbn_id}', [PembimbingController::class, 'updateDataPebimbingPengguna'])->name('Pembimbing.Update');
Route::post('/Pembimbing/Delete/{pbn_id}', [PembimbingController::class, 'Delete'])->name('Pembimbing.Delete');
Route::get('/', [mspenggunaController::class, 'login'])->name('login'); 
Route::get('/Akun/Logout',[mspenggunaController::class,'logout'])->name('actioLogout');
Route::post('/loginproses', [mspenggunaController::class, 'loginproses'])->name('loginproses'); 
Route::get('/register', [mspenggunaController::class, 'register'])->name('register'); 
Route::post('/registeruser', [mspenggunaController::class, 'registeruser'])->name('registeruser');
Route::get('/Indexregister', [mspenggunaController::class, 'Index_register'])->name('Indexregister.Index_register'); 
Route::get('/delete_Pengguna/{png_username}', [mspenggunaController::class, 'delete_pengguna'])->name('delete_Pengguna.delete_pengguna');


Route::get('/PenilaianSidang', [TrPendaftaranSidangTaController::class, 'penilaian'])->name('Penilaian.sidang');
Route::post('/PenilaianSidang/{id}/save', [TrPendaftaranSidangTaController::class, 'penilaian_save'])->name('Penilaian.save');
Route::get('/PenilaianSidang/{id}/nilai', [TrPendaftaranSidangTaController::class, 'nilai'])->name('Penilaian.nilai');



Route::get('/Sidang', [TrPendaftaranSidangTaController::class, 'index'])->name('Sidang');
Route::get('/Sidang/Daftar', [TrPendaftaranSidangTaController::class, 'Create'])->name('Sidang.Create'); // Fixed the route name
Route::post('/Sidang/Daftar', [TrPendaftaranSidangTaController::class, 'Daftar'])->name('Sidang.Insert');
Route::get('/Sidang/Complete/{id}', [TrPendaftaranSidangTaController::class, 'complete'])->name('Sidang.complete'); // Fixed the double slash
Route::post('/Sidang/Complete/{id}', [TrPendaftaranSidangTaController::class, 'completeStore'])->name('Sidang.complete.store'); // Fixed the double slash
Route::post('/Sidang/Update/{pbn_id}', [TrPendaftaranSidangTaController::class, 'updateDataPebimbingPengguna'])->name('Sidang.Update');
Route::post('/Sidang/Delete/{pbn_id}', [TrPendaftaranSidangTaController::class, 'Delete'])->name('Sidang.Delete');
Route::get('/Sidang/{id}/detail', [TrPendaftaranSidangTaController::class, 'detail'])->name('Sidang.detail');



Route::get('/SidangKoor', [TrPendaftaranSidangTaController::class, 'indexKoor'])->name('SidangKoor');
Route::get('/SidangKoor/{id}', [TrPendaftaranSidangTaController::class, 'Setujui'])->name('SidangKoor.Setujui');
Route::get('/SidangKoor/Setujui/{id}', [TrPendaftaranSidangTaController::class, 'disetujui'])->name('setujui');
Route::get('/download/{file}', [TrPendaftaranSidangTaController::class, 'downloadTemplate'])->name('download');
Route::get('/downloadAll/{id}', [TrPendaftaranSidangTaController::class, 'downloadAll'])->name('download.all');
Route::get('/SidangKoor/Verifikasi/{id}', [TrPendaftaranSidangTaController::class, 'verifikasi'])->name('Sidang.verifikasi'); 
Route::post('/SidangKoor/Verifikasi/{id}', [TrPendaftaranSidangTaController::class, 'verifikasiStore'])->name('Sidang.verifikasi.store'); 

Route::get('/SidangKoor/{id}/detail', [TrPendaftaranSidangTaController::class, 'dinilai'])->name('SidangKoor.dinilai');
Route::get('/SidangKoor/{id}/undang', [TrPendaftaranSidangTaController::class, 'undang'])->name('SidangKoor.undang');

Route::get('/generate-pdf/{idTr}/{idUsn}', [TrPendaftaranSidangTaController::class, 'generatePdfNilai'])->name('generate.pdf'); 
Route::get('/generate-pdf-ba/{idTr}', [TrPendaftaranSidangTaController::class, 'generatePdfBap'])->name('generate.pdf.ba'); 
Route::get('/generate-pdf-undangan/{idTr}', [TrPendaftaranSidangTaController::class, 'generatePdfUndangan'])->name('generate.pdf.undangan'); 

Route::get('/undangan/{file}', [TrPendaftaranSidangTaController::class, 'downloadUndangan'])->name('download.undangan'); 

Route::get('/template/penilaian', [TrPendaftaranSidangTaController::class, 'downloadForm'])->name('download.penilaian');
