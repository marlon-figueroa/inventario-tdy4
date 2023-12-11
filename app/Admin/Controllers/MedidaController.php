<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Medida;

class MedidaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Medida';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Medida());

        $grid->column('id', __('Id'));
        $grid->column('nombre', __('Nombre'));
        $grid->column('simbolo', __('Simbolo'));
        $grid->column('num_piezas', __('Numero de piezas'));

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
        $show = new Show(Medida::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nombre', __('Nombre'));
        $show->field('simbolo', __('Simbolo'));
        $show->field('num_piezas', __('Numero de piezas'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Medida());

        $form->text('nombre', __('Nombre'));
        $form->text('simbolo', __('Simbolo'));
        $form->text('num_piezas', __('Numero de piezas'));

        return $form;
    }
}
