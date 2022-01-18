<?php
    $contact2 =[
        ['江苏'=>['华罗庚','河南','童第周']],
        ['河南'=>['童第周','华罗庚','河南']],
        ['河北'=>['刘恒','江苏','河南']]
    ];
    echo '<table border="1" width="600" align="center">';
    echo '<tr bgcolor="#dddddd">';
    echo '<th>地区</th><th>姓名</th><th>公司</th>';
    echo '</tr>';
    foreach ($contact2 as $key=>$value) {
        echo '<tr>';
        foreach($value as $mn){
            for($n=0;$n<count($mn);$n++) {
                echo "<td>$mn[$n]</td>";
            }
        }
        echo '</tr>';
    }
    echo '</table>';
?>