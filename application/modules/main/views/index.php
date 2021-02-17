<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <!-- Content
============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row form-group searchSection">
                <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-center">
                    <label for="">ค้นหาเรื่องที่ต้องการ : คุณสามารถค้นหาเรื่องที่ต้องการได้โดยการพิมพ์สิ่งที่ต้องการค้นหาลงในช่องนี้</label>
                        <input type="text" name="indexSearch" id="indexSearch" class="form-control searchInput" placeholder="ค้นหาสิ่งต่างๆได้ที่นี่">
                        <div id="searchresult"></div>
                    </div>
                <div class="col-lg-3"></div>
                </div>

                <div class="row align-items-stretch gutter-20 min-vh-60">
                    <?= getDeptIndex(getUser()->DeptCode); ?>
                </div>
                <div class="clear"></div>
                <hr>

                <div class="row align-items-stretch gutter-20 min-vh-60">
                    <div class="col-lg-12">
                        <h3 class="text-center">10 รายการอัพเดตล่าสุด</h3>
                        <div class="table-responsive">
                            <table id="tbl_toptenlist" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ผู้โพสต์</th>
                                        <th>หัวข้อเรื่อง</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="showDataToptenList"></tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section><!-- #content end -->

</body>

</html>