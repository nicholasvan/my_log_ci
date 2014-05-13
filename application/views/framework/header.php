<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/ares/ci/asset/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <a class="brand" href=<?php echo base_url("catalog/index/?game=$game");?>>错误报告系统</a>
            <ul class="nav">
                <li class="active"><a href=<?php echo base_url("catalog/index/?game=$game");?>>Lua错误页面</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">统计页面<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href=<?php echo base_url("catalog/topbug/?game=$game");?>>最多出错</a></li>
                        <li><a href=<?php echo base_url("catalog/newest/?game=$game");?>>最新版本</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">游戏选择<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="?game=ares">大掌门</a></li>
                        <li><a href="?game=hebe">忍将</a></li>
                        <li><a href="?game=luanshiqu">乱世曲</a></li>
                        <li><a href="?game=saiya">龙珠</a></li>
                        <li><a href="?game=titan">巨人</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <br />
    <br />
    <br />
