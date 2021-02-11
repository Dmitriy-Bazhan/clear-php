<?php

Tools::includeTemplate('header.header');

?>
<h1>SELECT</h1>

    <p>LEFT JOIN TABLE </p>
    <?php

    //    $text = "Sample sentence from KomunitasWeb, regex has become popular in. web programming." . PHP_EOL . " Now we learn regex. " . PHP_EOL . "According to wikipedia, Regular expressions (abbreviated as regex or regexp, with plural forms regexes, regexps, or regexen) " . PHP_EOL . " are written in a formal language that can be interpreted by a regular expression processor";
    //    $regex = '([ ])in([. ]) ';
    //    $text = preg_replace("/$regex/i",'$1<span style="background:#5fc9f6">in</span>$2', $text);
    //    echo $text;

    echo 'Time = ' . (int)$data['time_left_join'] . ' ms<br>';
    echo 'Count = ' . count($data['result_left_join']);
    ?>
    <table rules="all" style="border: solid 2px black;width: 800px;">
        <tr>
            <th>User id</th>
            <th>Username</th>
            <th>Id</th>
            <th>Order</th>
            <th>Price</th>
        </tr>
        <?php
        foreach ($data['result_left_join'] as $key => $value) {
            if ($key == 20) {
                break;
            }
            echo '<tr>
                    <td>' . $value['user'] . '</td>
                    <td>' . $value['name'] . '</td>
                    <td>' . $value['id'] . '</td>
                    <td>' . $value['orders'] . '</td>
                    <td>' . $value['price'] . '</td>
                  </tr>';
        }
        ?>
    </table>


    <p>RIGHT JOIN TABLE </p>
    <?php
    echo 'Time = ' . (int)$data['time_right_join'] . ' ms<br>';
    echo 'Count = ' . count($data['result_right_join']);
    ?>
    <table rules="all" style="border: solid 2px black;width: 800px;">
        <tr>
            <th>User id</th>
            <th>Username</th>
            <th>Id</th>
            <th>Order</th>
            <th>Price</th>
        </tr>
        <?php
        foreach ($data['result_right_join'] as $key => $value) {
            if ($key == 20) {
                break;
            }
            echo '<tr>
                    <td>' . $value['user'] . '</td>
                    <td>' . $value['name'] . '</td>
                    <td>' . $value['id'] . '</td>
                    <td>' . $value['orders'] . '</td>
                    <td>' . $value['price'] . '</td>
                  </tr>';
        }
        ?>
    </table>

    <p>JOIN TABLE </p>
    <?php
    echo 'Time = ' . (int)$data['time_join'] . ' ms<br>';
    echo 'Count = ' . count($data['result_join']);
    ?>
    <table rules="all" style="border: solid 2px black;width: 800px;">
        <tr>
            <th>User id</th>
            <th>Username</th>
            <th>Id</th>
            <th>Order</th>
            <th>Price</th>
        </tr>
        <?php
        foreach ($data['result_join'] as $key => $value) {
            if ($key == 20) {
                break;
            }
            echo '<tr>
                    <td>' . $value['user'] . '</td>
                    <td>' . $value['name'] . '</td>
                    <td>' . $value['id'] . '</td>
                    <td>' . $value['orders'] . '</td>
                    <td>' . $value['price'] . '</td>
                  </tr>';
        }
        ?>
    </table>

</pre>

<br>
<a href="/">Mainpage</a>