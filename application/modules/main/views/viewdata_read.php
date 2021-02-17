<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View ข้อมูล</title>
</head>

<body>
	<!-- Page Title
		============================================= -->
	<section id="page-title" class="page-title-center">

		<div class="container clearfix">
			<h1>หัวข้อ : {kb_title}</h1>
			<span>หมวดหมู่ : {kb_category}</span>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url() ?>">หน้าแรก</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('listdata_guest.html/').$kb_deptcodepost ?>">คลังข้อมูลของ {kb_deptnamepost}</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('listdatabycat_read.html/').$kb_categorycode."/".$kb_deptcodepost ?>">หมวดหมู่ {kb_category}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{kb_title}</li>
			</ol>
		</div>

	</section><!-- #page-title end -->







	<!-- Content
		============================================= -->
	<section id="content">


		<div class="container clearfix">


			<div class="form-result"></div>

			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-12 addBtn">
							<a href="javascript:history.back(-1)" class="button button-circle button-3d button-second"><i class="icon-line-reply"></i>ย้อนกลับ</a>

							<!-- Load menu bar -->

							<!-- Load menu bar -->
						</div>
					</div>
					<hr>


					<form class="row" id="freelance-quote" action="include/form.php" method="post" enctype="multipart/form-data">
						<div class="form-process">
							<div class="css3-spinner">
								<div class="css3-spinner-scaler"></div>
							</div>
						</div>
						<div class="col-lg-6 form-group">
							<label>ผู้ดำเนินการ : </label>
							<input type="text" name="kb_userpostV" id="kb_userpostV" class="form-control" value="{kb_userpost}" readonly>
						</div>
						<div class="col-lg-3 form-group">
							<label>รหัสพนักงาน : </label>
							<input type="text" name="kb_ecodepostV" id="kb_ecodepostV" class="form-control" value="{kb_ecodepost}" readonly>
						</div>
						<div class="col-lg-3 form-group">
							<label>แผนก : </label>
							<input type="text" name="kb_deptnamepostV" id="kb_deptnamepostV" class="form-control" value="{kb_deptnamepost}" readonly>
						</div>
						<div class="col-lg-12 form-group">
							<label>Email:</label>
							<input type="email" name="kb_emailpostV" id="kb_emailpostV" class="form-control" value="{kb_emailpost}" readonly>
						</div>

						<div class="divider divider-border divider-center"><i class="icon-email2"></i></div>


						<div class="col-lg-8 form-group">
							<label>หัวข้อเรื่อง : </label>
							<input type="text" name="kb_titleV" id="kb_titleV" class="form-control" value="{kb_title}" readonly>
						</div>
						<div class="col-lg-4 form-group">
							<label>หมวดหมู่:</label>
							<input type="text" name="kb_categoryV" id="kb_categoryV" class="form-control" value="{kb_category}" readonly>
						</div>
						<div class="col-12 form-group">
							<label>รายละเอียด / อาการที่พบ:</label><br>
							<textarea name="kb_detailV" id="kb_detailV" class="form-control" cols="30" rows="8" readonly>{kb_detail}</textarea>
						</div>
						<div class="col-12 form-group">
							<label>สาเหตุ:</label><br>
							<textarea name="kb_causeV" id="kb_causeV" class="form-control" cols="30" rows="8" readonly>{kb_cause}</textarea>
						</div>
						<div class="col-12 form-group">
							<label>การดำเนินงาน:</label><br>
							<textarea name="kb_actionV" id="kb_actionV" class="form-control" cols="30" rows="8" readonly>{kb_action}</textarea>
						</div>
						<div class="col-12 form-group">
							<label>ผลสรุป:</label><br>
							<textarea name="kb_conclusionV" id="kb_conclusionV" class="form-control" cols="30" rows="8" readonly>{kb_conclusion}</textarea>
						</div>



						<div class="w-100"></div>
						<div class="col-lg-12 bottommargin">
							<label>เอกสารประกอบ:</label><br>
							<div class="row">
								<?= getFilesByKbcode($kbcode) ?>
							</div>
						</div>



					</form>
					<h4>คะแนนโดยรวม</h4>
					<input id="input-10" type="number" class="rating" min="0" max="5" data-step="1" data-stars="5" data-size="sm" value="<?=calRating($kbcode)?>" data-readonly="true">
					<hr>
					<form id="frm_comment">
						<div class="row form-group">
							<div id="boxstar" class="col-lg-12">
								<span>ให้คะแนน</span>
								<input id="rt_star" name="rt_star" type="number" class="rating" min="0" max="5" data-step="1" data-stars="5" data-size="sm">
							</div>
						</div>

						<div class="row form-group">
							<div id="boxcomment" class="col-lg-12">
								<span>Comment</span>
								<textarea name="rt_comment" id="rt_comment" cols="30" rows="10" class="form-control"></textarea>
							</div>
						</div>
						<input hidden type="text" name="rt_kbno" id="rt_kbno" value="<?= $kbcode ?>">
						<input class="button button-circle button-3d button-second" id="rt_submit" name="rt_submit" type="button" value="ส่ง">
					</form>
					<div id="alrtComment"></div>
					<hr>

					<!-- <div id="show_comment"></div> -->
				<?=loadCommentfn($kbcode)?>

				</div>
				<div class="col-lg-2"></div>


			</div>



		</div>

	</section><!-- #content end -->


</body>


</html>