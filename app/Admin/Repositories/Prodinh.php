<?php

namespace App\Admin\Repositories;

use App\Models\Prodinh as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Prodinh extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
