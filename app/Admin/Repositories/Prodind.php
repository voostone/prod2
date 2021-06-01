<?php

namespace App\Admin\Repositories;

use App\Models\Prodind as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Prodind extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
