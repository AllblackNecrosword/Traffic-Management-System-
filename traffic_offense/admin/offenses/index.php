<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Offense Records</h3>
		<div class="card-tools">
			<a href="?page=offenses/manage_record" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Add New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-hover table-stripped">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="15%">
					<col width="15%">
					<col width="20%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>ID</th>
						<th>OffenseID</th>
						<th>Violator Name</th>
						<th>Officer Name</th>
						<th>Officer ID</th>
						<th>Vehicle Number</th>
						<th>Offense</th>
						<th>Status</th>
						<th>Charge</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					$qry = $conn->query("SELECT * FROM `offense` ORDER BY `Date` DESC");
						while ($row = $qry->fetch_assoc()):
						?>
							<tr>
								<td class="text-center">
									<?php echo $row['ID'] ?>
								</td>
								
								<td>
								<!-- <td><a href="javascript:void(0)" class="view_details" data-id="<?php echo $row['id'] ?>"><?php echo $row['ticket_no'] ?></a></td> -->
								<?php echo $row['ticket_no']?>
								</td>
								<td>
									<?php echo $row['violator_name'] ?>
								</td>
								<td>
									<?php echo $row['officer_name'] ?>
								</td>
								<td>
									<?php echo $row['officer_id'] ?>
								</td>
								<td>
									<?php echo $row['vehicles_no'] ?>
								</td>
								<td>
									<?php echo $row['OffenseType'] ?>
								</td>
								<td>
									<?php echo $row['status'] ?>
								</td>
								<td>
									<?php echo $row['total_amount'] ?>
								</td>
								<td>
									<?php echo $row['Date'] ?>
								</td>
								
								
								<td align="center">
									<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
										Action
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=offenses/manage_record&id=<?php echo $row['ID'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
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
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this offense record permanently?","delete_offense",[$(this).attr('data-id')])
		})
		$('.view_details').click(function(){
			uni_modal("<i class='fa fa-ticket'></i> Driver's Offense Ticket Details","offenses/view_details.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.table').dataTable({
			columnDefs:[{ orderable: false, targets: [5,6] }]
		});
	})
	function delete_offense($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_offense_record",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>