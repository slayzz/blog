/*
/!* global obj, s, click *!/

$(document).ready(function () {
    var divTitle;
    divTitle = $('.for_java');
    var i = 0;
    var array = [];

    function redText() {
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
            if (char == '.') {
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
        $(this).animate({'marginLeft': '0', 'font-size': '30'});
    }
    while (i < divTitle.length) {
        array.push(divTitle[i]);
        i++;
    }
    function WhereDefine() {
        divTitle.on('click', redText);
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
    for (i = 0; i < objectWithResult.c.length; i++) {
        console.log(objectWithResult.c[i]);
        objectWithResult.c[i].animate({'marginLeft': '10'})
    }
    var stroka = "денис        .          молодец"
    var stroka2 = stroka.split('.');
    alert(stroka2);
})
;

*/
$(document).ready(function () {
    $(':checkbox').on('change', function () {
        var form = $(this).closest('form');
        sendData = [];

        $(':checkbox',form).map(function(index,element){
            if($(element).prop('checked')){
                sendData[$(element).attr('name')] = $(element).val();
            }
        })
        console.log(sendData);
        $.ajax({
            url :'/index.php',
            type: 'POST',
            data : sendData
        });
    });

});

var mew = window.location.href;
console.log(mew.substr(14));
