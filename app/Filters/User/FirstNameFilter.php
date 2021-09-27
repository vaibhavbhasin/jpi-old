<?php

namespace App\Filters\User;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class FirstNameFilter extends Filter
{
    /**
     * Apply the condition to the query.
     *
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('users.firstname', 'LIKE', "%{$value}%");
    }
}
