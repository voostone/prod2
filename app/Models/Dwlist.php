<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Dwlist extends Model implements Sortable
{
	use HasDateTimeFormatter;
    use SoftDeletes;
    use SortableTrait;
    
//     use ModelTree;
//     // 父级ID字段名称，默认值为 parent_id
//     protected $parentColumn = 'pid';
    
//     // 排序字段名称，默认值为 order
//     protected $orderColumn = 'sort';
    
//     // 标题字段名称，默认值为 title
//     protected $titleColumn = 'name';
     

    protected $table = 'dwlist';
    
    protected $sortable = [
        // 设置排序字段名称
        'order_column_name' => 'order',
        // 是否在创建时自动排序，此参数建议设置为true
        'sort_when_creating' => true,
    ];
    
}
