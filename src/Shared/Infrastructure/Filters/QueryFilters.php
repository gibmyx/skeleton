<?php


declare(strict_types=1);


namespace Skeleton\Shared\Infrastructure\Filters;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class QueryFilters
{

    protected $builder;

    function apply(Builder $builder, $clause) : Builder
    {
        $this->builder = $builder;

        foreach (array_filter($clause) as $key => $value) {
            if (method_exists($this, $key)) {

                call_user_func_array([$this, $key], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    /**
     * @param $value
     */
    protected function get_value($value) : array
    {
        return is_array($value) ? $value : [$value];
    }

    /**
     * @param $value
     */
    protected function get_date_value($value) : Carbon
    {
        return Carbon::createFromFormat('d/m/Y', $value);
    }
}
