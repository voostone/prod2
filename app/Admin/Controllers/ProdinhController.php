<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\ProdTable;
use App\Admin\Repositories\Prodinh;
use App\Models\Dwlist;
use App\Models\Prod;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProdinhController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Prodinh(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('jdate');
            $grid->column('itype');
            $grid->column('jman');
            
            $grid->column('prodind.prodid')->display(function () {
                $val = "";
                foreach($this->prodinds as $v) {
                    $val = $val . $v['prodid'] . "<br>";
                }
                return $val;
            });
            
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
        $show = $this->form()->edit($id);
        $show->title("明细");
        $show->disableSubmitButton();
        $show->disableFooter();
        $show->disableResetButton();
        $show->disableDeleteButton();
        $show->disableViewButton();
 
        $show->disableListButton();
        return $show;
        
//         return Show::make($id, new Prodinh(), function (Show $show) {
//             $show->field('id');
//             $show->field('jdate');
//             $show->field('itype');
//             $show->field('jman');
//             $show->field('created_at');
//             $show->field('updated_at');
//         });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $builder = Prodinh::with('prodinds');
        
//         return Form::make(new Prodinh(), function (Form $form) {
        return Form::make($builder, function (Form $form) {
//             $form->display('id');
            $form->date('jdate', 'date');
            
            
            $form->select('itype', trans('prodinh.fields.itype'))->options(function() {
                $dropDownList = Dwlist::class;
                return $dropDownList::where('colnm','itype')->where('tab','prodinh')->where('parent_id','>', 0)->orderBy('order')->pluck('title','title');
            });
            
            $form->text('jman');
            
            $form->hasMany('prodinds', function(Form\NestedForm $form){
                
                $form->selectTable('prodid','产品')
                ->title('选择产品')
                ->dialogWidth('65%') // 弹窗宽度，默认 800px
                ->from(ProdTable::make(['id' => $form->getKey()]))
                ->model(Prod::class, 'id', 'prodname'); // 设置编辑数据显示
    
                $form->select('tstock', trans('prodind.fields.tstock'))->options(function() {
                    $dropDownList = Dwlist::class;
                    return $dropDownList::where('colnm','tstock')->where('tab','prodinh')->where('parent_id','>', 0)->orderBy('order')->pluck('title','title');
                });

//                 $form->text('tstock');

                $form->text('price',trans('prodind.fields.price'));
                $form->text('qty',trans('prodind.fields.qty'));
                
                
            })->useTable();
                    
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
