<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>หน้าแสดงรายการ แผนก {deptname_read} หมวดหมู่ {catname} </title>

	<!-- For datatable server side -->
	<script src="<?= base_url() ?>assets/js/datatables/jquery-3.5.1.js"></script>
	<!-- For datatable server side -->

	<style>
		.icon {
			font-size: 18px;
		}

		.icon:hover {
			color: #1ABC9C !important;
		}
	</style>


	<script>
		$(document).ready(function() {
			$('#dataListByCatTable_read thead th').each(function() {
				var title = $(this).text();
				$(this).html(title + ' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
			});


			var table = $('#dataListByCatTable_read').DataTable({
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				"ajax": "<?php echo base_url('main/loaddatabydeptbycat_read/') . $catcode . "/" . $deptcode; ?>",
				order: [
					[0, 'desc']
				],
				columnDefs: [{
						targets: "_all",
						orderable: false
					},
					{
						"width": "15%",
						"targets": 0
					},
					{
						"width": "10%",
						"targets": 2
					},
				],
				//  dom: 'Bfrtip',
				// "buttons": [
				//     {
				//         extend: 'copyHtml5',
				//         title: 'Report OT Online By Department on '
				//     },
				//     {
				//         extend: 'excelHtml5',
				//         autoFilter: true,
				//         title: 'Report OT Online By Department on '
				//     }
				// ]
			});

			table.columns().every(function() {
				var table = this;
				$('input', this.header()).on('keyup change', function() {
					if (table.search() !== this.value) {
						table.search(this.value).draw();
					}
				});
			});
		});
	</script>


</head>

<body>

	<!-- Page Title
		============================================= -->
	<section id="page-title">

		<div class="container clearfix">
			<h1>หน้าแสดงรายการ</h1>
			<h3>แผนก {deptname_read}</h3>
			<h4>หมวดหมู่ {catname}</h4>
			<input hidden type="text" name="checkcatcode" id="checkcatcode" value="<?= $catcode ?>">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url() ?>">หน้าแรก</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('listdata_guest.html/').$deptcode ?>">คลังข้อมูลของ {deptname_read}</a></li>
				<li class="breadcrumb-item active" aria-current="page">หมวดหมู่ {catname}</li>
			</ol>
		</div>

	</section><!-- #page-title end -->
	<!-- Content
		============================================= -->



	<section id="content">

		<div class="container" style="margin-top:20px;">
			<div class="row">
				<div class="col-lg-12 addBtn">
					<a href="javascript:history.back(-1)" class="button button-circle button-3d button-second"><i class="icon-line-reply"></i>ย้อนกลับ</a>
					<!-- Load menu bar -->

					<!-- Load menu bar -->
				</div>
			</div>

		</div>


		<div class="container clearfix">
			<hr>
			<div class="table-responsive">
				<table id="dataListByCatTable_read" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ผู้โพสต์</th>
							<th>หัวข้อเรื่อง</th>
							<th>#</th>
						</tr>
					</thead>
				</table>
			</div>

		</div>
		<div class="mt-6"></div>






	</section><!-- #content end -->
</body>


</html>