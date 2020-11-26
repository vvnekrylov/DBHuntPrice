<?php
    require_once ("connect_db.php");
    try {
        if (isset($_POST['lodge_name']) && isset($_POST['moose']) && isset($_POST['boar']) && isset($_POST['roedeer']))
        {
            $query = "INSERT INTO Hunt_Pricelist (`id`, `Lodge_Name`, `Moose`, `Wild_Boar`, `Roe_Deer`) VALUES (NULL, :name, :moose, :boar, :roedeer)";
            $result = $pdo->prepare($query);
            $result->execute(['Lodge_Name'=>$_POST['lodge_name'], 'Moose'=>$_POST['moose'], 'Wild_Boar'=> $_POST['boar'], 'Roe_Deer'=>$_POST['roedeer']]);
            //INSERT INTO `Hunt_Pricelist` (`id`, `Lodge_Name`, `Moose`, `Wild_Boar`, `Roe_Deer`) VALUES (NULL, 'Рыслинсская нива ', '70', '30', '20')
        
            /*if($result)
                {
                    $query = "SELECT * FROM Hunt_Pricelist";
                }*/
        }
    } catch (PDOException $e) {
        echo "Ошибка выполнения запроса". $e->getMessage();
    }

    
    /*        if($resultc)
        {
            echo "Информация добавлена";// или меняем вывод в первой части 

            $query1 = "SELECT * FROM Hunt_Pricelist";
            $result1 = mysqli_query($link, $query1) or die("Ошибка ". mysqli_error($link));
            if($result1)
            {
                $rows = mysqli_num_rows($result1);//определение количества в таблице
                //echo "Всего рядов ".$rows;
                echo "<table><caption><h4>Цены на трофеи в охотхозяйствах-партнерах на сезон 2020-2021 (в тыс. руб.)<h4></caption><tr><th>id</th><th>Наименование охотхозяйства</th><th>Лось</th><th>Кабан</th><th>Косуля</th></tr>";
                for($i=1; $i < $rows; ++$i)
                {
                    $row = mysqli_fetch_row($result1);
                    echo "<tr>";
                        for($j = 0; $j <5; ++$j) echo "<td>$row[$j]</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            mysqli_free_result($result1);
        }
        mysqli_close($link);
    }*/
?>