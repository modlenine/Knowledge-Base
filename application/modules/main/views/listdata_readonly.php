<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>หน้าแสดงรายการ แผนก {deptname_read}</title>


	<style>
		.icon {
			font-size: 18px;
		}

		.icon:hover {
			color: #1ABC9C !important;
		}
	</style>
</head>

<body>

	<!-- Page Title
		============================================= -->
	<section id="page-title">

		<div class="container clearfix">
			<h1>หน้าแสดงรายการ</h1>
			<h3>แผนก {deptname_read}</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=base_url()?>">หน้าแรก</a></li>
				<li class="breadcrumb-item active" aria-current="page">คลังข้อมูลของ {deptname_read}</li>
			</ol>
		</div>

	</section><!-- #page-title end -->
	<!-- Content
		============================================= -->



	<section id="content">

		<div class="container" style="margin-top:20px;">

			<div class="row form-group searchSection">
				<div class="col-lg-3"></div>
				<div class="col-lg-6 text-center">
					<label for="">ค้นหาเรื่องที่ต้องการ : คุณสามารถค้นหาเรื่องที่ต้องการได้โดยการพิมพ์สิ่งที่ต้องการค้นหาลงในช่องนี้</label>
					<input type="text" name="deptSearch_read" id="deptSearch_read" class="form-control searchInput" placeholder="ค้นหาสิ่งต่างๆได้ที่นี่">
					<div id="searchListresult_read"></div>
				</div>
				<div class="col-lg-3"></div>
			</div>

			<div class="row">
				<div class="col-lg-12 addBtn">
					<!-- Load menu bar -->
					<input hidden type="text" name="checkdept_readonly" id="checkdept_readonly" value="<?= $deptcode_read ?>">
					<!-- Load menu bar -->
				</div>
			</div>
			<hr>

			<h3>หมวดหมู่</h3>
			<div class="row">

				<?= getCategoryView_read($deptcode_read) ?>

			</div>
		</div>

		<div class="content-wrap">
			<div class="container clearfix">
				<hr>
				<h3>5 รายการอัพเดตล่าสุด</h3>
				<div class="table-responsive">
					<table id="dataListTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ผู้โพสต์</th>
								<th>หัวข้อเรื่อง</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody id="showDataList_read">



						</tbody>
					</table>
				</div>

			</div>
		</div>



	</section><!-- #content end -->
</body>


<script>


</script>

</html>