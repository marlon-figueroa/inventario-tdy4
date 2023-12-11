<?php

namespace App\Admin\Controllers;

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

        $grid->column('id', __('Id'));
        $grid->column('codigo', __('Codigo'));
        $grid->column('foto', __('Foto'))->image();
        $grid->column('nombre', __('Nombre'));
        $grid->column('existencia', __('Existencia'));
        $grid->column('precio_unitario', __('Precio unitario'));
        $grid->column('margen', __('Margen'));
        $grid->column('impuesto', __('Impuesto'));
        $grid->column('clasificacion_id', __('Clasificacion id'));
        $grid->column('marca_id', __('Marca id'));
        $grid->column('presentacion_id', __('Presentacion id'));
        $grid->column('medida_id', __('Medida id'));

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

        $show->field('id', __('Id'));
        $show->field('codigo', __('Codigo'));
        $show->field('foto', __('Foto'))->image();
        $show->field('nombre', __('Nombre'));
        $show->field('existencia', __('Existencia'));
        $show->field('precio_unitario', __('Precio unitario'));
        $show->field('margen', __('Margen'));
        $show->field('impuesto', __('Impuesto'));
        $show->field('clasificacion_id', __('Clasificacion id'));
        $show->field('marca_id', __('Marca id'));
        $show->field('presentacion_id', __('Presentacion id'));
        $show->field('medida_id', __('Medida id'));

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

        $form->text('codigo', __('Codigo'));
        $form->image('foto', __('Foto'));
        $form->text('nombre', __('Nombre'));
        $form->text('existencia', __('Existencia'));
        $form->decimal('precio_unitario', __('Precio unitario'));
        $form->decimal('margen', __('Margen'));
        $form->decimal('impuesto', __('Impuesto'));
        $form->number('clasificacion_id', __('Clasificacion id'));
        $form->number('marca_id', __('Marca id'));
        $form->number('presentacion_id', __('Presentacion id'));
        $form->number('medida_id', __('Medida id'));

        return $form;
    }
}
