<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Prodind extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'prodind';

    protected $fillable = ['prodid', 'tstock', 'qty', 'fstock', 'price'];

    public function prodinh()
    {
        return $this->belongsTo(Prodinh::class, 'inid');
    }

//    public function prod()
//    {
//        return $this->hasone(Prod::class, 'prodid');
//    }

    public function prod()
    {
        return $this->belongsTo(Prod::class, 'prodid');
    }



}
