<?php

namespace Hedii\LaravelDateRange;

use Carbon\Carbon;

trait DateRange
{
    /**
     * Scope a query to only include current day entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentDay($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfDay(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include last day entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastDay($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->subDay()->startOfDay(),
            Carbon::now()->startOfDay()
        ]);
    }

    /**
     * Scope a query to only include current week entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentWeek($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include last week entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ]);
    }

    /**
     * Scope a query to only include current month entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentMonth($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include last month entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMonth($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ]);
    }

    /**
     * Scope a query to only include current year entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentYear($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include last year entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastYear($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->subYear()->startOfYear(),
            Carbon::now()->subYear()->endOfYear()
        ]);
    }

    /**
     * Scope a query to only include last x days entries.
     *
     * @param $query
     * @param int $countDays
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastDays($query, int $countDays)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->subDays($countDays)->startOfDay(),
            Carbon::now()
        ]);
    }
}