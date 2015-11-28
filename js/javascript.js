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
    divTitle.on('click', function () {
        var txt = $(this).text();
        var reg = /^[А-Я]/;
        if (reg.test(txt)) {
            $(this).text(txt);
        } else {
            var lengthString = txt.length;
            var char = '';
            var upChar = '';

            for (var i = 0; i < txt.length; i++) {
                char = txt.charAt(i); 
                if (!(reg.test(txt.charAt(0)))) {
                    upChar = char.toUpperCase();
                    txt = txt.substr(1);
                    txt = upChar + txt;
                    console.log('asdsd');
                }
                if (char == '.') {
                    for (var j = i + 1; j < txt.length; j++) {
                        if (txt.charAt(j) != ' ') {
                            var newString1 = '';
                            var newString2 = '';
                            upChar = txt.charAt(j).toUpperCase();
                            newString1 = txt.slice(0, j );
                            newString2 = txt.slice(j + 1);
                            txt = newString1 + upChar + newString2;
                            console.log('asdsd');
                            break;
                        }
                    }
                }
            }
            $(this).text(txt);
        }


    });

});

var objectium = {
    0: 'man',
    1: 'woman'
};
console.log(objectium[0]);