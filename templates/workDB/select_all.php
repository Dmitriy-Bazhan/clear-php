<?php

//Tools::includeTemplate('header.header', $data);

echo 'Count = ' . count($data['result']) . '<br><pre>';
echo 'Time = ' . (int)$data['time'] . '<br>';
//echo $data['page'] . '<br>';
//print_r($data['result'][0]);

foreach ($data['result'] as $key => $value)
{
//    echo $value['id'];
    echo $value['name'] . '<br>';
    if($key == 10)
    {
        break;
    }
}

echo '<br>';
echo '<br>';


echo 'Count2 = ' . count($data['result2']) . '<br><pre>';
echo 'Time2 = ' . (int)$data['time2'] . '<br>';
echo '<br>';
foreach ($data['result2'] as $key => $value)
{
//    echo $value['id'];
    echo $value['name'] . '<br>';
    if($key == 10)
    {
        break;
    }
}



?>

<a href="/">Mainpage</a>
