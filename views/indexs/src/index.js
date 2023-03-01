window.onload = function (){
    change_c(0)
    loadimg();
    let index = 0;
    writing_title1(index);
    setTimeout(function (){
        writing_title2(index);
    },600);
    resize_header();
    if (document.getElementById('x-lg-c')){
        document.getElementById('x-lg-c').style.transform = "rotate(0deg)";
    }

    add_button_listen()
    if (document.documentElement.scrollTop >= 1910){
        run_progress()
    }

    window.addEventListener('scroll',function (){
        if (document.documentElement.scrollTop >= 1910){
            run_progress()
        }
    })

    isMove = false
    setInterval(function (){
        let p5 = document.getElementById('p5')
        p5.onmouseover = function (){
            isMove = true
        }

        p5.onmouseout = function (){
            isMove = false
        }
    },200)

    setInterval(function (){
        if (isMove === false){
            Carrousel_auto()
        }
    },4000)
    check_contact();
    change_scroll();
}

window.addEventListener('resize',function (){
    loadimg();
    resize_header();
})

function writing_title1(index) {
    let data = "BONJOUR,".split('');
    let dom = document.querySelector('.title1');
    if (index < data.length) {
        dom.innerHTML += data[index];
        setTimeout(writing_title1.bind(this), 100, ++index);
    }
}

function writing_title2(index) {
    let data = "BIENVENUE SUR ZEYU.SITE".split('');
    let dom = document.querySelector('.title2');
    if (index < data.length) {
        dom.innerHTML += data[index];
        setTimeout(writing_title2.bind(this), 100, ++index);
    }
}

function open_cv(path_cv){
    if (!document.getElementById('div-body')){
        let div = document.createElement('div');
        let body = document.querySelector('body');
        div.setAttribute("class","div-body");
        div.setAttribute("id","div-body");
        div.style.height = window.innerHeight + "px";
        div.style.top = document.documentElement.scrollTop + "px";
        body.appendChild(div);

        let button_close = document.createElement('button');
        button_close.setAttribute('class','button-cv-close');
        button_close.setAttribute('onclick','cv_close()');
        div.appendChild(button_close);
        button_close.innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"45\" height=\"45\" fill=\"currentColor\" class=\"bi bi-x-square\" viewBox=\"0 0 16 16\">\n" +
            "  <path d=\"M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z\"/>\n" +
            "  <path d=\"M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z\"/>\n" +
            "</svg>";

        let pdf = document.createElement("embed");
        pdf.setAttribute('src',path_cv);
        pdf.setAttribute('type','application/pdf');
        pdf.setAttribute('class',"pdf");
        div.appendChild(pdf);

        window.addEventListener('scroll',function (){
            div.style.top = document.documentElement.scrollTop + "px";
        })

        document.body.parentNode.style.overflowY = "hidden";
    }

}

function cv_close(){
    let div = document.getElementById('div-body');
    let body = document.querySelector('body');
    body.removeChild(div);
    document.body.parentNode.style.overflowY = "auto";
}

window.addEventListener("scroll",function (){
    let scroll_top = document.documentElement.scrollTop;
})

function add_button_listen(){
    button_login = document.getElementById('banner-button')
    button_login.addEventListener('click',function (){
        window.location.href = "/logins"
    })
}

function progress(id,color,name,pourcentage,left,right){
    let html = document.getElementById(id)
    html.querySelectorAll('span')[0].style.color = color
    html.querySelectorAll('span')[0].innerHTML = name + '</br>' + pourcentage + '%'
    for (let z = 0;z < html.querySelectorAll('div').length;z++){
        if (html.querySelectorAll('div')[z].className == 'circle rightcircle'){
            html.querySelectorAll('div')[z].style.borderTop = "10px solid " + color
            html.querySelectorAll('div')[z].style.borderRight = "10px solid " + color
            html.querySelectorAll('div')[z].style.transition = "2s"
            html.querySelectorAll('div')[z].style.transform = "rotate(" + right + "deg)"
        }

        if (html.querySelectorAll('div')[z].className == 'circle leftcircle'){
            html.querySelectorAll('div')[z].style.borderTop = "10px solid " + color
            html.querySelectorAll('div')[z].style.borderRight = "10px solid " + color
            html.querySelectorAll('div')[z].style.transition = "2s"
            html.querySelectorAll('div')[z].style.transform = "rotate(" + left + "deg)"
        }

    }
}

