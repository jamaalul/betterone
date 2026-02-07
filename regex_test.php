<?php
$value = '<better:button />';
echo preg_replace('/<better:([a-zA-Z0-9\-_.]+)/', '<x-better::$1', $value);
echo "\n";
$value2 = '</better:modal>';
echo preg_replace('/<\/better:([a-zA-Z0-9\-_.]+)/', '</x-better::$1', $value2);
echo "\n";
