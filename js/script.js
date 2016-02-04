function validateEmail(elementValue){
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   return emailPattern.test(elementValue);
}


function form_check(form) {
    var barva = '#ff7777';
    var r = true;

    if (form.geslo.value != form.geslo2.value) {
        form.geslo.style.background = barva;
        form.geslo.value='';
        form.geslo2.value='';
        form.geslo.focus();
        r = false;
    }

    if (form.geslo2.value == '') {
        form.geslo2.style.background = barva;
        form.geslo2.focus();
        r = false;
    }
    if (form.geslo.value == '') {
        form.geslo.style.background = barva;
        form.geslo.focus();
        r = false;
    }
    if (form.username.value == '') {
        form.username.style.background = barva;
        form.username.focus();
        r = false;
    }
    if (!(validateEmail(form.email.value))) {
        form.email.style.background = barva;
        form.email.focus();
        r = false;
    }    
    if (form.telefon.value == '') {
        form.telefon.style.background = barva;
        form.telefon.focus();
        r = false;
    }
    if (form.naslov.value == '') {
        form.naslov.style.background = barva;
        form.naslov.focus();
        r = false;
    }    
    if (form.priimek.value == '') {
        form.priimek.style.background = barva;
        form.priimek.focus();
        r = false;
    }
    if (form.ime.value == '') {
        form.ime.style.background = barva;
        form.ime.focus();
        r = false;
    }

    var httpObjekt = new XMLHttpRequest();
    var url = 'preveriEmail.php?email='+form.email.value;

    httpObjekt.open('get',url,false);
    httpObjekt.send();

    if (httpObjekt.responseText != 'ok') {
        form.email.style.background = barva;
        form.email.focus();
        r = false;

        document.getElementById('errorEmail').innerHTML = httpObjekt.responseText;
    }
    else {
        document.getElementById('errorEmail').innerHTML = '';
    }

    return r;
}

function pocistiCss(polje) {
    polje.style.background = '#ffffff';    
}