function run_progress(){
    let list_id = ['html','css','java','python','php','js','sql','vue.js']
    let list_name = ['HTML','CSS','JAVA','PYTHON','PHP','JS','SQL','VUE']
    let pourcentage = [80,80,50,60,65,70,60,50]
    let list_left = [175,175,45,75,95,115,75,45]
    let list_right = [45,45,45,45,45,45,45,45]
    let list_color = ['#FF5151','#5158FF','#61B177','#FCA103','#2AC6C6','#F650A0','#9747FF','#FE9AB2']
    for (let z = 0;z < list_id.length;z++){
        progress(list_id[z],list_color[z],list_name[z],pourcentage[z],list_left[z],list_right[z])
    }
}

index = 0

function Carrousel_auto(){
    let content_projects = document.getElementsByClassName('content-project')[0]
    let imgs = content_projects.getElementsByTagName('img')
    let box_span = document.getElementsByClassName('box-span')[0]
    let buttons = box_span.getElementsByTagName('button')
    let box_des = document.getElementsByClassName('box-des')[0]
    let ps = box_des.getElementsByTagName('div')
    if (index < imgs.length){
        for (let z = 0;z<imgs.length;z++){
            imgs[z].style.transform = 'translateX(' + -index*100 + '%)'
        }

        buttons[index].setAttribute("class","button-active")

        for (let b = 0; b<buttons.length;b++){
            if (b !== index){
                buttons[b].setAttribute("class","button-lock")
            }
        }

        ps[index].setAttribute("class","des content-active")

        for (let p = 0; p < ps.length;p++){
            if (p !== index){
                ps[p].setAttribute("class","des content-lock")
            }
        }

        index ++
    }else{
        index = 0
    }

}

function plus(){
    let content_projects = document.getElementsByClassName('content-project')[0]
    let imgs = content_projects.getElementsByTagName('img')
    let box_span = document.getElementsByClassName('box-span')[0]
    let buttons = box_span.getElementsByTagName('button')
    let box_des = document.getElementsByClassName('box-des')[0]
    let ps = box_des.getElementsByTagName('div')
    if (index < imgs.length-1){
        index += 1
    }else {
        index = 0
    }
    if (index < imgs.length){
        for (let z = 0;z<imgs.length;z++){
            imgs[z].style.transform = 'translateX(' + -index*100 + '%)'
        }

        buttons[index].setAttribute("class","button-active")

        for (let b = 0; b<buttons.length;b++){
            if (b !== index){
                buttons[b].setAttribute("class","button-lock")
            }
        }

        ps[index].setAttribute("class","des content-active")

        for (let p = 0; p < ps.length;p++){
            if (p !== index){
                ps[p].setAttribute("class","des content-lock")
            }
        }
    }else{
        index = 0
    }
}

function moin(){
    let content_projects = document.getElementsByClassName('content-project')[0]
    let imgs = content_projects.getElementsByTagName('img')
    let box_span = document.getElementsByClassName('box-span')[0]
    let buttons = box_span.getElementsByTagName('button')
    let box_des = document.getElementsByClassName('box-des')[0]
    let ps = box_des.getElementsByTagName('div')
    if (index > 0 && index < imgs.length){
        index -= 1
    }else{
        index = imgs.length - 1
    }

    if (index < imgs.length){
        for (let z = 0;z<imgs.length;z++){
            imgs[z].style.transform = 'translateX(' + -index*100 + '%)'
        }

        buttons[index].setAttribute("class","button-active")

        for (let b = 0; b<buttons.length;b++){
            if (b !== index){
                buttons[b].setAttribute("class","button-lock")
            }
        }

        ps[index].setAttribute("class","des content-active")

        for (let p = 0; p < ps.length;p++){
            if (p !== index){
                ps[p].setAttribute("class","des content-lock")
            }
        }
    }else{
        index = 0
    }
}

