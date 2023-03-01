function verifier(){
    var res_email = verifier_mail();
    var res_password = verifier_password();
    var res_username = verifier_username();
    if (res_username == true && res_email == true && res_password == true){
        document.getElementById('send').target = "";
    }else{
        document.getElementById('send').target = "iframeend";
    }

}

window.onload = function (){
    delete_error_email();
    delete_error_nom();
    delete_error_password();
    loadimg();
    header_on_top();
    document.body.style.backgroundColor = "#D3DFEA";
}

window.addEventListener('resize',function (){
    loadimg();
    resize_header();
})


function verifier_username(){
    if (document.getElementById('username')){
        delete_error_span('username');
    }
    var error_style = "2px red solid";
    var ok_style = "1px green solid";
    var username = document.forms[0]['nom'].value;
    var boxusername = document.getElementById('nom');
    if (verifier_null(username) == false){
        boxusername.style.border = error_style;
        create_error_span('username','group-nom',"Le nom de votre compte ne peut pas être vide ! ");
        var res_username = false;
    }else{
        boxusername.style.border = ok_style;
        delete_error_span('username');
        var res_username = true;
    }

    return res_username;
}

function delete_error_email(){
    var email = document.getElementById('email');
    var mail = document.getElementById('mail');
    if (email && mail){
        email.addEventListener('click',function (){
            mail.innerHTML = "";
            email.style.border = "none";
            var script = document.getElementById('scriptemail');
            if (script){
                var parent_node = script.parentNode;
                parent_node.removeChild(script);
            }

        })
    }
}

function delete_error_nom(){
    var nom = document.getElementById('nom');
    var nomerr = document.getElementById('username');
    if (nom && nomerr){
        nom.addEventListener('click',function (){
            nomerr.innerHTML = "";
            nom.style.border = "none";
            var script = document.getElementById('scriptnom');
            if (script){
                var parent_node = script.parentNode;
                parent_node.removeChild(script);
            }

        })
    }
}

function delete_error_password(){
    var boxpassword = document.getElementById('passwordconfirm');
    var passworderr = document.getElementById('pass');
    if (boxpassword && passworderr){
        boxpassword.addEventListener('click',function (){
            passworderr.innerHTML = "";
            boxpassword.style.border = "none";
            var script = document.getElementById('scriptpassword');
            if (script){
                var parent_node = script.parentNode;
                parent_node.removeChild(script);
            }

        })
    }
}

function verifier_password(){
    if (document.getElementById('errpass')){
        delete_error_span('errpass');
    }

    if (document.getElementById('errpass1')){
        delete_error_span('errpass1');
    }

    var error_style = "2px red solid";
    var ok_style = "1px green solid";
    var password = document.forms[0]['password'].value;
    var password1 = document.forms[0]['passwordconfirm'].value;
    var format = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*.?&])[A-Za-z\d$@$!%*.?&]{8,16}/;
    var box_password = document.getElementById('password');
    var box_password1 = document.getElementById('passwordconfirm');
    var password_format = format.test(password);
    var password1_format = format.test(password1);
    if (verifier_null(password) == false){
        box_password.style.border = error_style;
        create_error_span('errpass','group-password',"Le mot de pass ne peut pas être vide ! ");
        var res_pass = false;
    }else{
        if (password.length < 8){
            box_password.style.border = error_style;
            create_error_span('errpass','group-password',"Le mot de passe ne peut pas contenir moins de 8 caractères ! ");
            var res_pass = false;
        }else{
            if (password.length > 16){
                box_password.style.border = error_style;
                create_error_span('errpass','group-password',"Le mot de passe ne peut pas comporter plus de 16 caractères ! ");
                var res_pass = false;
            }else {
                if (password_format == false){
                    box_password.style.border = error_style;
                    create_error_span('errpass','group-password',"Le mot de passe doit avoir au moins 1 chiffre, 1 majuscule et 1 minuscule. ! ");
                    var res_pass = false;
                }else{
                    box_password.style.border = ok_style;
                    delete_error_span('errpass');
                    var res_pass = true;
                }
            }
        }
    }

    if (verifier_null(password1) == false){
        box_password1.style.border = error_style;
        create_error_span('errpass1','group-passwordconfirm',"Le mot de pass ne peut pas être vide ! ");
        var res_pass1 = false;
    }else {
        if (password1.length < 8){
            box_password1.style.border = error_style;
            create_error_span('errpass1','group-passwordconfirm',"Le mot de passe ne peut pas contenir moins de 8 caractères ! ");
            var res_pass1 = false;
        }else{
            if (password1.length > 16){
                box_password1.style.border = error_style;
                create_error_span('errpass1','group-passwordconfirm',"Le mot de passe ne peut pas comporter plus de 16 caractères ! ");
                var res_pass1 = false;
            }else{
                if (password1_format == false){
                    box_password1.style.border = error_style;
                    create_error_span('errpass1','group-passwordconfirm',"Le mot de passe doit avoir au moins 1 chiffre, 1 majuscule et 1 minuscule. ! ");
                    var res_pass1 = false;
                }else{
                    box_password1.style.border = ok_style;
                    delete_error_span('errpass1');
                    var res_pass1 = true;
                }
            }
        }
    }

    if (res_pass == true && res_pass1 == true){
        if (password === password1){
            box_password.style.border = ok_style;
            delete_error_span('errpass');
            box_password1.style.border = ok_style;
            delete_error_span('errpass1');
            var fina_pass = true;
        }else{
            box_password1.style.border = error_style;
            create_error_span('errpass1','group-passwordconfirm',"Veuillez revérifier votre mot de passe ! ");
            var fina_pass = false;
        }
    }

    if (fina_pass == undefined){
        return false;
    }else{
        return fina_pass;
    }


}

