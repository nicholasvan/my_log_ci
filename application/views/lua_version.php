<?php
    require 'framework/header.php';

    $game = $_REQUEST['game'];
    if(empty($game)){
        $game = "ares";
    }
?>
    <h1><?php echo $game;?> - Lua版本错误统计</h1>
    <?php //include "framework/lua_head.php";?>
        <table class="table table-bordered table-hover">
        <thead>
        <tr><th colspan=2><center>版本 <?php echo $version;?> 错误统计<center></th></tr>
        <thead>
        <tbody>
        <tr><td><center>错误信息</center></td><td><center>错误次数<center></td></tr>
    <?php
        if($query->num_rows == 0){
            echo "<tr><td colspan=2><center><h2>没有查询到数据</h2></center></td></tr>";
        }else{
            foreach ($query->result() as $row){
                $function  = $row->function;
                $number    = $row->number;
                echo "<tr><td><center>$function</center></td><td><center>$number</center></td></tr>";
            }
        }
    ?>
        </tbody>
        </table>

<!--
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
-->
 
<?php require 'framework/footer.php';?>
