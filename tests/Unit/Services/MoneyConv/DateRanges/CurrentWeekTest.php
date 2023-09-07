<?php

namespace Tests\Unit\Services\MoneyConv\DateRanges;

use App\Services\MoneyConv\DateRange;
use PHPUnit\Framework\TestCase;

class CurrentWeekTest extends TestCase
{
    static public function data(): array
    {
        return [
            'middleWeek' => [
                '2023-09-07',
                [
                    '2023-09-04',
                    '2023-09-05',
                    '2023-09-06',
                    '2023-09-07'
                ]
            ],
            'beginWeek' => [
                '2023-09-04',
                [
                    '2023-09-04'
                ]
            ],
            'endWeek' => [
                '2023-09-10',
                [
                    '2023-09-04',
                    '2023-09-05',
                    '2023-09-06',
                    '2023-09-07',
                    '2023-09-08',
                    '2023-09-09',
                    '2023-09-10'
                ]
            ],
            'diffMonth1' => [
                '2023-09-01',
                [
                    '2023-08-28',
                    '2023-08-29',
                    '2023-08-30',
                    '2023-08-31',
                    '2023-09-01'
                ]
            ],
            'diffMonth2' => [
                '2023-09-02',
                [
                    '2023-08-28',
                    '2023-08-29',
                    '2023-08-30',
                    '2023-08-31',
                    '2023-09-01',
                    '2023-09-02'
                ]
            ],
        ];
    }

    /**
     * @param string $nowDate
     * @param string[] $expectedDates
     * @dataProvider data
     */
    public function test(string $nowDate, array $expectedDates)
    {
        $actual = DateRange::fromMondayToNow($nowDate);
        $this->assertEquals($expectedDates, $actual);
    }
}
