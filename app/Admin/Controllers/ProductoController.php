<?php

namespace App\Admin\Controllers;

use App\Models\CategoriaClasificacion;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Presentacion;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Producto;

class ProductoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Producto';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Producto());

        $grid->column('codigo', __('SKU'));
        $grid->column('foto', __('Foto'))->image();
        $grid->column('nombre', __('Nombre'));
        $grid->column('existencia', __('Existencia'));
        $grid->column('precio_unitario', __('Precio unitario'));
        $grid->column('margen', __('Margen'));
        $grid->column('impuesto', __('Impuesto'));

        $grid->column('clasificacion.nombre', __('Clasificacion'));

        $grid->column('marca.nombre', __('Marca'));

        $grid->column('presentacion.nombre', __('Presentacion'));

        $grid->column('medida.simbolo', __('Medida'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Producto::findOrFail($id));

        $show->field('codigo', __('SKU'));
        $show->field('foto', __('Foto'))->image();
        $show->field('nombre', __('Nombre'));
        $show->field('existencia', __('Existencia'));
        $show->field('precio_unitario', __('Precio unitario (USD)'));
        $show->field('margen', __('Margen'));
        $show->field('impuesto', __('Impuesto'));

        $show->clasificacion('Clasificacion', function ($clasificacion) {
            $clasificacion->setResource('/admin/clasificaciones');
            $clasificacion->nombre();
        });

        $show->marca('Marca', function ($marca) {
            $marca->setResource('/admin/marcas');
            $marca->nombre();
        });

        $show->presentacion('Presentacion', function ($presentacion) {
            $presentacion->setResource('/admin/presentaciones');
            $presentacion->nombre();
        });

        $show->medida('Medida', function ($medida) {
            $medida->setResource('/admin/medidas');
            $medida->nombre();
            $medida->simbolo();
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Producto());

        $form->text('codigo', __('SKU'));
        $form->image('foto', __('Foto'));
        $form->text('nombre', __('Nombre'));
        $form->text('existencia', __('Existencia'));
        $form->decimal('precio_unitario', __('Precio unitario'));
        $form->decimal('margen', __('Margen'));
        $form->decimal('impuesto', __('Impuesto'));

        $form->select('clasificacion_id','Clasificacion')->options(CategoriaClasificacion::all()->pluck('nombre','id'));

        $form->select('marca_id', 'Marca')->options(Marca::all()->pluck('nombre','id'));

        $form->select('presentacion_id', 'Presentacion')->options(Presentacion::all()->pluck('nombre','id'));

        $form->select('medida_id','Medida')->options(Medida::all()->pluck('nombre','id','simbolo'));

        return $form;
    }
}
