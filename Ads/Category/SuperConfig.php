<?php
/**
 * modules 可以在这里设置，并且覆盖前面的设置
 */
return [


    //分页相关设置
    '_page' => [
    'pagesize'  => 30,
    'bbf'       => '<ul class="pagination pagination-sm no-margin">',
    'aaf'       => '</ul>',
    //开始符
    'bf'        => '<li><a href="{$url}">&laquo;</a></li>',
    'bfd'       => '<li class="disabled"><a href="#">&laquo;</a></li>',
    //结束符
    'af'        => '<li><a href="{$url}">&raquo;</a></li>',
    'afd'       => '<li class="disabled"><a href="#">&raquo;</a></li>',
    //导航
    'nav'       => '<li><a href="{$url}">{$page}</a></li>',
    'navactive' => '<li class="active"><a href="{$url}">{$page}</a></li>',
],
];
