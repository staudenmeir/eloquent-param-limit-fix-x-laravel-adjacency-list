<?php

namespace Staudenmeir\EloquentParamLimitFix\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent\HasParamLimitFixAndRecursiveRelationships;

class User extends Model
{
    use HasParamLimitFixAndRecursiveRelationships;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
