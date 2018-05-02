<?php
/**
* 数组转换为html的table
* @date: 2018年5月2日 下午2:18:32
* @author: hxz
*/
namespace Hxzlhby;

class Arr2Table
{
    //获取表标题
    protected static function getTableTitle($title = '', $colspan = '') : string
    {
        $colspan = $colspan ? 'colspan="'.$colspan.'"' : '';
        return $title ? '<tr><th '.$colspan.' class="text-center">'.$title.'</th></tr>' : '';
    }
    
    public static function getHtmlTable($data = [], $title = '') : string
    {
        $thead = '<thead>';
        $head = array_shift($data);
        $colspan = count($head);
        $tableTitle = self::getTableTitle($title, $colspan);
        $th = '<tr>';
        foreach ($head as $value) {
            $th .= '<th>'.$value.'</th>';
        }
        $th .= '</tr>';
        $thead .= $tableTitle.$th.'</thead>';
        
        $tbody = '<tbody>';
        $tr = '';
        foreach ($data as $value) {
            $tr .= '<tr>';
            foreach ($value as $v) {
                $tr .= '<td>'.$v.'</td>';
            }
            $tr .= '</tr>';
        }
        $tbody .= $tr.'</tbody>';
        
        $table = '<table class="table table-bordered">'
            .$thead
            .$tbody
            .'</table>';
        return $table;
    }
    
}

