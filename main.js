

function resize_header(){
    let header = document.querySelector('header');
    header.style.width = window.innerWidth;
}

function debounce(func, wait) {
    let timeout;  // 定时器变量
    return function() {
        clearTimeout(timeout);  //每次触发时先清除上一次的定时器,然后重新计时
        timeout = setTimeout(func, wait);  // 指定 xx ms 后触发真正想进行的操作 handler
    };
}

function throttle(func,interval){
    let timeout;
    let startTime = new Date();
    return function (){
        clearTimeout(timeout);
        let curTime = new Date();
        if(curTime - startTime <= interval){
            //小于规定时间间隔时，用setTimeout在指定时间后再执行
            timeout = setTimeout(()=>{
                func();
            },interval)
        } else {
            //重新计时并执行函数
            startTime = curTime;
            func()
        }
    }
}

window.addEventListener('scroll',debounce(header_on_top,0));

function header_on_top(){
    let header = document.querySelector('header');
    header.style.position = ""
    header.style.top = 0 + "px";
    if (document.documentElement.scrollTop > 0){
        header.style.backgroundColor = "rgba(255, 255, 255, 1)";
        header.style.height = "80px";
        header.style.zIndex = "5";
    }else{
        header.style.height = "auto";
        if (document.title === "Inscriptions" || document.title === "Logins"){
            header.style.backgroundColor = "#D3DFEA";
        }else{
            header.style.backgroundColor = "transparent";
        }

    }
}

var i = 1;

function click_button_menu(){
    let button_menu = document.getElementById('button-menu');
    let svg = document.getElementById('x-lg-c');
    let header = document.querySelector('header');
    let body_height = document.documentElement.scrollTop;
    if (button_menu){
        if(i%2!=0){
            svg.style.transform = "rotate(90deg)";
            header.style.height = "400px";
            header.style.backgroundColor = "rgba(255, 255, 255, 1)";
            header.style.zIndex = "5";

            let div_menu = document.createElement("div");
            div_menu.setAttribute('class','div-menu');
            div_menu.setAttribute('id','div-menu');
            header.appendChild(div_menu);
            div_menu.style.height = "auto";
            div_menu.style.width = "100%";
            div_menu.style.display = "flex";
            div_menu.style.flexDirection = "column";
            div_menu.style.marginTop = "50px";
            div_menu.style.alignItems = "flex-start";

            let button_cont = document.createElement('button');
            button_cont.setAttribute('class','list-button');
            button_cont.setAttribute('id','button-cont');
            div_menu.appendChild(button_cont);
            button_cont.innerHTML = "Contact";

            let button_moi = document.createElement('button');
            button_moi.setAttribute('class','list-button');
            button_moi.setAttribute('id','button-moi');
            div_menu.appendChild(button_moi);
            button_moi.innerHTML = "A propose de moi";

            let button_proj = document.createElement('button');
            button_proj.setAttribute('class','list-button');
            button_proj.setAttribute('id','button-proj');
            div_menu.appendChild(button_proj);
            button_proj.innerHTML = "Parcours de professionnalisation";

            let button_download = document.createElement('button');
            button_download.setAttribute('class','list-button');
            button_download.setAttribute('id','button-down');
            button_download.setAttribute('onclick','open_login("/downloads")')
            div_menu.appendChild(button_download);
            button_download.innerHTML = "Téléchargement";

            let button_log = document.createElement('button');
            button_log.setAttribute('class','list-button');
            button_log.setAttribute('id','button-log');

            let username = getCookie('username');
            console.log(username);
            if (username !== null && username !== undefined && username !== ''){
                button_log.setAttribute('onclick','open_login("/accounts")');
            }else{
                button_log.setAttribute('onclick','open_login("/logins")');
            }

            div_menu.appendChild(button_log);
            if (username !== null && username !== undefined && username !== ''){
                button_log.innerHTML = username;
            }else{
                button_log.innerHTML = "Login";
            }


        } else{
            svg.style.transform = "rotate(0deg)";
            if (body_height == 0){
                if (document.title === "Inscriptions" || document.title === "Logins"){
                    header.style.backgroundColor = "#D3DFEA";
                }else{
                    header.style.backgroundColor = "transparent";
                }
            }else{
                header.style.backgroundColor = "rgba(255, 255, 255, 1)";
            }
            header.style.height = "80px";
            let div_menu = document.getElementById("div-menu");
            if (div_menu){
                let button_cont = document.getElementById('button-cont');
                let button_moi = document.getElementById('button-moi');
                let button_proj = document.getElementById('button-proj');
                let button_log = document.getElementById('button-log');
                let button_download =document.getElementById('button-down')
                header.removeChild(div_menu);
                div_menu.removeChild(button_cont);
                div_menu.removeChild(button_moi);
                div_menu.removeChild(button_proj);
                div_menu.removeChild(button_log);
                div_menu.removeChild(button_download);
            }

        }
        i++;
    }
    return i;
}

function getCookie(cname)
{
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i=0; i<ca.length; i++)
    {
        let c = ca[i].trim();
        if (c.indexOf(name)==0) return c.substring(name.length,c.length);
    }
    return "";
}

function loadimg(){
    let w_width = window.innerWidth;
    let group_button = document.getElementById('header-navli');

    if (w_width >= 850){
        let button_list = document.getElementById('button-menu');
        if (button_list){
            group_button.removeChild(button_list);
        }

        for (let i=0;i<4;i++){
            group_button.getElementsByTagName('button')[i].style.display = "";
        }

        let button_menu_open = document.getElementById("button-menu-open");
        let button_menu_close = document.getElementById("button-menu-close");
        if (button_menu_open){
            document.getElementById("header-navli").removeChild(button_menu_open);
        }

        if (button_menu_close){
            document.getElementById("header-navli").removeChild(button_menu_close);
        }

    }if (w_width > 1130 ){
        let header = document.querySelector('header');
        header.style.height = "auto";
        if (document.title === "Inscriptions" || document.title === "Logins"){
            header.style.backgroundColor = "#D3DFEA";
        }else{
            header.style.backgroundColor = "transparent";
        }
        let div_menu = document.getElementById("div-menu");
        if (div_menu){
            let button_cont = document.getElementById('button-cont');
            let button_moi = document.getElementById('button-moi');
            let button_proj = document.getElementById('button-proj');
            let button_log = document.getElementById('button-log');
            header.removeChild(div_menu);
            div_menu.removeChild(button_cont);
            div_menu.removeChild(button_moi);
            div_menu.removeChild(button_proj);
            div_menu.removeChild(button_log);
        }
    } else{
        for (let i=4-1;i>=0;i--){
            group_button.getElementsByTagName('button')[i].style.display = "none";
        }

        if (!document.getElementById("button-menu")){


            let header_navli = document.getElementById('header-navli');

            // Button open
            let button_menu = document.createElement("button");
            button_menu.setAttribute("id","button-menu");
            button_menu.setAttribute("class","button-menu");
            // button_menu.innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" fill=\"currentColor\" id=\"x-lg-o\" viewBox=\"0 0 16 16\">\n" +
            //     "  <path d=\"M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z\"/>\n" +
            //     "</svg>";
            button_menu.setAttribute("onclick","click_button_menu()");
            button_menu.innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" fill=\"currentColor\" class=\"x-lg-c\" id=\"x-lg-c\" viewBox=\"0 0 16 16\">\n" +
                "  <path fill-rule=\"evenodd\" d=\"M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z\"/>" +
                "</svg>";
            //Button Close
            header_navli.appendChild(button_menu);
        }

    }
}

function open_login(url){
    window.location.href = url;
    console.log(1)
}










