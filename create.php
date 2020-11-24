<?php
    require_once "connetion.php";

    if (isset($_POST['lodge_name']) && isset($_POST['moose']) && isset($_POST['boar']) && isset($_POST['roedeer'])) 
    {
        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка ". mysqli_error($link));

        //экранирование символов для mysql
        $lodgeName = htmlentities(mysqli_real_escape_string($link, $_POST['lodge_name']));
        $moose = htmlentities(mysqli_real_escape_string($link, $_POST['moose']));
        $boar = htmlentities(mysqli_real_escape_string($link, $_POST['boar']));
        $roedeer = htmlentities(mysqli_real_escape_string($link, $_POST['roedeer']));

        //создание строки запроса
        $query = "INSERT INTO Hunt_Pricelist VALUES (NULL, '$lodgeName', '$moose', '$boar', '$roedeer')";

        //выполнение запроса
        $result  = mysqli_query($link,$query) or die ("Ошибка". mysqli_error($link));

        if($result)
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
    }
?>