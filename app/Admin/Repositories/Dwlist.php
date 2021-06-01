<?php

namespace App\Admin\Repositories;

use App\Models\Dwlist as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Dwlist extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
