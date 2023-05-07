<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `offense` where ID = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=stripslashes($v);
        }
    }
}
?>
<style>
    .uploaded_img{
        width:150px;
        height:135px;
        object-fit:scale-down;
        object-position:center center;
    }
    .img-panel{
        width:170px; 
    }
</style>
<!-- <form action="manage_record.php" method="post"> -->
<div class="card card-outline card-info">
    
    <div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Update": "Create New " ?> Offense Record</h3>
	</div>
	<div class="card-body">
		<form action="" id="offense-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                   <label class="control-label" for="Date">Date Violated</label>
                    <input type="datetime-local" class="form-control" name="Date" id="Date" value="<?php echo isset($Date) ? date("Y-m-d\\TH:i",strtotime($Date)) : date("Y-m-d\\TH:i") ?>" required>
                </div>
                <div class="form-group">
                    <lable class="control-label" for="ticket_no">Ticket No.</lable>
                    <input type="text" class="form-control" name="ticket_no" id="ticket_no" value="<?php echo isset($ticket_no) ? $ticket_no : '' ?>" required>
                </div>
                <div class="form-group">
                    <lable class="control-label" for="vehicles_no">Vehicles No.</lable>
                    <input type="text" class="form-control" name="vehicles_no" id="vehicles_no" value="<?php echo isset($vehicles_no) ? $vehicles_no : '' ?>" required>
                </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                    <lable class="control-label" for="violator_name">Violator Name</lable>
                    <input type="text" class="form-control" name="violator_name" id="violator_name" value="<?php echo isset($violator_name) ? $violator_name : '' ?>" required>
                </div>
                <div class="form-group">
                    <lable class="control-label" for="officer_id">Officer ID.</lable>
                    <input type="text" class="form-control" name="officer_id" id="officer_id" value="<?php echo isset($officer_id) ? $officer_id : '' ?>" required>
                </div>
                <div class="form-group">
                    <lable class="control-label" for="officer_name">Officer Name.</lable>
                    <input type="text" class="form-control" name="officer_name" id="officer_name" value="<?php echo isset($officer_name) ? $officer_name : '' ?>" required>
                </div>
                <div class="form-group">
                    <lable class="control-label" for="status">Status</lable>
                    <select name="status" id="status" class="custom-select" required>
                        <option>Pending</option>
                        <option>Paid</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-6">
                <h5 class='border-bottom border-light'><b>Offense List</b></h5>
                <div class="row">
                    <div class="col-auto float-left">
                        <div class="form-group">
                            <lable class="control-label" for="offense_id">Offense</lable>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <select id="offense_id" class="custom-select select2" >
                                <option value=""></option>
                                <?php 
                                $driver = $conn->query("SELECT * FROM `offenses` order by `name` asc ");
                                while($row = $driver->fetch_assoc()):
                                ?>
                                <option value="<?php echo $row['id'] ?>" data-fine="<?php echo $row['fine'] ?>" data-code="<?php echo $row['code'] ?>" data-name="<?php echo $row['name'] ?>">[<?php echo $row['code'] ?>] <?php echo ucwords($row['name']) ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <button class='btn btn-flat btn-default bg-lightblue' type="button" id="add_to_list"><i class="fa fa-plus"></i> Add to List</button>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                <table class="table table-stripped table-hover" id="fine-list">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Offense</th>
                            <th>Fine</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($id)):
                        $olist = $conn->query("SELECT * FROM  `offenses` order by 'date_created' desc ");
                        while($row = $olist->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?php echo $row['code'] ?>
                                <input type="hidden" name="offense_id[]" value="<?php echo $row['offense_id'] ?>">
                                <input type="hidden" name="fine[]" value="<?php echo $row['fine'] ?>">
                            </td>
                            <td><?php echo $row['name'] ?></td>
                            <td class="fine text-right"><?php echo number_format($row['fine'],2) ?></td>
                            <td>
                                <button class="btn  btn-sm btn-default text-danger" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if(!isset($id) || (isset($olist) && $olist->num_rows <= 0)): ?>
                        <tr id='td-none'>
                            <th colspan="4" class="text-center">No Offense Listed Yet.</th>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">Total</th>
                            <th colspan="2" class="text-right" id="total_amount"><?php echo isset($total_amount) ? number_format($total_amount,2) : '0.00' ?></th>
                            <th><input type="hidden" name="total_amount" value="<?php echo isset($total_amount) ? $total_amount : 0 ?>"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="remarks" class="control-label">Remarks</label>
                    <textarea name="remarks" id="remarks" class="form-control" cols="30" rows="3" style="resize:none !important"><?php echo isset($remarks) ? $remarks : '' ?></textarea>
                </div>
            </div>
        </div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" name="save" form="offense-form">Save</button>
		<a class="btn btn-flat btn-default" href="?page=offenses">Cancel</a>
	</div>
</div>
<script>
    function rem_item(_this){
        _this.closest('tr').remove()
        calculate_total();
    }
    function calculate_total(){
        var total = 0 ;
        $('#fine-list input[name="fine[]"]').each(function(){
            var fine = $(this).val()
            total += parseFloat(fine)
        })
        $('#total_amount').text(parseFloat(total).toLocaleString('en-US'))
        $('input[name="total_amount"]').val(parseFloat(total))
    }
	$(document).ready(function(){
        
       
        $('.select2').select2({placeholder:"Please Select here",width:"relative"})
        $('#add_to_list').click(function(){
            var offense_id =  $('#offense_id').val()
            var fine =  $('#offense_id option[value="'+offense_id+'"]').attr('data-fine')
            var offense =  $('#offense_id option[value="'+offense_id+'"]').attr('data-name')
            var code =  $('#offense_id option[value="'+offense_id+'"]').attr('data-code')
            var tr = $("<tr>")
            tr.append('<td>'+code+'<input type="hidden" name="offense_id[]" value="'+offense_id+'"><input type="hidden" name="fine[]" value="'+fine+'"></td>');
            tr.append('<td>'+offense+'</td>');
            tr.append('<td class="text-right">'+(parseFloat(fine).toLocaleString('en-US'))+'</td>');
            tr.append('<td><button class="btn  btn-sm btn-default text-danger" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button></td>');
            $('#fine-list tbody').append(tr)
            if($('#td-none').length > 0)
             $('#td-none').remove();
             calculate_total();
             $('#offense_id').val('').trigger('change')
        })
       
		$('#offense-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
            if($('[name="offense_id[]"]').length <= 0)
            {
                alert_toast('Please add atleast 1 offense item first','warning')
                end_loader();
                return false;
            }
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_offense_record",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
                        end_loader();
                        uni_modal("<i class='fa fa-ticket'></i> Driver's Offense Ticket Details","offenses/view_details.php?id="+resp.id,'mid-large')
                        setTimeout(() => {
                            end_loader();
                        }, 500);
                        $('#uni_modal').on('hide.bs.modal',function(e){
                            location.href="./?page=offenses";
                        })
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>

<!-- <?php
// Check if the form is submitted
if(isset($_POST['save'])) {

    // Get the form data
    $id = $_POST['id'];
    $date_created = date("Y-m-d H:i:s", strtotime($_POST['date_created']));
    $ticket_no = $_POST['ticket_no'];
    $vehicles_no = $_POST['vehicles_no'];
    $officer_id = $_POST['officer_id'];
    $officer_name = $_POST['officer_name'];
    $ViolatorName=$_POST['violator_name'];
    $status = $_POST['status'];
    $offense = $_POST['offense_list'];

    // Save the data to the database
    $sql = "INSERT INTO `offense` (`Date`, `OffenseID`, `VehicleNumber`, `OfficierID`, `OfficerName`, `ViolatorName`, `Status`, `OffenseType`, `Amount`) VALUES ";
    foreach ($offense_list as $offense) {
        $sql .= "('$date_created', '$ticket_no', '$vehicles_no', '$officer_id', '$officer_name', '$ViolatorName', '$status', '".$offense['name']."', ".$offense['fine']."),";
    }
    $sql = rtrim($sql, ",");
    if ($conn->query($sql)) {
        $message = "Offense data inserted successfully";
        // header('location: offenses/index.php');
        exit;
    } else {
        $message = "Error inserting offense data: " . $conn->error;
    }
     
}

// Check if the form is canceled
if(isset($_POST['cancel'])) {

    // Redirect to the offense list page
    header('location: index.php');
    exit;
}
?>


 </form>
	 -->