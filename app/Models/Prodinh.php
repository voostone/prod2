<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Prodinh extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'prodinh';
    
    public function prodinds() {
        return $this->hasMany(Prodind::class,'inid');
    }
    
}
