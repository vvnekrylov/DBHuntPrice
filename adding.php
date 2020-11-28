<?php
    require_once ("connect_db.php");
    try {
        if (isset($_POST['lodge_name']) && isset($_POST['moose']) && isset($_POST['boar']) && isset($_POST['roedeer']))
        {
            $query_insert = "INSERT INTO Hunt_Pricelist (Lodge_Name, Moose, Wild_Boar, Roe_Deer) 
            VALUES ('{$_POST['lodge_name']}', '{$_POST['moose']}', '{$_POST['boar']}', '{$_POST['roedeer']}')";
            $insert = $pdo->exec($query_insert);
            if($insert)
                {
                    echo "Запись добавлена в базу данных";
                }
        }
    }
     catch (PDOException $e) {
        echo "Ошибка выполнения запроса". $e->getMessage();
    }


    try {
        $query_select = "SELECT * FROM Hunt_Pricelist";
             echo "<table align=center><caption><h4>Цены на трофеи в охотхозяйствах-партнерах на сезон 2020-2021 (в тыс. руб.)<h4></caption><tr><th>id</th><th>Наименование охотхозяйства</th><th>Лось</th><th>Кабан</th><th>Косуля</th></tr>";
       foreach($pdo->query($query_select) as $row)
            {
                echo "<tr>";
                        for($j = 0; $j <5; ++$j) echo "<td>$row[$j]</td>";
                echo "</tr>";
            }
                echo "</table>";
                include "index.html";

        } catch (PDOException $e) {
            echo "Ошибка выполнения запроса". $e->getMessage();
    }

    
?>