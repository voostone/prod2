<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Dwlist;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DwlistController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Dwlist(), function (Grid $grid) {
            $grid->model()->orderBy('tab')->orderBy('colnm')->orderBy('parent_id')->orderBy('order');
            $grid->column('id')->sortable();
            $grid->column('tab');
            $grid->column('colnm');
            $grid->column('title');
//             $grid->column('order');
            $grid->column('order')->orderable();
            $grid->column('parent_id');
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
        return Show::make($id, new Dwlist(), function (Show $show) {
            $show->field('id');
            $show->field('tab');
            $show->field('colnm');
            $show->field('title');
            $show->field('order');
            $show->field('parent_id');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }
    
    public function fieldid(Request $request)
    {
        $fieldid = $request->get('q');
//         $schema = config("");
        
        $res = DB::select("SELECT column_name as id, column_name as text FROM information_schema.columns WHERE table_schema = 'prod' and table_name = '" .$fieldid . "' ");
        
        return $res;
        
        //         return Dropdownlist::fieldid()->where('tab','account')->where('field', $fieldid)->get(['id', DB::raw('listvalue as text')]);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Dwlist(), function (Form $form) {
//             $form->display('id');
            
//             $res = DB::select("SELECT distinct table_name as text, table_name as id FROM information_schema.columns WHERE table_schema = 'prod' and table_name not like 'admin%' ");
//             $form->select('tab', trans('dwlist.fields.tab'))->options($res)
//             ->load('fieldid', 'colnm');
//             $form->select('colnm');
            
            $form->select('tab', trans('dwlist.fields.tab'))->options(function() {
//                 $res = DB::select("SELECT distinct table_name as id, table_name as text FROM information_schema.columns WHERE table_schema = 'prod' and table_name not like 'admin%' ");
// //                 dd($res);
//                 return $res->toArray();
//                 return ChinaArea::city()->where('parent_id', $provinceId)->get(['id', DB::raw('name as text')]);
                
//                 $dropDownList = Dwlist::class;
//                 return $dropDownList::where('colnm','itype')->where('tab','prodinh')->orderBy('order')->pluck('title','title');

                
            });
            
//             $form->text('tab');

            $form->text('colnm');
            $form->text('title');
//             $form->text('order');
            $form->text('parent_id');
            
            
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
