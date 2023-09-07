<?php

namespace App\Services\MoneyConv;

use DateInterval;
use DatePeriod;
use DateTime;

class DateRange
{
    static public function fromMondayToNow(string $now): array
    {
        $now = date_create($now);
        $dayOfWeek = intval($now->format('N'));
        $diff = $dayOfWeek - 1;
        $begin = (clone $now)->modify("-$diff days")->format('Y-m-d');
        $end = (clone $now)->format('Y-m-d');
        return self::getDateArray($begin, $end);
    }

    static private function getDateArray($begin, $end): array
    {
        $start = new DateTime($begin);
        $interval = new DateInterval('P1D');
        $end = new DateTime($end);
        $period = new DatePeriod($start, $interval, $end, options: DatePeriod::INCLUDE_END_DATE);
        $res = [];
        foreach ($period as $date) {
            $res[] = $date->format('Y-m-d');
        }
        return $res;
    }
}
