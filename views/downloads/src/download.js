window.onload = function (){
    loadimg();
    resize_header();
    reposition_h3();
    animation_button_download();
    if (document.getElementById('x-lg-c')){
        document.getElementById('x-lg-c').style.transform = "rotate(0deg)";
    }
}

window.addEventListener('resize',function (){
    loadimg();
    resize_header();
})

function reposition_h3(){
    let title = document.getElementById("h3_tele");
    let table = document.querySelector("table");
    title.style.left = table.offsetLeft + 30 + "px";
    window.addEventListener("resize",function (){
        title.style.left = table.offsetLeft + 30 + "px";
    })
}

function animation_button_download(){
    let button = document.querySelectorAll(".button_dow");

    for (let i = 0;i < button.length;i++){

        button[i].addEventListener("mouseenter",function (){
            let span = button[i].querySelector("span");
            let svg = button[i].querySelector("svg");
            button[i].style.backgroundColor = "#0026ff";
            span.innerHTML = "";
            svg.style.width = "23";
            svg.style.height = "23";
        })

        button[i].addEventListener("mouseleave",function (){
            let span = button[i].querySelector("span");
            let svg = button[i].querySelector("svg");
            button[i].style.backgroundColor = "#4461F2FF";
            span.innerHTML = "Télécharger";
            svg.style.width = "20";
            svg.style.height = "20";
        })
    }
}







