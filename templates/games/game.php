<?php

//Tools::includeTemplate('header.header');

?>
<script src="libs/js/jquery-3.4.1.js" type="text/javascript"></script>
<style>
    .cell {
        width: 100px;
        height: 100px;
        border: solid 1px blue;
        display: inline-block;
        margin-right: 4px;
        background-color: lightblue;
    }

    .not_walk {
        width: 100px;
        height: 100px;
        border: solid 1px blue;
        display: inline-block;
        margin-right: 4px;
        background-color: red;
    }

    .secret {
        width: 100px;
        height: 100px;
        border: solid 1px blue;
        display: inline-block;
        margin-right: 4px;
        background-color: green;
    }
</style>

<?php
$secretBlocks = 0;
for ($i = 0; $i < 8; $i++) {
    echo '<div>';
    for ($j = 0; $j < 8; $j++) {
        $rnd = rand(0, 2);
        if ($rnd == 1) {
            echo '<div class="cell" data-x = "' . $i . '" data-y="' . $j . '"></div>';
        } elseif ($rnd == 0) {
            echo '<div class="not_walk" data-x = "' . $i . '" data-y="' . $j . '" data-walk="not_walk"></div>';
        } else {
            $secretBlocks++;
            echo '<div class="secret" data-x = "' . $i . '" data-y="' . $j . '" data-secret="secret"></div>';
        }
    }
    echo '</div>';
}

?>

<h1 style="display: inline-block;">Собрал ячеек: <span id="count">0</span></h1>

<span>&nbsp;</span>
<a href="/game">RELOAD</a>
<span>&nbsp;</span>
<a href="/">BACK TO MAINPAGE</a>

<script>
    (function () {
        var x = Math.floor(Math.random() * (7));
        var y = Math.floor(Math.random() * (7));
        var data = "div[data-x=" + "\'" + x + "\'" + "][data-y=" + "\'" + y + "\']";
        $(data).css('opacity', '0.2');
        $(data).attr('choose', 'i_am');
    })();

    (function () {
        var count = 0;
        var x = $("div[choose='i_am']").attr('data-x');
        var y = $("div[choose='i_am']").attr('data-y');

        document.addEventListener('keydown', function (e) {
            if (e.keyCode === 37) {
                console.log('left');
                if (y > 0) {
                    let check = +y - 1;
                    let walk = checking(x, check);
                    if (walk != 'not_walk') {
                        clear();
                        y--;
                        paint();
                    }
                }
            }
            if (e.keyCode === 38) {
                console.log('up');
                if (x > 0) {
                    let check = +x - 1;
                    let walk = checking(check, y);
                    if (walk != 'not_walk') {
                        clear();
                        x--;
                        paint();
                    }
                }
            }
            if (e.keyCode === 39) {
                console.log('right');
                if (y < 7) {
                    let check = +y + 1;
                    let walk = checking(x, check);
                    if (walk != 'not_walk') {
                        clear();
                        y++;
                        paint();
                    }
                }
            }
            if (e.keyCode === 40) {
                console.log('down');
                if (x < 7) {
                    let check = +x + 1;
                    let walk = checking(check, y);
                    if (walk != 'not_walk') {
                        clear();
                        x++;
                        paint();
                    }
                }
            }
            if (e.keyCode === 13) {
                console.log('enter');
                let element = "div[data-x=" + "\'" + x + "\'" + "][data-y=" + "\'" + y + "\']";
                let secret = $(element).attr('data-secret');
                if (secret == 'secret') {
                    $(element).removeClass('secret');
                    $(element).removeAttr('data-secret');
                    $(element).addClass('cell');
                    count++;
                    let html = '<span>' + count + '</span>';
                    $('#count').html(html);
                    if(count == <?= $secretBlocks ?>)
                    {
                        alert('YOU WIN!!!!');
                        location.reload();
                    }
                }
            }
        });

        function clear() {
            var data = "div[data-x=" + "\'" + x + "\'" + "][data-y=" + "\'" + y + "\']";
            $(data).css('opacity', '1');
            $(data).removeAttr('choose');
            return;
        }

        function paint() {
            var data = "div[data-x=" + "\'" + x + "\'" + "][data-y=" + "\'" + y + "\']";
            $(data).css('opacity', '0.2');
            $(data).attr('choose', 'i_am');
            return;
        }

        function checking(first, second) {
            let element = "div[data-x=" + "\'" + first + "\'" + "][data-y=" + "\'" + second + "\']";
            let walk = $(element).attr('data-walk');
            return walk;
        }

    })();
</script>


