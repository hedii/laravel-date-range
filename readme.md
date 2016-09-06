[![Build Status](https://travis-ci.org/hedii/laravel-date-range.svg?branch=master)](https://travis-ci.org/hedii/laravel-date-range)

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

| Method name    | Parameters           | Description                                              |
| -------------- | -------------------- | -------------------------------------------------------- |
| `currentMinute` | -                   | Scope a query to only include the current minute entries |
| `lastMinute`    | -                   | Scope a query to only include the last minute entries    |
| `currentHour`   | -                   | Scope a query to only include the current hour entries   |
| `lastHour`      | -                   | Scope a query to only include the last hour entries      |
| `currentDay`    | -                   | Scope a query to only include the current day entries    |
| `lastDay`       | -                   | Scope a query to only include the last day entries       |
| `currentWeek`   | -                   | Scope a query to only include the current week entries   |
| `lastWeek`      | -                   | Scope a query to only include the last week entries      |
| `currentMonth`  | -                   | Scope a query to only include the current month entries  |
| `lastMonth`     | -                   | Scope a query to only include the last month entries     |
| `currentYear`   | -                   | Scope a query to only include the current year entries   |
| `lastYear`      | -                   | Scope a query to only include the last year entries      |
| `lastSeconds`   | (int) $countSeconds | Scope a query to only include the last x seconds entries |
| `lastMinutes`   | (int) $countMinutes | Scope a query to only include the last x minutes entries |
| `lastHours`     | (int) $countHours   | Scope a query to only include the last x hours entries   |
| `lastDays`      | (int) $countDays    | Scope a query to only include the last x days entries    |
| `lastWeeks`     | (int) $countWeeks   | Scope a query to only include the last x weeks entries   |
| `lastMonths`    | (int) $countMonths  | Scope a query to only include the last x months entries  |
| `lastYears`     | (int) $countYears   | Scope a query to only include the last x years entries   |

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