function change_c(index){
    let content_projects = document.getElementsByClassName('content-project')[0]
    let imgs = content_projects.getElementsByTagName('img')
    let box_span = document.getElementsByClassName('box-span')[0]
    let buttons = box_span.getElementsByTagName('button')
    let box_des = document.getElementsByClassName('box-des')[0]
    let ps = box_des.getElementsByTagName('div')
    if (index < imgs.length){
        for (let z = 0;z<imgs.length;z++){
            imgs[z].style.transform = 'translateX(' + -index*100 + '%)'
        }

        buttons[index].setAttribute("class","button-active")

        for (let b = 0; b<buttons.length;b++){
            if (b !== index){
                buttons[b].setAttribute("class","button-lock")
            }
        }

        ps[index].setAttribute("class","des content-active")

        for (let p = 0; p < ps.length;p++){
            if (p !== index){
                ps[p].setAttribute("class","des content-lock")
            }
        }
    }else{
        index = 0
    }
}

function check_contact(){
    let form = document.getElementById('form')
    let submit = document.getElementById('submit')
    let name = document.getElementById('name')
    let email = document.getElementById('email')
    let tele = document.getElementById('tele')
    let sujet = document.getElementById('sujet')
    let mess = document.getElementById('message')
    submit.addEventListener('click',function (){
        let error = document.getElementById('error_null')
        if (error){
            form.removeChild(error)
        }
        if (name.value === '' || email.value === '' || tele.value === '' || mess.value === ''){
            if (!document.getElementById('error_null')){
                let error_null = document.createElement('span')
                error_null.innerHTML = '表格不完整'
                error_null.setAttribute('class','error')
                error_null.setAttribute('id','error_null')
                form.appendChild(error_null)
            }
            setTimeout(function (){
                let error_null = document.getElementById('error_null')
                if (error_null){
                    form.removeChild(error_null)
                }
            },10000)
            form.target = "iframeend"
        }else{
            let res_name = /^[a-z\sA-Z]+$/.test(name.value);
            if (res_name === false){
                if (!document.getElementById('error_null')){
                    let error_null = document.createElement('span')
                    error_null.innerHTML = '名字中包含非法字符'
                    error_null.setAttribute('class','error')
                    error_null.setAttribute('id','error_null')
                    form.appendChild(error_null)
                }
                setTimeout(function (){
                    let error_null = document.getElementById('error_null')
                    if (error_null){
                        form.removeChild(error_null)
                    }
                },10000)
                form.target = "iframeend"
            }else{
                let res_tele = /^[0-9]+$/.test(tele.value);
                if (res_tele === false){
                    if (!document.getElementById('error_null')){
                        let error_null = document.createElement('span')
                        error_null.innerHTML = '手机号码不正确'
                        error_null.setAttribute('class','error')
                        error_null.setAttribute('id','error_null')
                        form.appendChild(error_null)
                    }
                    setTimeout(function (){
                        let error_null = document.getElementById('error_null')
                        if (error_null){
                            form.removeChild(error_null)
                        }
                    },10000)
                    form.target = "iframeend"
                }else{
                    let res_email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})+$/.test(email.value);
                    if (res_email === false){
                        if (!document.getElementById('error_null')){
                            let error_null = document.createElement('span')
                            error_null.innerHTML = '邮箱无效'
                            error_null.setAttribute('class','error')
                            error_null.setAttribute('id','error_null')
                            form.appendChild(error_null)
                        }
                        setTimeout(function (){
                            let error_null = document.getElementById('error_null')
                            if (error_null){
                                form.removeChild(error_null)
                            }
                        },10000)
                        form.target = "iframeend"
                    }else{
                        sujet.value = sujet.value.replace(/[\-\_\|\~\`\(\)\#\=\/\$\%\^\&\*\{\}\"\L\<\>\?\\]/g, '')
                        mess.value = mess.value.replace(/[\-\_\|\~\`\(\)\#\=\/\$\%\^\&\*\{\}\"\L\<\>\?\\]/g, '')
                        let error_null = document.createElement('span')
                        error_null.innerHTML = '提交成功'
                        error_null.setAttribute('class','send')
                        error_null.setAttribute('id','send_sc')
                        form.appendChild(error_null)
                        setTimeout(function (){
                            form.target = ""
                            window.location = "/"
                        },3000)
                    }
                }
            }
        }
    })
}

