<?php

namespace Staudenmeir\EloquentParamLimitFix\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent\HasParamLimitFixAndRecursiveRelationships;

class User extends Model
{
    use HasParamLimitFixAndRecursiveRelationships;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
