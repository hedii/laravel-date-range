<?php

namespace Hedii\LaravelDateRange;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait DateRange
{
    public function scopeCurrentMinute(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->second(0),
            Carbon::now(),
        ]);
    }

    public function scopeLastMinute(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subMinute()->second(0),
            Carbon::now()->second(0),
        ]);
    }

    public function scopeCurrentHour(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->minute(0)->second(0),
            Carbon::now(),
        ]);
    }

    public function scopeLastHour(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subHour()->minute(0)->second(0),
            Carbon::now()->minute(0)->second(0),
        ]);
    }

    public function scopeCurrentDay(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->startOfDay(),
            Carbon::now(),
        ]);
    }

    public function scopeLastDay(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subDay()->startOfDay(),
            Carbon::now()->startOfDay(),
        ]);
    }

    public function scopeCurrentWeek(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->startOfWeek(),
            Carbon::now(),
        ]);
    }

    public function scopeLastWeek(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek(),
        ]);
    }

    public function scopeCurrentMonth(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->startOfMonth(),
            Carbon::now(),
        ]);
    }

    public function scopeLastMonth(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth(),
        ]);
    }

    public function scopeCurrentYear(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->startOfYear(),
            Carbon::now(),
        ]);
    }

    public function scopeLastYear(Builder $query, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subYear()->startOfYear(),
            Carbon::now()->subYear()->endOfYear(),
        ]);
    }

    /**
     * Scope a query to only include the last x seconds entries.
     */
    public function scopeLastSeconds(Builder $query, int $countSeconds, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subSeconds($countSeconds),
            Carbon::now(),
        ]);
    }

    /**
     * Scope a query to only include the last x minutes entries.
     */
    public function scopeLastMinutes(Builder $query, int $countMinutes, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subMinutes($countMinutes)->second(0),
            Carbon::now(),
        ]);
    }

    /**
     * Scope a query to only include the last x hours entries.
     */
    public function scopeLastHours(Builder $query, int $countHours, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subHours($countHours)->minute(0),
            Carbon::now(),
        ]);
    }

    /**
     * Scope a query to only include the last x days entries.
     */
    public function scopeLastDays(Builder $query, int $countDays, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subDays($countDays)->startOfDay(),
            Carbon::now(),
        ]);
    }

    /**
     * Scope a query to only include the last x weeks entries.
     */
    public function scopeLastWeeks(Builder $query, int $countWeeks, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subWeeks($countWeeks)->startOfWeek(),
            Carbon::now(),
        ]);
    }

    /**
     * Scope a query to only include the last x months entries.
     */
    public function scopeLastMonths(Builder $query, int $countMonths, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subMonths($countMonths)->startOfMonth(),
            Carbon::now(),
        ]);
    }

    /**
     * Scope a query to only include the last x years entries.
     */
    public function scopeLastYears(Builder $query, int $countYears, string $fieldName = 'created_at'): Builder
    {
        return $query->whereBetween($fieldName, [
            Carbon::now()->subYears($countYears)->startOfYear(),
            Carbon::now(),
        ]);
    }
}
