<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Prod extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'prod';

    public function prodind()
    {
        return $this->hasOne(Prodind::class, 'prodid');
    }

}
