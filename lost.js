$(document).ready(function() {
    $("#vehiclenumber").on("blur", function() {
      var vehicle_number = $(this).val();
      $.ajax({
        url: "vehicleDetails.php",// URL of the PHP script to retrieve the related data
        method: "GET",
        data: { vehiclenumber: vehicle_number },
        success: function(data) {
          var parts = data.split(",");
          $("#vehiclemodel").val(parts[0]); // Populate the owner_name input field with the retrieved data
          $("#enginenumber").val(parts[1]); // Populate the model input field with the retrieved data
          $("#chasisnumber").val(parts[2]); 
          $("#Dname").val(parts[3]); // Populate the owner_name input field with the retrieved data
          $("#Daddress").val(parts[4]); // Populate the model input field with the retrieved data
          $("#Rowner").val(parts[5]); 
          $("#Raddress").val(parts[6]); // Populate the model input field with the retrieved data
          $("#color").val(parts[7]); 
        }
      });
    })
  });$(document).ready(function() {
    $("#registration-form").submit(function(event) {
      // Prevent form submission from refreshing the page
      event.preventDefault();
  
      // Retrieve form values
      var vehicle_number = $("#vehiclenumber").val();
      var vehicle_model = $("#vehiclemodel").val();
      var engine_number = $("#enginenumber").val();
      var chassis_number = $("#chasisnumber").val();
      var dealer_name = $("#Dname").val();
      var dealer_address = $("#Daddress").val();
      var registered_owner = $("#Rowner").val();
      var registered_address = $("#Raddress").val();
      var color = $("#color").val();
  
      // Send AJAX request to register the vehicle
      $.ajax({
        url: "registerVehicle.php",
        method: "POST",
        data: {
          vehiclenumber: vehicle_number,
          vehiclemodel: vehicle_model,
          enginenumber: engine_number,
          chasisnumber: chassis_number,
          dealername: dealer_name,
          dealeraddress: dealer_address,
          registeredowner: registered_owner,
          registeredaddress: registered_address,
          color: color
        },
        success: function(data) {
          // Display registration message
          $("#registration-message").text(data);
        }
      });
    });
  });
  