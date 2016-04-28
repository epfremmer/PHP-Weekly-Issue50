<?php
/**
 * File index.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

declare(strict_types=1);

use PHPWeekly\Issue50\Transformer\NameTransformer;
use PHPWeekly\Issue50\Twig\NameGameExtension;

require_once 'vendor/autoload.php';

if (!isset($argv[1]) || !preg_match('/[a-z]/i', $argv[1])) {
    throw new \RuntimeException('Argument 1 must be provided and only contain characters [a-zA-Z]');
}

$loader = new Twig_Loader_Filesystem('src/Resources/templates');
$twig = new Twig_Environment($loader, ['cache' => 'cache/twig']);
$extension = new NameGameExtension(new NameTransformer());

$twig->addExtension($extension);

$name = $argv[1];

echo $twig->render('name_game.txt.twig', ['name' => $name]);
