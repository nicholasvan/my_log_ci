<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lua错误列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/ci/asset/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
        <table border='1'>
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
 


    <h1> 错误记录表</h1>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/ci/asset/js/bootstrap.min.js"></script>
</body>
</html>
