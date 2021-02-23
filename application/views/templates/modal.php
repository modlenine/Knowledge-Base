<!-- /////////////////////////////////////////////////////////////////////////
//////////// เพิ่มรายการใหม่
//////////////////////////////////////////////////////////////////////// -->
<!-- Modal -->
<div class="modal fade" id="md_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มรายการใหม่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="modalbody" class="row">
                    <div class="col-lg-12">
                        <form class="row needs-validation" novalidate action="<?= base_url('savedata.html') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>ผู้ดำเนินการ : </label>
                                <input type="text" name="kb_userpost" id="kb_userpost" class="form-control" value="<?= getUser()->Fname . " " . getUser()->Lname ?>" readonly>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label>รหัสพนักงาน : </label>
                                <input type="text" name="kb_ecodepost" id="kb_ecodepost" class="form-control" value="<?= getUser()->ecode ?>" readonly>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label>แผนก : </label>
                                <input type="text" name="kb_deptnamepost" id="kb_deptnamepost" class="form-control" value="<?= getUser()->Dept ?>" readonly>
                                <input hidden type="text" name="kb_deptcodepost" id="kb_deptcodepost" class="form-control" value="<?= getUser()->DeptCode ?>" readonly>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Email:</label>
                                <input type="email" name="kb_emailpost" id="kb_emailpost" class="form-control" value="<?= getUser()->memberemail ?>" placeholder="user@company.com" readonly>
                            </div>
                            <div class="divider divider-border divider-center"><i class="icon-email2"></i></div>
                            <div class="col-lg-8 form-group">
                                <label>หัวข้อเรื่อง : </label>
                                <input type="text" name="kb_title" id="kb_title" class="form-control" value="" placeholder="กรุณาใส่หัวข้อเรื่องให้ครบถ้วน" required>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>หมวดหมู่:</label>
                                <select class="form-control" name="kb_category" id="kb_category" required>
                                    <option value="">กรุณาเลือกหมวดหมู่ให้ถูกต้อง</option>
                                    <?= getCategoryAdd(getUser()->DeptCode) ?>
                                </select>
                                <input hidden type="text" name="kb_catname" id="kb_catname">
                                <input hidden type="text" name="kb_catcode" id="kb_catcode">
                            </div>
                            <div class="col-12 form-group">
                                <label>รายละเอียด / ลักษณะที่พบ:</label><br>
                                <textarea required name="kb_detail" id="kb_detail" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label>สาเหตุ:</label><br>
                                <textarea required name="kb_cause" id="kb_cause" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label>การดำเนินงาน:</label><br>
                                <textarea required name="kb_action" id="kb_action" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label>ผลสรุป:</label><br>
                                <textarea required name="kb_conclusion" id="kb_conclusion" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-12 bottommargin">
                                <label>เอกสารประกอบ:</label><br>
                                <input id="kb_files" name="kb_files[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept=".pdf,.jpg,.png,.jpeg">
                            </div>

                            <div class="col-12 d-none">
                                <input type="text" id="freelance-quote-botcheck" name="freelance-quote-botcheck" value="" />
                            </div>
                            <div class="col-12">
                                <!-- <button type="submit" name="kb_submit" id="kb_submit" class="btn btn-primary">บันทึกข้อมูล</button> -->
                                <input type="submit" name="kb_submit" id="kb_submit" class="btn btn-success" value="บันทึกข้อมูล">
                            </div>
                            <input type="hidden" name="prefix" value="freelance-quote-">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////////////////////////////////////////////////////////
//////////// เพิ่มรายการใหม่
//////////////////////////////////////////////////////////////////////// -->














<!-- /////////////////////////////////////////////////////////////////////////
//////////// แก้ไขรายการ
//////////////////////////////////////////////////////////////////////// -->


