<?php


use UbyOne\Common\Bootstrapping;

define('__BASE__', '../');
require __BASE__ . 'vendor/autoload.php';


$boot = new Bootstrapping(parse_ini_file(__BASE__ . 'configs/common.ini'));
