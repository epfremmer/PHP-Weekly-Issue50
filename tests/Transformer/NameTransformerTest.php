<?php
/**
 * File NameTransformerTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue50\Tests\Transformer;

use PHPUnit_Framework_TestCase;
use PHPWeekly\Issue50\Transformer\NameTransformer;

/**
 * Class NameTransformerTest
 *
 * @coversDefaultClass PHPWeekly\Issue50\Transformer\NameTransformer
 *
 * @package PHPWeekly\Issue50\Tests\Transformer
 */
class NameTransformerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::transform
     * @dataProvider nameProvider
     *
     * @param string $name
     * @param string $char
     * @param string $expected
     */
    public function testTransform(string $name, string $char, string $expected)
    {
        $transformer = new NameTransformer();

        $this->assertEquals($expected, $transformer->transform($name, $char));
    }

    /**
     * Name data provider
     *
     * @return array
     */
    public function nameProvider() : array
    {
        return [
            // regular name
            'Katie [b]' => ['Katie', 'b', 'batie'],
            'Katie [f]' => ['Katie', 'f', 'fatie'],
            'Katie [m]' => ['Katie', 'm', 'matie'],

            // lower case name
            'katie [b]' => ['katie', 'b', 'batie'],
            'katie [f]' => ['katie', 'f', 'fatie'],
            'katie [m]' => ['katie', 'm', 'matie'],

            // name that starts with vowel
            'Eddie [b]' => ['Eddie', 'b', 'beddie'],
            'Eddie [f]' => ['Eddie', 'f', 'feddie'],
            'Eddie [m]' => ['Eddie', 'm', 'meddie'],

            // name that starts with "b"
            'Billy [b]' => ['Billy', 'b', 'illy'],

            // name that starts with "f"
            'Fred [f]' => ['Fred', 'f', 'red'],

            // name that starts with "m"
            'Marsha [m]' => ['Marsha', 'm', 'arsha'],
        ];
    }
}
