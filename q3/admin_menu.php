<?php
if( !empty($_GET["do"]) ){
      if( $_GET["do"]=="admin"){
?>
    <div class="ct a rb" style="position:relative; width:100%; padding:3px; top:-9px;">
<a href="#">網站標題管理</a>| <a href="#">動態文字管理</a>| <a href="?do=admin&redo=t5">預告片海報管理</a>| <a href="?do=admin&redo=t7">院線片管理</a>| <a href="?do=admin&redo=t9">電影訂票管理</a> </div>
<?php
    }
}
?>