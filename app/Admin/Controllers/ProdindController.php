<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Prodind;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProdindController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Prodind(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('inid');
            $grid->column('prodid');
            $grid->column('tstock');
            $grid->column('qty');
            $grid->column('fstock');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Prodind(), function (Show $show) {
            $show->field('id');
            $show->field('inid');
            $show->field('prodid');
            $show->field('tstock');
            $show->field('qty');
            $show->field('fstock');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Prodind(), function (Form $form) {
            $form->display('id');
            $form->text('inid');
            $form->text('prodid');
            $form->text('tstock');
            $form->text('qty');
            $form->text('fstock');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
