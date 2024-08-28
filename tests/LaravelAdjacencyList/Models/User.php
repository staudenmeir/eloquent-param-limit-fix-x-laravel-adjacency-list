<?php

namespace Staudenmeir\LaravelAdjacencyList\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent\HasParamLimitFixAndRecursiveRelationships;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\BelongsToManyOfDescendants;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\HasManyOfDescendants;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\MorphToManyOfDescendants;

class User extends Model
{
    use HasParamLimitFixAndRecursiveRelationships {
        getCustomPaths as parentGetCustomPaths;
    }
    use SoftDeletes;

    public function getCustomPaths(): array
    {
        return array_merge(
            $this->parentGetCustomPaths(),
            [
                [
                    'name' => 'slug_path',
                    'column' => 'slug',
                    'separator' => '/',
                ],
            ]
        );
    }

    public function posts(): HasManyOfDescendants
    {
        return $this->hasManyOfDescendants(Post::class);
    }

    public function postsAndSelf(): HasManyOfDescendants
    {
        return $this->hasManyOfDescendantsAndSelf(Post::class);
    }

    public function roles(): BelongsToManyOfDescendants
    {
        return $this->belongsToManyOfDescendants(Role::class);
    }

    public function rolesAndSelf(): BelongsToManyOfDescendants
    {
        return $this->belongsToManyOfDescendantsAndSelf(Role::class);
    }

    public function tags(): MorphToManyOfDescendants
    {
        return $this->morphToManyOfDescendants(Tag::class, 'taggable');
    }

    public function tagsAndSelf(): MorphToManyOfDescendants
    {
        return $this->morphToManyOfDescendantsAndSelf(Tag::class, 'taggable');
    }

    public function videos(): MorphToManyOfDescendants
    {
        return $this->morphedByManyOfDescendants(Video::class, 'authorable');
    }

    public function videosAndSelf(): MorphToManyOfDescendants
    {
        return $this->morphedByManyOfDescendantsAndSelf(Video::class, 'authorable');
    }
}
