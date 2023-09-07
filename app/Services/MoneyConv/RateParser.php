<?php

namespace App\Services\MoneyConv;

use NumberFormatter;
use SimpleXMLElement;

class RateParser
{
    public function run(string $xmlContent): array
    {
        $xml = new SimpleXMLElement($xmlContent);

        $res = [];
        foreach ($xml->Valute as $value) {
            $code = strval($value->CharCode);
            $value = $this->parseFloat($value->Value);
            $res[$code] = $value;
        }

        return $res;
    }

    private function parseFloat(string $val)
    {
        $formatter = new NumberFormatter("ru-RU", NumberFormatter::DECIMAL);
        return $formatter->parse($val);
    }

}
