<?php 
if($this->uri->segment(1) == "listdata.html"){
    $catcode = "";
    $catname = "";
}

?>

<a id="add_datamenubar" href="#" data-toggle="modal" data-target="#md_add" class="button button-circle button-3d button-dirtygreen"
data_catcode = "<?=$catcode?>"
data_catname = "<?=$catname?>"
>
<i class="icon-line-file-add"></i>เพิ่มรายการใหม่</a>

<a href="#" data-toggle="modal" data-target="#md_addCategory" class="button button-circle button-3d button-dirtygreen"><i class="icon-book3"></i>จัดการหมวดหมู่</a>
<a style="display:none;" id="checkDataBtn" href="#" data-toggle="modal" data-target="#md_waitpublish" class="button button-circle button-3d button-amber"><i class="icon-book3"></i>รายการรอตรวจสอบ</a>
