<?php

namespace Hedii\LaravelDateRange\Tests;

use Carbon\Carbon;

class DateRangeTest extends TestCase
{
    public function testCurrentDay()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::yesterday()]);

        $result = TestModel::currentDay()->get();

        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastDay()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::yesterday()]);

        $result = TestModel::lastDay()->get();

        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentWeek()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subWeek()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subWeeks(2)]);

        $result = TestModel::currentWeek()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastWeek()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subWeek()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subWeeks(2)]);

        $result = TestModel::lastWeek()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentMonth()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMonth()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subMonth(2)]);

        $result = TestModel::currentMonth()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastMonth()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMonth()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subMonth(2)]);

        $result = TestModel::lastMonth()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentYear()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subYear()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subYears(2)]);

        $result = TestModel::currentYear()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastYear()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subYear()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subYears(2)]);

        $result = TestModel::lastYear()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastDays()
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subDays(19)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subDays(4)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subDays(8)]);

        $result = TestModel::lastDays(4)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }
}