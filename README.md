[![Build Status](https://github.com/hedii/laravel-date-range/workflows/Tests/badge.svg)](https://github.com/hedii/laravel-date-range/actions)
[![Total Downloads](https://poser.pugx.org/hedii/laravel-date-range/downloads)](//packagist.org/packages/hedii/laravel-date-range)
[![License](https://poser.pugx.org/hedii/laravel-date-range/license)](//packagist.org/packages/hedii/laravel-date-range)
[![Latest Stable Version](https://poser.pugx.org/hedii/laravel-date-range/v)](//packagist.org/packages/hedii/laravel-date-range)

# Laravel Date Range

A date range trait with local scope methods for Laravel Eloquent models

## Table of contents

- [Table of contents](#table-of-contents)
- [Installation](#installation)
- [Usage](#usage)
  - [Updating your Eloquent Models](#updating-your-eloquent-models)
  - [Available methods](#available-methods)
  - [Example](#example)
- [Testing](#testing)
- [License](#license)

## Installation

Install via [composer](https://getcomposer.org/doc/00-intro.md)
```sh
composer require hedii/laravel-date-range
```

## Usage

### Updating your Eloquent Models

Simply tell your eloquent model that it has to use the DateRange trait:

```php
<?php

namespace App;

use Hedii\LaravelDateRange\DateRange;

class MyModel extends Model
{
    use DateRange;

    /* ... */
}
```

### Available methods

By default $fieldName is set to "created_at".

| Method name    | Parameters                                | Description                                              |
| -------------- | ----------------------------------------- | -------------------------------------------------------- |
| `currentMinute` | (string) $fieldName                      | Scope a query to only include the current minute entries |
| `lastMinute`    | (string) $fieldName                      | Scope a query to only include the last minute entries    |
| `currentHour`   | (string) $fieldName                      | Scope a query to only include the current hour entries   |
| `lastHour`      | (string) $fieldName                      | Scope a query to only include the last hour entries      |
| `currentDay`    | (string) $fieldName                      | Scope a query to only include the current day entries    |
| `lastDay`       | (string) $fieldName                      | Scope a query to only include the last day entries       |
| `currentWeek`   | (string) $fieldName                      | Scope a query to only include the current week entries   |
| `lastWeek`      | (string) $fieldName                      | Scope a query to only include the last week entries      |
| `currentMonth`  | (string) $fieldName                      | Scope a query to only include the current month entries  |
| `lastMonth`     | (string) $fieldName                      | Scope a query to only include the last month entries     |
| `currentYear`   | (string) $fieldName                      | Scope a query to only include the current year entries   |
| `lastYear`      | (string) $fieldName                      | Scope a query to only include the last year entries      |
| `lastSeconds`   | (int) $countSeconds, (string) $fieldName | Scope a query to only include the last x seconds entries |
| `lastMinutes`   | (int) $countMinutes, (string) $fieldName | Scope a query to only include the last x minutes entries |
| `lastHours`     | (int) $countHours, (string) $fieldName   | Scope a query to only include the last x hours entries   |
| `lastDays`      | (int) $countDays, (string) $fieldName    | Scope a query to only include the last x days entries    |
| `lastWeeks`     | (int) $countWeeks, (string) $fieldName   | Scope a query to only include the last x weeks entries   |
| `lastMonths`    | (int) $countMonths, (string) $fieldName  | Scope a query to only include the last x months entries  |
| `lastYears`     | (int) $countYears, (string) $fieldName   | Scope a query to only include the last x years entries   |

### Example

```php
$currentDayEntries = MyModel::currentDay()->get();
$lastYearEntries = MyModel::lastYear()->get();
$entriesFromTheLastTenDays = MyModel::lastDays(10)->get();
```

## Testing

```
composer test
```

## License

hedii/laravel-date-range is released under the MIT Licence. See the bundled [LICENSE](https://github.com/hedii/laravel-date-range/blob/master/LICENSE.md) file for details.