<div class="modal fade" id="md_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdtitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="modalbody" class="row">
                    <div class="col-lg-12">
                        <form class="row needs-validation" novalidate action="<?= base_url('savedataEdit.html') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>ผู้ดำเนินการ : </label>
                                <input type="text" name="kb_userpost" id="kb_userpostE" class="form-control" value="" readonly>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label>รหัสพนักงาน : </label>
                                <input type="text" name="kb_ecodepost" id="kb_ecodepostE" class="form-control" value="" readonly>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label>แผนก : </label>
                                <input type="text" name="kb_deptnamepost" id="kb_deptnamepostE" class="form-control" value="" readonly>
                                <input hidden type="text" name="kb_deptcodepost" id="kb_deptcodepostE" class="form-control" value="" readonly>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Email:</label>
                                <input type="email" name="kb_emailpost" id="kb_emailpostE" class="form-control" value="" placeholder="user@company.com" readonly>
                            </div>
                            <div class="divider divider-border divider-center"><i class="icon-email2"></i></div>
                            <div class="col-lg-8 form-group">
                                <label>หัวข้อเรื่อง : </label>
                                <input type="text" name="kb_title" id="kb_titleE" class="form-control" value="" placeholder="กรุณาใส่หัวข้อเรื่องให้ครบถ้วน" required>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>หมวดหมู่:</label>
                                <select class="form-control" name="kb_category" id="kb_categoryE" required>
                                    <option value="">กรุณาเลือกหมวดหมู่ให้ถูกต้อง</option>
                                    <?= getCategoryAdd(getUser()->DeptCode) ?>
                                </select>
                                <input hidden type="text" name="kb_catname" id="kb_catnameE">
                                <input hidden type="text" name="kb_catcode" id="kb_catcodeE">
                            </div>
                            <div class="col-12 form-group">
                                <label>รายละเอียด / ลักษณะที่พบ:</label><br>
                                <textarea required name="kb_detail" id="kb_detailE" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label>สาเหตุ:</label><br>
                                <textarea required name="kb_cause" id="kb_causeE" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label>การดำเนินงาน:</label><br>
                                <textarea required name="kb_action" id="kb_actionE" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label>ผลสรุป:</label><br>
                                <textarea required name="kb_conclusion" id="kb_conclusionE" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-12 bottommargin">
                                <label>เอกสารประกอบ:</label><br>
                                <label for="">เอกสารเดิม</label>
                                <div id="showOldFile" class="row"></div><br>
                                <label for="">เอกสารอัพเดตใหม่</label>
                                <input id="kb_files" name="kb_files[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true">
                            </div>

                            <div class="col-12 d-none">
                                <input type="text" id="freelance-quote-botcheck" name="freelance-quote-botcheck" value="" />
                            </div>
                            <div class="col-12">
                                <input hidden type="text" name="kbcodeE" id="kbcodeE">
                                <!-- <button type="submit" name="kb_submit" id="kb_submit" class="btn btn-primary">บันทึกข้อมูล</button> -->
                                <input type="submit" name="kb_submit" id="kb_submit" class="btn btn-success" value="บันทึกข้อมูล">
                            </div>
                            <input type="hidden" name="prefix" value="freelance-quote-">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- /////////////////////////////////////////////////////////////////////////
//////////// แก้ไขรายการ
//////////////////////////////////////////////////////////////////////// -->














<!-- /////////////////////////////////////////////////////////////////////////
//////////// เพิ่ม Category ใหม่
//////////////////////////////////////////////////////////////////////// -->
<!-- เพิ่ม Category modal -->
<!-- Modal -->
<div class="modal fade" id="md_addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มหมวดหมู่</h5>
                <button id="md_close_cat" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="frm_addCategory">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label>ชื่อหมวดหมู่</label>
                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="กรุณาระบุชื่อหมวดหมู่ที่ต้องการ">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>คำอธิบาย</label>
                            <input type="text" name="cat_memo" id="cat_memo" class="form-control" placeholder="ระบุรายละเอียดของหมวดหมู่เพื่อให้ผู้ใช้ รับทราบ">
                            <input hidden type="text" name="cat_autoid" id="cat_autoid">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <a href="javascript:void(0)" id="btn_addCategory" class="button button-circle button-3d button-dirtygreen"><i class="icon-book3"></i>เพิ่มหมวดหมู่</a>
                    </div>
                </form>
                <div id="spinner"></div>
                <hr>



                <div id="modalbody" class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">

                            <div id="loadCategoryList"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////////////////////////////////////////////////////////
//////////// เพิ่ม Category ใหม่
//////////////////////////////////////////////////////////////////////// -->
















