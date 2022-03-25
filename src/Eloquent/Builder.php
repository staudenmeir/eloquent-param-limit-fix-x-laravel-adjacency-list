<?php

namespace Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent;

use Illuminate\Database\Eloquent\Builder as Base;
use Staudenmeir\EloquentParamLimitFix\Traits\BuildsParamLimitFixQueries;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Traits\BuildsAdjacencyListQueries;

class Builder extends Base
{
    use BuildsAdjacencyListQueries;
    use BuildsParamLimitFixQueries;
}
