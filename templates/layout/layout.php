<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->template ?></title>
    <style>
        body{
            background: lightyellow;
        }
    </style>
</head>
<body>

    <?php  require_once 'templates' . DS . str_replace('.', DS, $this->template) . '.php'; ?>

</body>
</html>