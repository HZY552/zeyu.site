<div class="content" >
  <div class="left" id="left">
    <div  class="box-ti" id="box-ti">
      <h3 class="title">
        <a href="http://www.zeyu.site">zeyu.site</a>
      </h3>
      <img src="images/chat25.svg">
    </div>
    <hr>
    <div id="list-button" class="box-button" >
      <button v-for="button in array_button" @click="menuclick(button.text,button.down,button.click),button.click += 1" class="menu-button">
        <div class="button-text">
          <img :src="button.path" class="icon-menu bimg">
          <span class="btext">{{button.text}}</span>
          <img v-if="button.down === true" src="images/downfill.svg" class="downfill bimg active">
          <img v-else src="images/downfill.svg" class="downfill bimg unactive">
        </div>
        <div v-if="button.down === true" class="menu menu-unactive" :id="button.text">
          <li v-for="m in button.menu" :id="m.text" class="sous-menu" @click="sous_menu_click(m.url), button.click = 0">
            <span style="font-size: 0.9rem;">{{m.text}}</span>
            <img :src="m.path">
          </li>
        </div>
      </button>
      <div class="contenu" id="right">
        <?=$content?>
      </div>
    </div>
  </div>

</div>
