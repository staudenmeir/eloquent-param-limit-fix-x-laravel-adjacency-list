<?php

namespace Staudenmeir\LaravelAdjacencyList\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent\HasParamLimitFixAndRecursiveRelationships;

class User extends Model
{
    use HasParamLimitFixAndRecursiveRelationships {
        getCustomPaths as parentGetCustomPaths;
    }
    use SoftDeletes;

    public function getCustomPaths()
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

    public function posts()
    {
        return $this->hasManyOfDescendants(Post::class);
    }

    public function postsAndSelf()
    {
        return $this->hasManyOfDescendantsAndSelf(Post::class);
    }

    public function roles()
    {
        return $this->belongsToManyOfDescendants(Role::class);
    }

    public function rolesAndSelf()
    {
        return $this->belongsToManyOfDescendantsAndSelf(Role::class);
    }

    public function tags()
    {
        return $this->morphToManyOfDescendants(Tag::class, 'taggable');
    }

    public function tagsAndSelf()
    {
        return $this->morphToManyOfDescendantsAndSelf(Tag::class, 'taggable');
    }

    public function videos()
    {
        return $this->morphedByManyOfDescendants(Video::class, 'authorable');
    }

    public function videosAndSelf()
    {
        return $this->morphedByManyOfDescendantsAndSelf(Video::class, 'authorable');
    }
}
