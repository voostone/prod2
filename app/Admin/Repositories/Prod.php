<?php

namespace App\Admin\Repositories;

use App\Models\Prod as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Prod extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
