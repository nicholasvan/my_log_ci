<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lua错误列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/ares/ci/asset/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <a class="brand" href="#">错误报告系统</a>
            <ul class="nav">
                <li class="active"><a href="#">Lua错误页面</a></li>
                <li><a href="#">统计页面</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">游戏选择<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="?game=ares">大掌门</a></li>
                        <li><a href="?game=hebe">忍将</a></li>
                        <li><a href="?game=chaos">乱世曲</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <br />
    <br />
    <br />

<?php
$game = $_REQUEST['game'];
if(empty($game)){
    $game = "ares";
}
?>
    <h1><?php echo $game;?> - Lua错误详情</h1>
<?php include "lua_head.php";?>
        <table class="table table-bordered">
        <thead>
        <tr><th>ID</th><th>时间</th><th>平台</th><th>版本号</th><th>错误信息</th><th>UID</th><th>PID</th><th>分区</th></tr>
        <thead>
        <tbody>
<?php
        foreach ($query->result() as $row){
            $error_id = $row->err_id;
            $time     = $row->time;
            $platform = $row->platform;
            $version  = $row->version;
            $function = $row->function;
            $uid      = $row->uid ? $row->uid : "nil";
            $pid      = $row->pid ? $row->pid : "nil";
            $sec      = $row->section ? $row->section : "nil";

            echo "<tr><td>$error_id</td><td>$time</td><td>$platform</td><td>$version</td>
                <td>$function</td><td>$uid</td><td>$pid</td><td>$sec</td></tr>";
        }
?>
        </tbody>
        </table>

        <ul class="pager">
            <li class="previous">
            <a href="#">&larr;最新</a>
            </li>
            <li><a href="#">上一页</a></li>
            <li><a href="#">下一页</a></li>
            <li class="next">
            <a href="#">最旧&rarr;</a>
            </li>
        </ul>
 
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/ares/ci/asset/js/bootstrap.min.js"></script>
</body>
</html>
