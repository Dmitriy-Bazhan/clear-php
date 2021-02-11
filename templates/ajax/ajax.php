<?php

//Tools::includeTemplate('header.header');

?>

<script src="libs/js/jquery-3.4.1.js" type="text/javascript"></script>

<h1>AJAXX</h1>

<style>
    .fish_block {
        width: 250px;
        height: auto;
        border: solid 1px black;
        padding: 5px;
        margin-bottom: 5px;
    }

    img {
        width: 95%;
        margin: 5px;
    }
</style>

<div id="d3" style="width:500px;height:20px;background:green"></div>
<br>
<div id="d1" style="width:100px;height:100px;background:red"></div>
<div id="d2" style="width:100px;height:100px;background:green"></div>


<div class="fish_block" id="image1"></div>
<div class="fish_block" id="image2"></div>
<div class="fish_block" id="image3"></div>

<button><a href="/">Mainpage</a></button>

<script>
    var a1 = $.Deferred();
    var a2 = $.Deferred();
    var progrs = $.Deferred();

    progrs.progress(function (value) {
        $('#d3').css('width', (value) + 'px');
        $('#d3').html(value);
        if(value == 0)
        {
            console.log('The value is 0');
            // progrs.reject();
            progrs.then(function(){
               return console.log('Function resolved');
            });
            // progrs.resolve();
        }

    });

    // progrs.catch(function(){
    //     console.log('The value is 0');
    // });

    // progrs.done(function(){
    //     console.log('Done');
    // });


    $('#d1').slideUp(2000, a1.resolve);



    var x;
    var out = false;
    (function loop() {
        x = $('#d2').css('height');
        if (x !== '0px') {
            setTimeout(function () {
                let v = x.split('px');
                v[0]--;
                $('#d2').css('height', v[0] + 'px');
                progrs.notify(5 * v[0]);
                loop();
            }, 5);
        } else {
            var y = $('#d2').css('height').split('px')[0];
            $('html,body').css({
                overflow: 'hidden',
                height: '100%'
            });

            document.addEventListener('keydown', function (e) {
                console.log(e);
                if (e.keyCode === 13) {
                    console.log('enter');
                    if (out == false) {
                        out = true;
                        $('#d3').html('Not scroll');
                        images();
                    }else if(out == true)
                    {
                        $('#d3').html('Scroll');
                        out = false;
                    }
                }

            });

            $(window).on('mousewheel', function (event) {
                    if (out == true) {
                        return;
                    }
                    event = event || window.event;
                    x = event.originalEvent.wheelDelta / 120;
                    if (x == -1 && y > 0) {
                        y -= 10;
                    } else if (x == 1 && y < 500) {
                        y = +y + 10;
                    }
                    progrs.notify(y);
                }
            );
        }
    }());

    // setTimeout(function () {
    //     $('html,body').css({
    //         overflow: 'auto',
    //         height: 'auto'
    //     });
    // }, 15000);


    // $('#d2').slideUp(10000, progrs.notify($('#d2').css('height')));

    // a1.done(function () {
    //     console.log('A1');
    // });
    // a2.done(function () {
    //     console.log('A2');
    // });

    // $.when(a1, a2).done(function () {
    //     console.log('BOTH');
    // });

    async function images() {
        await $('#image1').load('assets/ajaxload/1.php');
        await $('#image2').load('assets/ajaxload/2.php');
        await $('#image3').load('assets/ajaxload/3.php');
    };

    $(window).on('load', function () {
        setTimeout(function () {
            console.log('Complete');
        }, 100)
    });


    // On JS
    // window.onload = function () {
    //     setTimeout(function () {
    //         alert('Complete');
    //     }, 100)
    // }


    //
    // let b = 1;
    //
    // let data = new Promise(function (resolve, reject) {
    //     (function () {
    //         b = $.post('assets/ajaxload/1.php');
    //         resolve(b);
    //         reject(b);
    //     })();
    // });
    //
    // data.then(function () {
    //     $('#image5').after('<div class="fish_block">' + b['responseText'] + '</div>');
    // });
    // data.catch(function () {
    //     console.log('Error');
    // });


    // var generator = sequence(10, 3);
    // var generator2 = sequence(7, 1);
    // var generator3 = sequence(1, 1);
    // var gen2 = sequence(0, 3);
    //
    // console.log('Generator1 = ' + generator());
    // console.log('Generator1 = ' + generator());
    // console.log('Generator1 = ' + generator());
    // console.log('Generator1 = ' + generator());
    // console.log('Generator2 = ' + generator2());
    // console.log('Generator2 = ' + generator2());
    //
    // console.log(take(gen2, 5));
    //
    // let startArray = [2, 4, 6, 8, 10];
    // var result = map(checkArray, startArray);
    // console.log('Start array = ' + startArray);
    // console.log('MAP result = ' + result);
    //
    //
    // result = fmap(checkArray, generator3);
    // console.log('Fmap result1 = ' + result());
    // console.log('Fmap result2 = ' + result());
    // console.log('Fmap result3 = ' + result());
    // console.log('Fmap result4 = ' + result());
    //
    //
    // function sequence(a, b) {
    //     let c = 0;
    //     console.log(c);
    //     return function () {
    //         if (c != 1) {
    //             c = 1;
    //             return a;
    //         } else {
    //             a = a + b;
    //             return a;
    //         }
    //     }
    // }
    //
    // function fmap(func1, funcGen) {
    //     return function () {
    //         let result = func1(funcGen());
    //         return result;
    //     }
    // }
    //
    // function take(generator, cnt) {
    //     var array = [];
    //     for (let i = 0; i < cnt; i++) {
    //         array.push(generator());
    //     }
    //     return array;
    // }
    //
    // function map(func, arr) {
    //     let result = [];
    //     arr.forEach(function (element) {
    //         result.push(func(element));
    //     })
    //     return result;
    // }
    //
    // function checkArray(element) {
    //     element = element + 2;
    //     return element;
    // }

</script>