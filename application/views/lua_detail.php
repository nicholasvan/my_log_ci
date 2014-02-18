<?php
    require 'framework/header.php';

    $game = $_REQUEST['game'];
    if(empty($game)){
        $game = "ares";
    }
?>
    <h1><?php echo $game;?> - Lua错误详情</h1>
    <?php include "framework/lua_head.php";?>
        <table class="table table-bordered">
        <thead>
        <tr>
            <th>错误ID</th>
            <th>时间</th>
            <th>平台</th>
            <th>版本</th>
            <th>描述</th>
            <th>uid</th>
            <th>pid</th>
            <th>分区</th>
        </tr>
        <thead>
        <tbody>
    <?php
    foreach ($query->result() as $row){
        $version  = $row->version;
        $error_id = $row->err_id;
        $platform = $row->platform;
        $time     = $row->time;
        $function = $row->function;
        $uid      = $row->uid;
        $pid      = $row->pid;
        $section  = $row->section;

        echo"<tr><td>$error_id</td><td>$time</td><td>$platform</td><td>$version</td><td>$function</td><td>$uid</td>
            <td>$pid</td><td>$section</td></tr>";
    }
    ?>
        </tbody>
        </table>

        <h3>错误详情</h3>
<?php
    $dir = $error_id % 64;
    $file = $_SERVER['DOCUMENT_ROOT']."/ares/error_tracker/lualog/$dir/$error_id.log";
    if(!file_exists($file)){
        $olddir = (int)($error_id / 1000);
        $file = $_SERVER['DOCUMENT_ROOT']."/ares/error_tracker/lualog/$olddir/$error_id.log";
    }
    $content = file_get_contents($file);
    echo "<pre>";
    print_r($content);
    echo "</pre>";
?>

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
 
<?php require 'framework/footer.php';?>
