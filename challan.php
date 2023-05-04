<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="challan.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <title>Offense Detail </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>
  <div class="Father">
  <div class="container">
    <div class="logo">
      <img src="images/nepal.png">
    </div>
    <div class="content">
      <h1>Nepal Traffic Management</h1>
      <h2>Invoice</h2>
      <p class="detail">
        <marquee behavior="" direction="" >In view of the management of the internal work of the country after the 2007 political change in Nepal.</marquee> 
      </p>
      
    </div>
    <div class="flag">
      <img src="images/flag.png">
    </div>
  </div>
  <?php
  $invoice_number = uniqid();
  ?>

  <div class="content">
    <div class="Details">
      <table>
      <tr>
        <th>Vehicle Number</th>
        <td><?php echo $_POST['VehicleNumber']?></td>
      </tr>
      <tr>
        <th>Invoice Number</th>
        <td><?php echo $invoice_number;?></td>
      </tr>
      <tr>
        <th>Offense ID</th>
        <td><?php echo $_POST["OffenseID"]; ?></td>
      </tr>
      <tr>
        <th>Officer Name</th>
        <td><?php echo $_POST["OfficerName"]; ?></td>
      </tr>
      <tr>
        <th>Name</th>
        <td><?php echo $_POST["Name"]; ?></td>
      </tr>
    </table>
  
  </div>

  <h3>Offense Detail</h3>
    

    <table>
      <thead>
        <tr>
          <th>Time</th>
          <th>Reason</th>
          <th>Detail</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $_POST["IssuedDate"]; ?></td>
          <td><?php echo $_POST["Offense"]; ?></td>
          <td>Violation of traffic rules. Act 108</td>
          <td><?php echo $_POST["TotalCharge"]; ?></td>
        </tr>
      </tbody>
    </table>

    <p>Driving is on the left in Nepal. Left turns are allowed without stopping. 
      Vehicles already on a roundabout must give way to vehicles entering the roundabout. 
      People from all walks of life are affected by Kathmandu’s long, tedious and suffocating traffic hassles. 
      Wherever you go, you are greeted with a large number of vehicles standing in queue, causing problems for pedestrians to cross the road.
    </p>
    <div class="lastcontent">
    For more details contact: </br>
    Nepal Transport Department</br>
    Kathmandu, Chabel , Nepal</br>
  </div>
  <div class="Footer">
  <button type="button" class="btn btn-primary" ><i class="fa-sharp fa-solid fa-print"></i>Print</button>
  <button type="button" id= "payment-button" class="btn btn-success"><i class="fa-duotone fa-money-bill-1"></i>Payment</button>
  <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_62f23974083e4e0a9bf0c644804bc217",
            "productIdentity": "<?php echo $invoice_number; ?>",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>


  </div>

  </div>


</div>
  
  
  
</body>
</html>