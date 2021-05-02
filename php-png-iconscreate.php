<?php
require __DIR__.'/php-png-iconscreate.class.php';

$class_instance = new phpPngIconsCreate();

var_dump($class_instance->createIconsPwa(__DIR__.'/example_images/icon.png', 'outputs'));
