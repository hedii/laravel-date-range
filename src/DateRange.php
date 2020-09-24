<?php

namespace Hedii\LaravelDateRange;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait DateRange
{
    /**
     * Scope a query to only include the current minute entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentMinute(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->second(0),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last minute entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMinute(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subMinute()->second(0),
            Carbon::now()->second(0)
        ]);
    }

    /**
     * Scope a query to only include the current hour entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentHour(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->minute(0)->second(0),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last hour entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastHour(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subHour()->minute(0)->second(0),
            Carbon::now()->minute(0)->second(0)
        ]);
    }

    /**
     * Scope a query to only include the current day entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentDay(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->startOfDay(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last day entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastDay(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subDay()->startOfDay(),
            Carbon::now()->startOfDay()
        ]);
    }

    /**
     * Scope a query to only include the current week entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentWeek(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->startOfWeek(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last week entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeek(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ]);
    }

    /**
     * Scope a query to only include the current month entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentMonth(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->startOfMonth(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last month entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMonth(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ]);
    }

    /**
     * Scope a query to only include the current year entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentYear(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->startOfYear(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last year entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastYear(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subYear()->startOfYear(),
            Carbon::now()->subYear()->endOfYear()
        ]);
    }

    /**
     * Scope a query to only include the last x seconds entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $countSeconds
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastSeconds(Builder $query, int $countSeconds, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subSeconds($countSeconds),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x minutes entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $countMinutes
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMinutes(Builder $query, int $countMinutes, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subMinutes($countMinutes)->second(0),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x hours entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $countHours
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastHours(Builder $query, int $countHours, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subHours($countHours)->minute(0),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x days entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $countDays
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastDays(Builder $query, int $countDays, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subDays($countDays)->startOfDay(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x weeks entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $countWeeks
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeeks(Builder $query, int $countWeeks, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subWeeks($countWeeks)->startOfWeek(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x months entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $countMonths
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMonths(Builder $query, int $countMonths, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subMonths($countMonths)->startOfMonth(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x years entries.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $countYears
     * @param string $fieldName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastYears(Builder $query, int $countYears, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subYears($countYears)->startOfYear(),
            Carbon::now()
        ]);
    }
}
