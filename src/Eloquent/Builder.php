<?php

namespace Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent;

use Illuminate\Database\Eloquent\Builder as Base;
use Staudenmeir\EloquentParamLimitFix\Traits\BuildsParamLimitFixQueries;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Traits\BuildsAdjacencyListQueries;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 *
 * @extends \Illuminate\Database\Eloquent\Builder<TModel>
 */
class Builder extends Base
{
    use BuildsAdjacencyListQueries;
    use BuildsParamLimitFixQueries;
}
