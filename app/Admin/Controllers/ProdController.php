<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Prod;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProdController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Prod(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('prodname');
            $grid->column('brand');
            $grid->column('type');
            $grid->column('spec');
            $grid->column('pattern');
            $grid->column('unit');
            $grid->column('priceavg');
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
        return Show::make($id, new Prod(), function (Show $show) {
            $show->field('id');
            $show->field('prodname');
            $show->field('brand');
            $show->field('type');
            $show->field('spec');
            $show->field('pattern');
            $show->field('unit');
            $show->field('priceavg');
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
        return Form::make(new Prod(), function (Form $form) {
            $form->display('id');
            $form->text('prodname');
            $form->text('brand');
            $form->text('type');
            $form->text('spec');
            $form->text('pattern');
            $form->text('unit');
            $form->text('priceavg');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
