<?php

namespace Hedii\LaravelDateRange\Tests;

use Carbon\Carbon;

class DateRangeTest extends TestCase
{
    public function testCurrentMinute(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subSeconds(61)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subHour()]);

        $result = TestModel::currentMinute()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastMinute(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subSeconds(61)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subHour()]);

        $result = TestModel::lastMinute()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testCurrentHour(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subHours(2)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subDay()]);

        $result = TestModel::currentHour()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastHour(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subHours(2)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->minute(0)->subMinutes(3)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subDay()]);

        $result = TestModel::lastHour()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentDay(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::yesterday()]);

        $result = TestModel::currentDay()->get();

        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastDay(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::yesterday()]);

        $result = TestModel::lastDay()->get();

        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentWeek(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subWeek()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subWeeks(2)]);

        $result = TestModel::currentWeek()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastWeek(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subWeek()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subWeeks(2)]);

        $result = TestModel::lastWeek()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentMonth(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMonth()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subMonth(2)]);

        $result = TestModel::currentMonth()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastMonth(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMonth()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subMonth(2)]);

        $result = TestModel::lastMonth()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testCurrentYear(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subYear()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subYears(2)]);

        $result = TestModel::currentYear()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model1->id, $result->first()->id);
    }

    public function testLastYear(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subYear()]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subYears(2)]);

        $result = TestModel::lastYear()->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastSeconds(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subMinutes(6)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subSeconds(36)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subSeconds(78)]);

        $result = TestModel::lastSeconds(40)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastMinutes(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subMinutes(6)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMinutes(2)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subDay()]);

        $result = TestModel::lastMinutes(4)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastHours(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subHours(6)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMinutes(30)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subDay()]);

        $result = TestModel::lastHours(4)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastDays(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subDays(19)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subDays(4)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->subDays(8)]);

        $result = TestModel::lastDays(4)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastWeeks(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subWeeks(3)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subDays(1)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->startOfWeek()->subDays(15)]);

        $result = TestModel::lastWeeks(2)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastMonths(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subMonths(3)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMonths(1)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->startOfMonth()->subDays(70)]);

        $result = TestModel::lastMonths(2)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model2->id, $result->first()->id);
    }

    public function testLastYears(): void
    {
        $model1 = TestModel::create(['created_at' => Carbon::now()->subYears(3)]);
        $model2 = TestModel::create(['created_at' => Carbon::now()->subMonths(100)]);
        $model3 = TestModel::create(['created_at' => Carbon::now()->startOfYear()->subDays(70)]);

        $result = TestModel::lastYears(2)->get();

        $this->assertEquals(1, $result->count());
        $this->assertEquals($model3->id, $result->first()->id);
    }
}
