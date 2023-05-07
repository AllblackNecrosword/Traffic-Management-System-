<?php if ($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
	</script>
<?php endif; ?>
<style>
	table.dataTable {
		clear: both;
		margin-top: 6px !important;
		margin-bottom: 6px !important;
		max-width: none !important;
		border-collapse: separate !important;
		border-spacing: 0;
		display: block;
		overflow-x: auto;
		white-space: nowrap;
	}
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Lost Documents</h3>

	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-hover table-stripped">
					<colgroup>
						<col width="5%">
						<col width="20%">
						<col width="20%">
						<col width="15%">
						<col width="20%">
						<col width="15%">
						<col width="5%">
					</colgroup>
					<thead>
						<tr>
							<th>No.</th>
							<th>Document Type</th>
							<th>Description</th>
							<th>Lost Date & Time</th>
							<th>Location</th>
							<th>Report Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$qry = $conn->query("SELECT * FROM `lost_document` ORDER BY `reportDate` DESC");
						while ($row = $qry->fetch_assoc()):
							?>
							<tr>
								<td class="text-center">
									<?php echo $i++; ?>
								</td>
								<td>
									<?php echo $row['DocumentType'] ?>
								</td>
								
								<td>
									<?php echo $row['Description'] ?>
								</td>
								<td>
									<?php echo $row['Date'] ?>
								</td>
								<td>
									<?php echo $row['Location'] ?>
								</td>
								<td>
									<?php echo $row['reportDate'] ?>
								</td>
							
								<td align="center">
									<button type="button"
										class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon"
										data-toggle="dropdown">
										Action
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item delete_data" href="javascript:void(0)"
											data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span>
											Delete</a>
									</div>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('.delete_data').click(function () {
			_conf("Are you sure to delete this offense record permanently?", "delete_offense", [$(this).attr('data-id')])
		})
		$('.view_details').click(function () {
			uni_modal("<i class='fa fa-ticket'></i> Driver's Offense Ticket Details", "offenses/view_details.php?id=" + $(this).attr('data-id'), 'mid-large')
		})
		$('.table').dataTable({
			columnDefs: [{ orderable: false, targets: [5, 6] }]
		});
	})
	function delete_offense($id) {
		start_loader();
		$.ajax({
			url: _base_url_ + "classes/Master.php?f=delete_offense_record",
			method: "POST",
			data: { id: $id },
			dataType: "json",
			error: err => {
				console.log(err)
				alert_toast("An error occured.", 'error');
				end_loader();
			},
			success: function (resp) {
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("An error occured.", 'error');
					end_loader();
				}
			}
		})
	}
</script>