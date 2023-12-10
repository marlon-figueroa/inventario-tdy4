<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Cliente;

class ClienteController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cliente';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cliente());

        $grid->column('id', __('Id'));
        $grid->column('dui', __('Dui'));
        $grid->column('nombres', __('Nombres'));
        $grid->column('apellidos', __('Apellidos'));
        $grid->column('ciudad', __('Ciudad'));
        $grid->column('direccion', __('Direccion'));
        $grid->column('telefono', __('Telefono'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Cliente::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('dui', __('Dui'));
        $show->field('nombres', __('Nombres'));
        $show->field('apellidos', __('Apellidos'));
        $show->field('ciudad', __('Ciudad'));
        $show->field('direccion', __('Direccion'));
        $show->field('telefono', __('Telefono'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Cliente());

        $form->text('dui', __('Dui'));
        $form->text('nombres', __('Nombres'));
        $form->text('apellidos', __('Apellidos'));
        $form->text('ciudad', __('Ciudad'));
        $form->textarea('direccion', __('Direccion'));
        $form->text('telefono', __('Telefono'));

        return $form;
    }
}