<!-- /////////////////////////////////////////////////////////////////////////
//////////// Verify user
//////////////////////////////////////////////////////////////////////// -->
<!-- Verify user modal -->
<!-- Modal -->
<div class="modal fade" id="md_verifyuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Verify user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalbody" class="row">
                    <div class="col-lg-12">
                        <form class="row needs-validation" novalidate id="frm_verify" action="<?= base_url('saveverify.html') ?>" method="POST" autocomplete="off">
                            <!-- <div class="form-process">
                                    <div class="css3-spinner">
                                        <div class="css3-spinner-scaler"></div>
                                    </div>
                                </div> -->
                            <div class="col-lg-12 text-center form-group">
                                <a href="#">
                                    <img alt="100%x180" src="<?= linkImg(getUser()->file_img) ?>" class="profileImage">
                                </a>
                            </div>
                            <div class="line line-sm"></div>
                            <div class="col-lg-6 form-group">
                                <label>ชื่อ : </label>
                                <input readonly type="text" name="user_fname" id="user_fname" class="form-control" value="<?= getUser()->Fname ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>สกุล : </label>
                                <input readonly type="text" name="user_lname" id="user_lname" class="form-control" value="<?= getUser()->Lname ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>รหัสพนักงาน : </label>
                                <input readonly type="text" name="user_ecode" id="user_ecode" class="form-control" value="<?= getUser()->ecode ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>แผนก : </label>
                                <input readonly type="text" name="user_deptname" id="user_deptname" class="form-control" value="<?= getUser()->Dept ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>รหัสแผนก : </label>
                                <input readonly type="text" name="user_deptcode" id="user_deptcode" class="form-control" value="<?= getUser()->DeptCode ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Email:</label>
                                <input readonly type="email" name="user_email" id="user_email" class="form-control" value="<?= getUser()->memberemail ?>" placeholder="user@company.com">
                            </div>
                            <div class="divider divider-border divider-center"><i class="icon-email2"></i></div>
                            <div class="col-lg-6 form-group">
                                <label>ยืนยันแผนก:</label>
                                <select name="user_dept_confirm" id="user_dept_confirm" class="form-control form-group" required>
                                    <option value="">กรุณาเลือกแผนกของท่าน</option>
                                    <?= getDept2() ?>
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>รหัสแผนก</label>
                                <input type="text" name="user_deptcode_confirm" id="user_deptcode_confirm" class="form-control form-group">
                                <input hidden type="text" name="user_deptname_confirm" id="user_deptname_confirm" class="form-control form-group">
                            </div>

                            <div class="col-12">
                                <input type="submit" id="btn_saveverify" name="btn_saveverify" class="btn btn-primary" value="บันทึกข้อมูล">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////////////////////////////////////////////////////////
//////////// Verify user
//////////////////////////////////////////////////////////////////////// -->















<!-- /////////////////////////////////////////////////////////////////////////
//////////// รายการรอตรวจสอบ ของ manager
//////////////////////////////////////////////////////////////////////// -->
<!-- เพิ่ม Category modal -->
<!-- Modal -->
<div class="modal fade" id="md_waitpublish" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">รายการรอตรวจสอบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- <div class="col-lg-12">
                        <a href="javascript:void(0)" id="btn_addCategory" class="button button-circle button-3d button-dirtygreen"><i class="icon-book3"></i>เผยแพร่ทั้งหมด</a>
                    </div> -->
                </div>

                <div id="spinner"></div>
                <div id="alertApp"></div>
                <hr>



                <div id="modalbody" class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">

                            <div id="loadWait"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////////////////////////////////////////////////////////
//////////// รายการรอตรวจสอบ ของ manager
//////////////////////////////////////////////////////////////////////// -->







<!-- /////////////////////////////////////////////////////////////////////////
//////////// Modal ระบุเหตุผลของการยกเลิกรายการ
//////////////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="md_resonCancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เหตุผลในการยกเลิกรายการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div id="alertApp"></div>

                <input type="text" name="check_kbno" id="check_kbno">
                <input type="text" name="checkaction" id="checkaction">

                <div class="row">
                    <div class="col-lg-12 form-group" id="resondiv">
                        <textarea name="resonOfCalcel" id="resonOfCalcel" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <button id="btnCancelPub" name="btnCancelPub" class="btn btn-danger btn-block">ยืนยัน</button>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /////////////////////////////////////////////////////////////////////////
//////////// Modal ระบุเหตุผลของการยกเลิกรายการ
//////////////////////////////////////////////////////////////////////// -->












<!-- /////////////////////////////////////////////////////////////////////////
//////////// รายการรอตรวจสอบ ของ Owner
//////////////////////////////////////////////////////////////////////// -->
<!-- เพิ่ม Category modal -->
<!-- Modal -->
<div class="modal fade" id="md_waitpublishOwner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">รายการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div id="spinner"></div>
                <div id="alertApp"></div>



                <div id="modalbody" class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">

                            <div id="loadWaitOwner"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////////////////////////////////////////////////////////
//////////// รายการรอตรวจสอบ ของ Owner
//////////////////////////////////////////////////////////////////////// -->