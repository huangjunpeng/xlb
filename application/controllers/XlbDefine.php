<?php
$menu = array(
    array(
        'name' => '首页',
        'sub'  => null
    ),
    array(
        'name' => '用户',
        'sub'  => null
    ),
    array(
        'name' => '绘本',
        'sub'  => array(
            array(
                'name' => '共享绘本',
            ),
            array(
                'name' => '绘本标签',
            ),
            array(
                'name' => '绘本大全',
            ),
        )
    ),
    array(
        'name' => '柜子',
        'sub'  => null
    ),
    array(
        'name' => '活动',
        'sub'  => null
    ),
    array(
        'name' => '权限',
        'sub'  => array(
            array(
                'name' => '管理员列表',
            ),
            array(
                'name' => '角色管理',
            ),
            array(
                'name' => '柜子所属人',
            ),
        )
    ),
);
return $menu;