function verifier_mail(){
    if (document.getElementById('mail')){
        delete_error_span('mail');
    }
    var error_style = "2px red solid";
    var ok_style = "1px green solid";
    var email = document.forms[0]['email'].value;
    var box_email = document.getElementById('email');
    var format = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
    var format_email = format.test(email);

    if( verifier_null(email) == false){
        box_email.style.border = error_style;
        create_error_span('mail','group-email',"L'e-mail ne peut pas être vide ! ");
        var res_email = false;
    }else{
        if (format_email == false){
            box_email.style.border = error_style;
            create_error_span('mail','group-email',"Veuillez vérifier à nouveau votre e-mail !");
            var res_email = false;
        }else{
            if (email.length <= 320){
                box_email.style.border = ok_style;
                delete_error_span('mail');
                var res_email = true;
            }else{
                dns.resolveMx
                box_email.style.border = error_style;
                create_error_span('mail','group-email',"Votre adress E-mail est invalid !");
                var res_email = false;
            }

        }
    }


    return res_email;
}

function verifier_null(text){
    if (text == null || text == "" || text.length == 0){
        return false;
    }else{
        return true;
    }
}

function create_error_span(error_id,group_input,info){
    var errorspan = document.createElement("span");
    errorspan.id = error_id;
    document.getElementById(group_input).appendChild(errorspan);
    var error_span = document.getElementById(error_id);
    error_span.innerHTML = info;
    errorspan.style.color = "red";
    errorspan.style.textAlign = "centre";
    errorspan.style.width = "100%";
}

function delete_error_span(error_id){
    var element = document.getElementById(error_id);
    if (element){
        element.parentNode.removeChild(element);
    }

}

function unshow_error(email){
    var boxerr = document.getElementById('mail');
    boxerr.style.color = 'red';
    document.getElementById('email').value = email;
    document.getElementById('email').style.border = '2px red solid';

    setInterval(function (){
        clearInterval();
    },5000)

}

function unshow_nomerror(nom){
    var boxerr = document.getElementById('username');
    boxerr.style.color = 'red';
    document.getElementById('nom').value = nom;
    document.getElementById('nom').style.border = '2px red solid';

    setInterval(function (){
        clearInterval();
    },5000)

}

function unshow_passworderror(){
    var boxerr = document.getElementById('pass');
    boxerr.style.color = "red";
    document.getElementById('passwordconfirm').style.border = '2px red solid';

    setInterval(function (){
        clearInterval();
    },5000)

}