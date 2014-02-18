<?php
    require 'framework/header.php';

    $game = $_REQUEST['game'];
    if(empty($game)){
        $game = "ares";
    }
?>
    <h1><?php echo $game;?> - Lua错误统计</h1>
    <?php //include "framework/lua_head.php";?>
        <table class="table table-bordered">
        <thead>
        <tr><th colspan=10><center><?php echo $bugtype;?> - 版本号:错误次数<center></th></tr>
        <thead>
        <tbody>
    <?php
        if($query->num_rows == 0){
            echo "<tr><td colspan=10><center><h2>没有查询到数据</h2></center></td></tr>";
        }else{
            $ver_url = $this->config->item('base_url') . "/catalog/version/";

            foreach ($query->result() as $row){
                $version  = $row->version;
                $count    = $row->cnt;
                if(is_numeric($version)){
                    $results[$version] = $count;
                }
            }
            //arsort($results);
            $sum = count($results);
            $max_rows = ceil($sum / 10);
            for($pad=0;$pad<$max_rows * 10 - $sum;$pad++){
                $results[] = " - ";
            }

            $index = 0;
            foreach($results as $ver => $cnt){
                error_log("index = $index");
                if($index % 10 == 0){
                    $content = "<tr>";
                }
                if(is_numeric($cnt)){
                    
                    $href = $ver_url."?ver=$ver";
                    $content .= "<td><a href=$href>$ver : $cnt</a></td>";
                }else{
                    $content .= "<td> - : - </td>";
                }
                if($index % 10 == 9){
                    $content .= "</tr>";
                    echo $content;
                }
                $index++;
            }
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
 
<?php require 'framework/footer.php';?>
