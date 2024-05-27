<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\EstadoEventoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\TipoAlmacenController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CajasController;
use App\Http\Controllers\ComprobantesController;
use App\Http\Controllers\DiagnosticoMascotaController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\AlmacenesController;
use App\Models\ExamenAuxiliarMascota;

 Route::get('/', function () {
     return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//########################
Route::resource('/proveedor', ProveedorController::class);

Route::resource('/producto', ProductoController::class);
Route::get('/producto/{modulo}/auditoria', [ProductoController::class, 'auditoria']);
Route::resource('/servicio', ServicioController::class);
Route::get('/servicio/{modulo}/auditoria', [ServicioController::class, 'auditoria']);
Route::resource('/cliente', ClienteController::class);

Route::resource('/mascota', MascotaController::class)->middleware('auth');
Route::get('/mascota/{id}/historial-clinico', [MascotaController::class, 'historialClinico']);
Route::get('/mascota/{id}/galeria', [MascotaController::class, 'galeria']);
Route::get('/mascota/{id}/historial-compra', [MascotaController::class, 'historialCompra']);


//Route::resource('/evento', EventoController::class);
Route::get('/evento', [EventoController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/evento/list', [EventoController::class, 'list'])->middleware(['auth', 'verified']);


Route::resource('/formaPago', FormaPagoController::class);
Route::resource('/linea', LineaController::class);
Route::resource('/categoria', CategoriaController::class);
Route::resource('/subCategoria', SubCategoriaController::class);
Route::resource('/presentacion', PresentacionController::class);
Route::resource('/unidadMedida', UnidadMedidaController::class);
Route::resource('/especie', EspecieController::class);
Route::resource('/raza', RazaController::class);
Route::resource('/tipoEvento', TipoEventoController::class);
Route::resource('/estadoEvento', EstadoEventoController::class);
Route::resource('/notificacion', NotificacionController::class);
Route::resource('/tipoAlmacen', TipoAlmacenController::class);
Route::resource('/ventas', VentasController::class);
Route::resource('/cajas', CajasController::class);
Route::resource('/comprobantes', ComprobantesController::class);
Route::resource('/almacenes', AlmacenesController::class);

Route::post('/comprobantes/agregar-pago', [ComprobantesController::class, 'ajax'])->name('comprobantes.ajax')->middleware('auth', 'verified');


Route::get('/getProvincias/{Depto}',[ClienteController::class,'getProvincias'])->middleware(['auth', 'verified']);
Route::get('/getDistritos/{Prov}',[ClienteController::class,'getDistritos'])->middleware(['auth', 'verified']);
Route::get('/getCategorias/{Linea}',[ServicioController::class,'getCategorias'])->middleware(['auth', 'verified']);
Route::get('/getSubCategorias/{Categ}',[ServicioController::class,'getSubCategorias'])->middleware(['auth', 'verified']);
Route::get('/getRazas/{Especie}',[MascotaController::class,'getRazas'])->middleware(['auth', 'verified']);
Route::get('/getMascotas/{Cliente}',[MascotaController::class,'getMascotas'])->middleware(['auth', 'verified']);
Route::get('/clienteGraf',[ClienteController::class,'getGrafico'])->middleware(['auth', 'verified']);
Route::get('/mascotaGraf',[MascotaController::class,'getGrafico'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
