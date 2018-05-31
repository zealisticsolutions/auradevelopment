<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">User</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					User
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Patient List
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT ENDS -->
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								
								<th>
									<i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
									ALCC ID
								</th>
								<th>
									<i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
									firstname
								</th>
								<th>
									<i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
									lastname
								</th>
								<th>
									<i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
									Name
								</th>
								<th>
									<i class="ace-icon fa fa-envelope bigger-110 hidden-480"></i>
									Email
								</th>
								<th class="hidden-480">
									Gender
								</th>

								<th>
									<i class="ace-icon fa fa-mobile bigger-110 hidden-480"></i>
									Mobile
								</th>
								<th class="hidden-480">Status</th>
								<th class="hidden-480">Action</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="assets/js/jquery.dataTables.min.js"></script>

<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/buttons.colVis.min.js"></script>
<script src="assets/js/dataTables.select.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable = 
		$('#dynamic-table').DataTable( {
			"bProcessing": true,
			"bServerSide": true,
			"sPageButton": "paginate_button",
			"bPaginate": true,
			"order": [[ 0, "desc" ]],
			"ajax": {
			"url": "?controller=User&action=newPatient1",
				"type": "POST",
				"dataType": "json",
			},
			 "columns": [
				{ "data": "alccid" },
				{ "data": "firstname" },
				{ "data": "lastname" },
				{ "data": "name" },
				{ "data": "email" },
				{ "data": "gender" },
				{ "data": "contact_no" },
				{ "data": "status" },
				{ "data": "action" }
			],
			"columnDefs": [
				{
					"targets": [ 1 ],
					"visible": false,
					"searchable": true
				},
				{
					"targets": [ 2 ],
					"visible": false,
					"searchable": true
				}
			],
			"language": {
				"infoFiltered":"",
				"processing": "<img src='assets/logo/spinner-gif.gif' height='75' width='75' />"
			}
		} );
	
		$.fn.dataTable.ext.classes.sPageButton = 'btn btn-success';

		
		
		////
	
		// setTimeout(function() {
			// $($('.tableTools-container')).find('a.dt-button').each(function() {
				// var div = $(this).find(' > div').first();
				// if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
				// else $(this).tooltip({container: 'body', title: $(this).text()});
			// });
		// }, 500);
	})
</script>
