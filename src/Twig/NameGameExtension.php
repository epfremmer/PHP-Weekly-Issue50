<?php
/**
 * File NameGameExtension.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue50\Twig;

use PHPWeekly\Issue50\Transformer\NameTransformer;
use Twig_Extension;
use Twig_SimpleFilter;

/**
 * Class NameGameExtension
 *
 * @package PHPWeekly\Issue50\Twig
 */
class NameGameExtension extends Twig_Extension
{
    const NAME = 'name_game';

    /**
     * @var NameTransformer
     */
    private $transformer;

    /**
     * NameGameExtension constructor
     *
     * @param NameTransformer $transformer
     */
    public function __construct(NameTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() : string
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters() : array
    {
        return [
            new Twig_SimpleFilter(self::NAME, [$this, 'filterName']),
        ];
    }

    /**
     * Transforms name per name game specifications
     *
     * @see https://en.wikipedia.org/wiki/The_Name_Game#Rules
     *
     * Example Usage:
     *
     *   {{ $name|name_game($char) }}
     *   {{ name_game($name, $char) }}
     *
     * @param string $name
     * @param string $char
     * @return string
     */
    public function filterName(string $name, string $char) : string
    {
        return $this->transformer->transform($name, $char);
    }
}
