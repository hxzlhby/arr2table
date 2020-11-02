<?php
/**
* 数组转换为html的table
* @date: 2018年5月2日 下午2:18:32
* @author: hxz
*/
namespace Hxzlhby;

class Arr2Table
{
    public static $header = '<!doctype html> <html lang="en"> <head> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <title>可视化数据</title> <style type="text/css"> .customers { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; width: 100%; border-collapse: collapse; } .customers td, .customers th { font-size: 1em; border: 1px solid #1E9FFF; text-align: left; } .customers th { font-size: 1.1em; text-align: left; background-color: #1E9FFF; color: #ffffff; } .customers tr.autocolor td { color: #000000; background-color: #EAF2D3; } </style> </head><body>';
    public static $footer = '</body></html>';
    //获取表标题
    public static function moreTable($data = [])
    {
        if (empty($data)) return '无数据';
        $table ='';
        foreach ($data as $v) {
            $table .= self::buildTable($v);
        }
        return self::$header.$table.self::$footer;
    }

    public static function oneTable($data)
    {
        if (empty($data)) return '无数据';
        $table = self::oneTable($data);
        return self::$header.$table.self::$footer;
    }

    private static function buildTable($data)
    {
        $tableStart = "<table class='customers'>";
        $tableEnd = '</table>';
        $caption = current(array_shift($data));
        $caption = "<caption> <h2 align='center' style='color: black;'>{$caption}</h2> </caption>";
        $thead = '<thead> <tr>';
        $th = array_shift($data);
        foreach ($th as $v) {
            $thead .= "<th>{$v}</th>";
        }
        $thead .= '</tr></thead>';

        $tbody = '<tbody>';
        foreach ($data as $k=>$value) {
            $class = $k%2!=0 ? 'class="autocolor"':'';
            $tbody .= "<tr {$class}>";
            foreach ($value as $v) {
                $tbody .= "<td>{$v}</td>";
            }
            $tbody .= '</tr>';
        }
        return $tableStart.$caption.$thead.$tbody.$tableEnd;
    }
    
}

