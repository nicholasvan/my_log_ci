<?php
    require 'framework/header.php';

?>
    <h1><?php echo $game;?> - Lua错误详情</h1>
    <?php include "framework/lua_head.php";?>
        <table class="table table-bordered">
        <thead>
        <tr><th>ID</th><th>时间</th><th>平台</th><th>版本号</th><th>错误信息</th><th>UID</th><th>PID</th><th>分区</th></tr>
        <thead>
        <tbody>
    <?php
        if($query->num_rows == 0){
            echo "<tr><td colspan=8><center><h2>没有查询到数据</h2></center></td></tr>";
        }else{
            $results = $query->result();
            foreach ($results as $row){
                $error_id = $row->err_id;
                $time     = $row->time;
                $platform = $row->platform;
                $version  = $row->version;
                $function = $row->function;
                $uid      = $row->uid ? $row->uid : "nil";
                $pid      = $row->pid ? $row->pid : "nil";
                $sec      = $row->section ? $row->section : "nil";

                $url = base_url("/catalog/detail/?id=$error_id&game=$game");
                echo "<tr><td><a href='$url'>$error_id</a></td><td>$time</td><td>$platform</td><td>$version</td>
                    <td>$function</td><td>$uid</td><td>$pid</td><td>$sec</td></tr>";
            }
        }
    ?>
        </tbody>
        </table>

<?php 
    $base_url = base_url("/catalog/index/?game=$game");
    $cur_off  = (int)$_GET['offset'];
    $prev_page= max($cur_off - 30, 0);
    $next_page= $cur_off + 30;
?>
        <ul class="pager">
            <li class="previous">
            <a href=<?php echo $base_url;?>>&larr;最新</a>
            </li>
            <li><a href=<?php echo "$base_url&offset=$prev_page"?>>上一页</a></li>
            <li><a href=<?php echo "$base_url&offset=$next_page"?>>下一页</a></li>
            <li class="next">
            <a href="#">最旧&rarr;</a>
            </li>
        </ul>
 
<?php require 'framework/footer.php';?>
