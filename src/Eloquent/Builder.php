<?php

namespace Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent;

use Staudenmeir\EloquentParamLimitFix\Traits\BuildsParamLimitFixQueries;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Builder as Base;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 *
 * @extends \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<TModel>
 */
class Builder extends Base
{
    use BuildsParamLimitFixQueries;
}
