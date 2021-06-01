<?php

namespace App\Admin\Renderable;

use App\Models\Prod;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class ProdTable extends LazyRenderable
{
    public function grid(): Grid
    {
        return Grid::make(new Prod(), function (Grid $grid) {
            $grid->column('id', 'ID')->sortable();
            $grid->column('type');
            $grid->column('prodname');
            $grid->column('brand');
            $grid->column('spec');
            $grid->column('pattern');
            $grid->column('unit');
            $grid->column('created_at');
            $grid->column('updated_at');
            
            
            $grid->quickSearch(['id', 'prodname', 'type', 'brand', 'spec', 'pattern', 'unit']);
            
            $grid->paginate(10);
            $grid->disableActions();
            
//             $grid->filter->expand(true);
            
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('prod_name')->width(4);
                $filter->like('type')->width(4);
                $filter->like('brand')->width(4);
                $filter->like('spec')->width(4);
                $filter->like('pattern')->width(4);
                $filter->like('unit')->width(4);
            });
        });
    }
}
