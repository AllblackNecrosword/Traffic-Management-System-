<?php
include_once 'classes/DBConnection.php';

if (isset($_POST['delete_btn_set'])){
    $del_id = $_POST['delete_id'];

    $delete_query = "DELETE FROM registered_vehicle WHERE Vehicle_Number ='$del_id'";
    $delete_query_run = mysqli_query($conn,$delete_query);

}
?>
