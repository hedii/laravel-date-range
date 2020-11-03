<?php

namespace Hedii\LaravelDateRange\Tests;

use Hedii\LaravelDateRange\DateRange;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use DateRange;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'test_models';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
