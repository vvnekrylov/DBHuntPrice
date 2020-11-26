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
                    echo "Запись добавлена в базу данных"
                    //$query = "SELECT * FROM Hunt_Pricelist";
                    
                }
        }
    }
     catch (PDOException $e) {
        echo "Ошибка выполнения запроса". $e->getMessage();
    }


    try {
        $query_select = "SELECT * FROM Hunt_Pricelist";
        foreach($pdo->query($query_select) as $row)
            {
                echo $row['id'] . ' ' . $row['Lodge_Name'] . ' ' . $row['Moose'] . ' ' . $row['Wild_Boar'] . ' ' . $row['Roe_Deer'];
            }

        } catch (PDOException $e) {
            echo "Ошибка выполнения запроса". $e->getMessage();
    }

    
?>