<?php
require_once '../vendor/autoload.php';
$data = [
    ['单个表格'],
    ['标题1', '标题2', '标题3'],
    [1, 2, 3],
    [1, 2, 3],
    [1, 2, 3]
];

use Hxzlhby\Arr2Table;

$table = Arr2Table::oneTable($data);

echo $table;

$data2 = [
    [
        ['多个表格1'],
        ['标题1', '标题2', '标题3'],
        [1, 2, 3],
        [1, 2, 3],
        [1, 2, 3]
    ],
    [
        ['多个表格2'],
        ['标题1', '标题2', '标题3'],
        [1, 2, 3],
        [1, 2, 3],
        [1, 2, 3]
    ]
];

$table2 = Arr2Table::moreTable($data2);

echo $table;