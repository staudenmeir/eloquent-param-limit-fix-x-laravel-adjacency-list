<?php

namespace Staudenmeir\LaravelAdjacencyList\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent\HasParamLimitFixAndRecursiveRelationships;

class Category extends Model
{
    use HasParamLimitFixAndRecursiveRelationships;

    public $incrementing = false;

    protected $keyType = 'string';
}
