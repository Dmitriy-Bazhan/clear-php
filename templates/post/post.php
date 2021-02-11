<?php
\Tools::includeTemplate('header.header');
?>


<h1>POST</h1>


<?php
if (isset($data['errors']) && count($data['errors']) > 0) {
    foreach ($data['errors'] as $error) {
        echo '<h3 style="color:red;">' . $error . '</h3>';
    }
}
if (isset($data['complete']) && $data['complete'] == 'complete') {
        echo '<h2 style="color:green;">COMPLETE</h2>';
}

?>

<form action="/store" method="POST">
    <input type="text" placeholder="Name" name="name" value="<?= isset($data['value']['name']) ? $data['value']['name'] : '' ?>"><br><br>
    <input type="text" placeholder="LastName" name="lastname" value="<?= isset($data['value']['lastname']) ? $data['value']['lastname'] : '' ?>"><br><br>
    <input type="text" placeholder="Age" name="age" value="<?= isset($data['value']['age']) ? $data['value']['age'] : '' ?>"><br><br>
    <input type="submit" value="Send">
</form>
<br>
<br>
<br>
<br>
<a href="/">BACK TO MAINPAGE</a>