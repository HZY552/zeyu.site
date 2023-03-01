window.onload = function (){
    loadimg();
    resize_header();
    if (document.getElementById('x-lg-c')){
        document.getElementById('x-lg-c').style.transform = "rotate(0deg)";
    }
}

window.addEventListener('resize',function (){
    loadimg();
    resize_header();
})










