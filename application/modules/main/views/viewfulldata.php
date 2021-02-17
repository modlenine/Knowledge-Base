<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

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
            $('#dataListByCatTable thead th').each(function() {
                var title = $(this).text();
                $(this).html(title + ' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
			});
			

            var table = $('#dataListByCatTable').DataTable({
                "scrollX": true,
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo base_url('main/loaddatabydeptbycat/').$catcode; ?>",
                order: [
                    [0, 'desc']
                ],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }],
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
			<h1>หน้าแสดงรายการ</h1><br>
			<h4>หมวดหมู่ {catname}</h4>
			<input type="text" name="checkcatcode" id="checkcatcode" value="<?=$catcode?>">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item"><a href="#">Shortcodes</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
			</ol>
		</div>

	</section><!-- #page-title end -->
	<!-- Content
		============================================= -->



	<section id="content">

		<div class="container" style="margin-top:20px;">
			<div class="row">
				<div class="col-lg-12 addBtn">
					<a href="<?=base_url('listdata.html')?>" class="button button-circle button-3d button-second"><i class="icon-line-file-add"></i>ย้อนกลับ</a>
					<!-- Load menu bar -->
					<?=getMenubar()?>
					<!-- Load menu bar -->
				</div>
			</div>

		</div>


		<div class="container clearfix">
			<hr>
			<div class="table-responsive">
				<table id="dataListByCatTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>หัวข้อเรื่อง</th>
							<th>หมวดหมู่</th>
							<th>ผู้โพสต์</th>
							<th>รหัสพนักงาน</th>
							<th>วันที่โพสต์</th>
							<th>จำนวนผู้เข้าชม</th>
						</tr>
					</thead>
				</table>
			</div>

		</div>
		<div class="mt-6"></div>






	</section><!-- #content end -->
</body>


</html>