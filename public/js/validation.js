function CheckPatterns() {
    var _valid = true;
    var form = document.getElementById('formularz');
    var maner = {
        'materialFormRegisterNicknameEx': /^[A-Za-z0-9]{4,20}$/,
        'materialFormRegisterNameEx': /^[A-ZŻŹĆĄŚĘŁÓŃ][a-zżźćńółęąś]+$/,
        'materialFormRegisterSurNameEx': /^[A-ZŻŹĆĄŚĘŁÓŃ][a-zżźćńółęąś]+([- ][A-ZŻŹĆĄŚĘŁÓŃ][a-zżźćńółęąś]+)*$/,
        'materialFormPeselEx': /^\d{11}$/,
        'materialFormRegisterEmailEx': /^[a-z\d]+[\w\d.-]*@(?:[a-z\d]+[a-z\d-]+\.){1,5}[a-z]{2,6}$/i,
        'materialFormRegisterPasswordEx': /^[A-Za-z0-9]{8,20}$/,
    };
    for (var elem in maner) {
        if (form[elem]) {
            if (!maner[elem].test(form[elem].value)) {
                form[elem].style.background = '#ff9999';
                form[elem].style.color = '#000';
                _valid = false;


                switch (elem) {
                    case 'materialFormRegisterPasswordEx':
                        document.getElementById('wrong-pswd').hidden = false;
                        document.getElementById('wrong-pswd').style.marginBottom = "-10px";
                    break;
                    case 'materialFormRegisterNicknameEx':
                        document.getElementById('wrong-nickname').hidden = false;
                        document.getElementById('wrong-nickname').style.marginBottom = "-10px";
                    break;
                }
            }
            else {
                form[elem].style.background = '';
                form[elem].style.color = '';
                switch (elem) {
                    case 'materialFormRegisterPasswordEx':
                        document.getElementById('wrong-pswd').hidden = true;
                    break;
                    case 'materialFormRegisterNicknameEx':
                        document.getElementById('wrong-nickname').hidden = true;
                    break;
                }


            }
        }

        var confirmMail = 'materialFormRegisterConfirmEmailEx';
        var mail = 'materialFormRegisterEmailEx';
        var confirmPasswd = 'materialFormRegisterConfirmPasswordEx';
        var passwd = 'materialFormRegisterPasswordEx';

        if (document.getElementById(mail).value !== document.getElementById(confirmMail).value) {
            document.getElementById(confirmMail).style.background = '#ff9999';
            document.getElementById(confirmMail).style.color = '#000';
            _valid = false;
        } else {
            document.getElementById(confirmMail).style.background = '';
            document.getElementById(confirmMail).style.color = '';
        }

        if (document.getElementById(passwd).value !== document.getElementById(confirmPasswd).value) {
            document.getElementById(confirmPasswd).style.background = '#ff9999';
            document.getElementById(confirmPasswd).style.color = '#000';
            _valid = false;
        } else {
            document.getElementById(confirmPasswd).style.background = '';
            document.getElementById(confirmPasswd).style.color = '';
        }

        if (elem === 'materialFormPeselEx') {
            var dateofbirth = form[elem].value;
            try {
                var day = Number(dateofbirth.substring(4, 6));
                var month = Number(dateofbirth.substring(2, 4));

                if (!(day >= 1 && day <= 31) || !(month >= 1 && month <= 12)) {
                    form[elem].style.background = '#ff9999';
                    form[elem].style.color = '#000';
                    _valid = false;
                }
            } catch (e) {
                console.log("Błąd zamiany daty", e);
            }
        }
    }
    return _valid;
}

function Send() {
    var _valid = CheckPatterns();
    if (_valid) {
        alert("Pomyślnie wypełniono formularz!\nDane zostały przesłane.");
    }
    return _valid;
}