<?php

namespace Hedii\LaravelDateRange\Tests;

use Carbon\Carbon;

class DateRangeTest extends TestCase
{
    public function testCurrentMinute(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()]);

        $result = TestModel::currentMinute()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastMinute(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subSeconds(61)]);

        $result = TestModel::lastMinute()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testCurrentHour(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()]);

        $result = TestModel::currentHour()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastHour(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->minute(0)->subMinutes(3)]);

        $result = TestModel::lastHour()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentDay(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);

        $result = TestModel::currentDay()->get();

        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastDay(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::yesterday()]);

        $result = TestModel::lastDay()->get();

        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentWeek(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);

        $result = TestModel::currentWeek()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastWeek(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subWeek()]);

        $result = TestModel::lastWeek()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentMonth(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);

        $result = TestModel::currentMonth()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastMonth(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMonth()]);

        $result = TestModel::lastMonth()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentYear(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);

        $result = TestModel::currentYear()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastYear(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subYear()]);

        $result = TestModel::lastYear()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastSeconds(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subSeconds(36)]);

        $result = TestModel::lastSeconds(40)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastMinutes(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMinutes(2)]);

        $result = TestModel::lastMinutes(4)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastHours(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMinutes(30)]);

        $result = TestModel::lastHours(4)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastDays(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subDays(4)]);

        $result = TestModel::lastDays(4)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastWeeks(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subDays(1)]);

        $result = TestModel::lastWeeks(2)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastMonths(): void
    {
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMonths(1)]);

        $result = TestModel::lastMonths(2)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastYears(): void
    {
        $model3 = TestModel::create(['created_at' => Carbon::now()->startOfYear()->subDays(70)]);

        $result = TestModel::lastYears(2)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model3->id, $result->first()->id);
    }
}
