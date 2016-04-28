<?php
/**
 * File NameGameExtension.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue50\Tests\Twig;

use PHPWeekly\Issue50\Transformer\NameTransformer;
use PHPWeekly\Issue50\Twig\NameGameExtension;

/**
 * Class NameGameExtension
 *
 * @coversDefaultClass PHPWeekly\Issue50\Twig\NameGameExtension
 * @covers ::__construct
 *
 * @package PHPWeekly\Issue50\Tests\Twig
 */
class NameGameExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NameGameExtension
     */
    private $extension;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->extension = new NameGameExtension(new NameTransformer());
    }

    /**
     * @covers ::getName
     */
    public function testGetName()
    {
        $this->assertEquals(NameGameExtension::NAME, $this->extension->getName());
    }

    /**
     * @covers ::getFilters
     */
    public function testGetFilters()
    {
        $this->assertContainsOnlyInstancesOf(\Twig_SimpleFilter::class, $this->extension->getFilters());
    }

    /**
     * @covers ::filterName
     * @dataProvider \PHPWeekly\Issue50\Tests\Transformer\NameTransformerTest::nameProvider
     *
     * @param string $name
     * @param string $char
     * @param string $expected
     */
    public function testNameFilter(string $name, string $char, string $expected)
    {
        $this->assertEquals($expected, $this->extension->filterName($name, $char));
    }
}
