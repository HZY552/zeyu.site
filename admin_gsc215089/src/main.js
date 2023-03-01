
const App = {

}
const app = Vue.createApp(App)
app.config.globalProperties.test = '14';

const list_button = {
    data() {
        return {
            array_button : [
                {text : 'Dashboard', path : 'images/Dashboard.svg',down : false,click : 0},
                {text : 'Upload' , path : 'images/Upload.svg',down : false,click : 0},
                {text : 'Theme' , path : 'images/Theme.svg',down : true,
                    menu : [
                        {text : 'Icons',url : 'Theme/icons', path : 'images/card-image.svg'},
                        {text : 'Color',url : 'Theme/color', path : 'images/palette.svg'},
                        {text : 'Font Size',url : 'Theme/fontsize', path : 'images/file-earmark-font.svg'},
                        {text : 'Font Family',url : 'Theme/fontfamily', path : 'images/filetype-ttf.svg'}
                    ],click : 0},
                {text : 'Error Pages' , path : 'images/bug.svg',down : true,
                    menu : [
                        {text : '404',url : 'ErrorPages/404', path : 'images/404.svg'},
                        {text : '403',url : 'ErrorPages/403', path : 'images/403.svg'},
                        {text : '401',url : 'ErrorPages/401', path : 'images/401.svg'},
                        {text : 'Ban',url : 'ErrorPages/ban', path : 'images/banerror.svg'}
                    ],click : 0},
                {text : 'Clients' , path : 'images/Client.svg',down : true,
                    menu : [
                        {text : 'Add Client',url : 'Clients/add', path : 'images/Client-add.svg'},
                        {text : 'Delecte Client',url : 'Clients/delecte', path : 'images/DelecteClient.svg'},
                        {text : 'Ban',url : 'Clients/ban', path : 'images/ban.svg'},
                        {text : 'Change Client',url : 'Clients/change', path : 'images/changeclient.svg'}
                    ],click : 0},
                {text : 'BDD' , path : 'images/BDD.svg',down : true,
                    menu : [
                        {text : 'Add',url : 'BDD/add', path : 'images/database-add.svg'},
                        {text : 'Delecte',url : 'BDD/delecte', path : 'images/database-dash.svg'},
                        {text : 'Edit',url : 'BDD/edit', path : 'images/database-fill-gear.svg'},
                        {text : 'Find',url : 'BDD/find', path : 'images/search.svg'}
                    ],click : 0},
                {text : 'Permission' , path : 'images/Permission.svg',down : true,
                    menu : [
                        {text : 'Add User',url : 'Permission/add', path : 'images/Client-add.svg'},
                        {text : 'Change Password',url : 'Permission/changepassword', path : 'images/key.svg'},
                        {text : 'Change Leave',url : 'Permission/changeleave', path : 'images/changeclient.svg'},
                    ],click : 0},
                {text : 'Logs' , path : 'images/Logs.svg',down : false,click : 0},
                {text : 'Documentation' , path : 'images/Documentation.svg',down : false,click : 0},
            ],
            url : window.location.hash
        }
    },
    methods: {
        menuclick(text,down,click) {

            if (down === false){
                // let url = window.location.href + text + '/'
                this.url = text
                if (text === "Dashboard"){
                    window.location.href = '/admin_gsc215089'
                }else{
                    window.location.href = this.url
                }

            }else {
                let button = document.getElementById(text)
                if (click%2 === 1){
                    button.setAttribute("class","menu menu-unactive")
                }else {
                    button.setAttribute("class","menu menu-active")
                }
            }

        },
        sous_menu_click(li){
            // let sous_url = window.location.href + li + '/'
            this.url = li
            window.location.href = this.url
        }
    }
}

const vm = Vue.createApp(list_button).mount('#list-button')





window.onload = function (){
    resize_box_right()
    resize_menu()
}

window.addEventListener('resize',function (){
    resize_box_right()
    resize_menu()
})

function resize_box_right(){
    let contenu = document.getElementById('right')
    let left = document.getElementById('left')
    contenu.style.width = window.innerWidth - document.getElementById('box-ti').offsetWidth + 'px'
    contenu.style.left = document.getElementById('box-ti').offsetWidth + 'px'
}

function resize_menu(){
    let height_title = document.getElementById("box-ti")
    let menu_box = document.getElementById("list-button")
    menu_box.style.height = window.innerHeight - height_title.offsetHeight + 'px'
}