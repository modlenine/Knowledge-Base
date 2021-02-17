<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เพิ่มข้อมูล</title>
</head>

<body>
	<!-- Page Title
		============================================= -->
	<section id="page-title" class="page-title-center">

		<div class="container clearfix">
			<h1>เพิ่มข้อมูล</h1>
			<span>A Short Page Title Tagline</span>
			<!-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shortcodes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Page Titles</li>
            </ol> -->
		</div>

	</section><!-- #page-title end -->







	<!-- Content
		============================================= -->
	<section id="content">
		<div class="content-wrap">
			<div class="container clearfix">

				<div class="form-widget">

					<div class="form-result"></div>

					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
							<form class="row" id="freelance-quote" action="include/form.php" method="post" enctype="multipart/form-data">
								<div class="form-process">
									<div class="css3-spinner">
										<div class="css3-spinner-scaler"></div>
									</div>
								</div>
								<div class="col-lg-6 form-group">
									<label>ผู้ดำเนินการ : </label>
									<input type="text" name="freelance-quote-name" id="freelance-quote-name" class="form-control required" value="" placeholder="John Doe">
								</div>
								<div class="col-lg-3 form-group">
									<label>รหัสพนักงาน : </label>
									<input type="text" name="freelance-quote-name" id="freelance-quote-name" class="form-control required" value="" placeholder="John Doe">
								</div>
								<div class="col-lg-3 form-group">
									<label>แผนก : </label>
									<input type="text" name="freelance-quote-name" id="freelance-quote-name" class="form-control required" value="" placeholder="John Doe">
								</div>
								<div class="col-lg-12 form-group">
									<label>Email:</label>
									<input type="email" name="freelance-quote-email" id="freelance-quote-email" class="form-control required" value="" placeholder="user@company.com">
								</div>
								<div class="divider divider-border divider-center"><i class="icon-email2"></i></div>


								<div class="col-lg-8 form-group">
									<label>หัวข้อเรื่อง : </label>
									<input type="text" name="freelance-quote-name" id="freelance-quote-name" class="form-control required" value="" placeholder="John Doe">
								</div>
								<div class="col-lg-4 form-group">
									<label>หมวดหมู่:</label>
									<select class="form-control required" name="freelance-quote-country" id="freelance-quote-country">
										<option value="AF">Afghanistan</option>
										<option value="AL">Albania</option>
										<option value="ZW">Zimbabwe</option>
									</select>
								</div>
								<div class="col-12 form-group">
									<label>รายละเอียด / อาการที่พบ:</label><br>
									<textarea name="freelance-quote-additional-notes" id="freelance-quote-additional-notes" class="form-control" cols="30" rows="8"></textarea>
								</div>
								<div class="col-12 form-group">
									<label>สาเหตุ:</label><br>
									<textarea name="freelance-quote-additional-notes" id="freelance-quote-additional-notes" class="form-control" cols="30" rows="8"></textarea>
								</div>
								<div class="col-12 form-group">
									<label>การดำเนินงาน:</label><br>
									<textarea name="freelance-quote-additional-notes" id="freelance-quote-additional-notes" class="form-control" cols="30" rows="8"></textarea>
								</div>
								<div class="col-12 form-group">
									<label>ผลสรุป:</label><br>
									<textarea name="freelance-quote-additional-notes" id="freelance-quote-additional-notes" class="form-control" cols="30" rows="8"></textarea>
								</div>
								
								
								
								<div class="w-100"></div>
								<div class="col-lg-12 bottommargin">
									<label>เอกสารประกอบ:</label><br>
									<input id="input-3" name="input2[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true">
								</div>
	
								<div class="col-12 d-none">
									<input type="text" id="freelance-quote-botcheck" name="freelance-quote-botcheck" value="" />
								</div>
								<div class="col-12">
									<button type="submit" name="freelance-quote-submit" class="btn btn-primary">บันทึกข้อมูล</button>
								</div>

								<input type="hidden" name="prefix" value="freelance-quote-">
							</form>
						</div>
						<div class="col-lg-2"></div>


					</div>

				</div>

			</div>
		</div>
	</section><!-- #content end -->


</body>

</html>