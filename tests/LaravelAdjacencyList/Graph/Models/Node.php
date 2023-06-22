<?php

namespace Staudenmeir\LaravelAdjacencyList\Tests\Graph\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent\HasParamLimitFixAndGraphRelationships;

class Node extends Model
{
    use HasParamLimitFixAndGraphRelationships {
        getCustomPaths as baseGetCustomPaths;
        getPivotColumns as baseGetPivotColumns;
    }
    use SoftDeletes;

    public function getPivotTableName(): string
    {
        return 'edges';
    }

    public function getCustomPaths(): array
    {
        return array_merge(
            $this->baseGetCustomPaths(),
            [
                [
                    'name' => 'slug_path',
                    'column' => 'slug',
                    'separator' => '/',
                ],
                [
                    'name' => 'reverse_slug_path',
                    'column' => 'slug',
                    'separator' => '/',
                    'reverse' => true,
                ],
            ]
        );
    }

    public function getPivotColumns(): array
    {
        return array_merge(
            $this->baseGetPivotColumns(),
            ['label', 'weight', 'created_at']
        );
    }
}
