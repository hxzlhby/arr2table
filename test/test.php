<?php
require_once '../vendor/autoload.php';
$data = [
        ['类型','GMV','收入'],
        [1,2,3],
        [1,2,3],
        [1,2,3]
];
use Hxzlhby\Arr2Table;

$table = Arr2Table::getHtmlTable($data, 'test');

echo $table;