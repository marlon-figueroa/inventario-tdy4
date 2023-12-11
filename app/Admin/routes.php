<?php

use App\Admin\Controllers\CategoriaClasificacionController;
use App\Admin\Controllers\CategoriaController;
use App\Admin\Controllers\ClienteController;
use App\Admin\Controllers\MarcaController;
use App\Admin\Controllers\MedidaController;
use App\Admin\Controllers\PresentacionController;
use App\Admin\Controllers\ProductoController;
use App\Admin\Controllers\TestTableController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('test-tables', TestTableController::class);
    $router->resource('categorias', CategoriaController::class);
    $router->resource('categoria-clasificacions', CategoriaClasificacionController::class);
    $router->resource('clientes', ClienteController::class);

    $router->resource('marcas', MarcaController::class);
    $router->resource('presentaciones', PresentacionController::class);
    $router->resource('medidas', MedidaController::class);

    $router->resource('productos', ProductoController::class);

});
