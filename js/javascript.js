/* global obj, s, click */

$(document).ready(function () {
    var divTitle;
    divTitle = $('.for_java');
    var i = 0;
    var array = [];
    while (i < divTitle.length) {
        array.push(divTitle[i]);
        i++;
    }
    function WhereDefine() {
        divTitle.on('click', function () {
            var txt = $(this).text();
            var reg = /^[А-Я]/;
            if (reg.test(txt)) {
                $(this).text(txt);
            }
            var char = '';
            var upChar = '';
            for (var i = 0; i < txt.length; i++) {
                char = txt.charAt(i);
                if (!(reg.test(txt.charAt(0)))) {
                    upChar = char.toUpperCase();
                    txt = txt.substr(1);
                    txt = upChar + txt;
                }
                if (char == '.' || char == ' ') {
                    for (var j = i + 1; j < txt.length; j++) {
                        if (txt.charAt(j) != ' ') {
                            var newString1 = '';
                            var newString2 = '';
                            upChar = txt.charAt(j).toUpperCase();
                            newString1 = txt.slice(0, j);
                            newString2 = txt.slice(j + 1);
                            txt = newString1 + upChar + newString2;
                            break;
                        }
                    }

                }
            }
            $(this).text(txt);
        });
    }

    WhereDefine();


    function whereErrors() {
        var reg = /^[А-Я]/;
        var bools = false;
        var objectResult = {
            bool: false,
            c: []

        };


        for (i = 0; i < array.length; i++) {
            txt = array[i].innerText;

            for (j = 0; j < txt.length; j++) {
                char = txt.charAt(j);
                if (!reg.test(txt.charAt(0)) && !bools) {
                    objectResult.bool = true;
                    objectResult.c.push(divTitle.eq(i));
                    bools = true;
                }

                if (char == '.') {

                    for (var k = j; k < txt.length; k++) {
                        if (txt.charAt(k + 1) != ' ') {
                            if (!reg.test(txt.charAt(k))) {
                                objectResult.bool = true;
                                objectResult.c.push(divTitle.eq(i));
                                break;
                            }
                        }
                    }
                }
            }
        }
        return objectResult;
    }

    objectWithResult = whereErrors();
    for (i = 0;i < objectWithResult.c.length; i++){
        objectWithResult.c[i].animate({color : "red"}, 1000,'linear', function (){

        }

        );
    }

    console.log(objectWithResult.c[0]);
})
;

