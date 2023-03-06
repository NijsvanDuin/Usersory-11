<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class HomepagesTest extends TestCase
{
    #[DataProvider('addProvider')]
    public function testAdd($n1, $n2, $expected)
    {
        $homepages = new HomePages();
        $output = $homepages->add($n1, $n2);
        $this->assertEquals($expected, $output);
    }

    public static function addProvider()
    {
        return [
            [5, 5, 10],
            [1, 1, 2],
            [0, 0, 0],
            [-1, 3, 2],
            [-1, -1, -2],
            [1, -1, 0],
            [1, 0, 1],
            [0, 1, 1],
        ];
    }
}
