<?php
/**
 * File NameTransformer.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue50\Transformer;

/**
 * Class NameTransformer
 *
 * @package PHPWeekly\Issue50\Transformer
 */
class NameTransformer
{
    /**
     * Transform the name to the appropriate lyrical name replacement
     * based on provided replacement character
     *
     * Replacement Rules:
     *  - Names starting with replacement char remove first letter in name
     *  - Names starting with vowel prepend char to the name
     *  - All other names first letter of name is replace with char
     *
     * @param string $name
     * @param string $char
     * @return string
     */
    public function transform(string $name, string $char) : string
    {
        $name = strtolower($name);

        if ($char === $name[0]) {
            return substr_replace($name, '', 0, 1);
        }

        if (preg_match('/[aeiou]/i', $name[0])) {
            return sprintf('%s%s', $char, $name);
        }

        return substr_replace($name, $char, 0, 1);
    }
}
