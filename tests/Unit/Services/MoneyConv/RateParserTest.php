<?php

namespace Tests\Unit\Services\MoneyConv;

use App\Services\MoneyConv\RateParser;
use PHPUnit\Framework\TestCase;

class RateParserTest extends TestCase
{
    public function testSuccess()
    {
        $content = file_get_contents(__DIR__ . '/example-1.xml');

        $parser = new RateParser();
        $res = $parser->run($content);

        $this->assertEquals(91.0668, $res['EUR']);
        $this->assertEquals(84.3249, $res['USD']);
    }
}
