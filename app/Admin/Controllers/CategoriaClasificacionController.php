<?php

namespace App\Admin\Controllers;

use App\Models\Categoria;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\CategoriaClasificacion;

class CategoriaClasificacionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Clasificacion de categoria';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CategoriaClasificacion());

        //$grid->column('id', __('Id'));
        $grid->column('codigo', __('Codigo'));
        $grid->column('categoria.nombre', __('Categoria'));
        $grid->column('nombre', __('Nombre'));

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
        $show = new Show(CategoriaClasificacion::findOrFail($id));

        //$show->field('id', __('Id'));
        $show->field('codigo', __('Codigo'));
        $show->field('nombre', __('Nombre'));
        $show->categoria('Categoria', function ($categoria) {
            $categoria->setResource('/admin/categorias');
            //$categoria->id();
            $categoria->nombre();
            $categoria->descripcion();
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
        $form = new Form(new CategoriaClasificacion());

        $form->text('codigo', __('Codigo'));
        $form->text('nombre', __('Nombre'));
        $form->select('categoria_id', 'Categoria')->options(Categoria::all()->pluck('nombre','id'));
        return $form;
    }
}
