<?php

namespace App\Services\MoneyConv;

use App\Services\MoneyConv\RateParser;

class MoneyConvService
{
    /**
     * Получение курса валют по датам.
     *
     * Пример ответа:
     * ```
     * [
     *     '2023-09-04' => [
     *         'USD' => 94.5435,
     *         'EUR' => 97.3456,
     *         ...
     *     ],
     *     ...
     * ]
     * ```
     *
     * @param array $dates
     * @return float[][]
     */
    public function getRateOnDates(array $dates): array
    {
        $res = [];
        foreach ($dates as $date) {
            $res[$date] = $this->getRateOnDate($date);
        }
        return $res;
    }

    /**
     * Получение курса валют на определенную дату.
     *
     * Пример ответа:
     * ```
     * [
     *     'USD' => 94.5435,
     *     'EUR' => 97.3456,
     *     ...
     * ]
     * ```
     * @param string $date
     * @return float[]
     */
    public function getRateOnDate(string $date): array
    {
        $formattedDate = date_create($date)->format('d/m/Y');
        $url = "https://www.cbr.ru/scripts/XML_daily.asp?date_req=$formattedDate";

        $xmlContent = file_get_contents($url);

        $parser = new RateParser();
        return $parser->run($xmlContent);
    }
}
