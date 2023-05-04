<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="css/payment.css">
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<?php
$invoice_number = uniqid();
?>




<div class="paper">
    <div class="header">
	<img class="logo" src="images/full-logo.png">
	<!-- <div>Smart Traffic Optimization and Parenting System</div> <br> -->
    <div><?php echo date("F j, Y, g:i a"); ?></div>   
    </div>
    <div class="address">
        Bhagwati Marg, Naxal<br>
        P86J+W8X, Kathmandu 44600<br>
        Phone: 555-123-4567<br>
        Email: info@smarttraffic.com
    </div>
    <table>
	<tr>
            <th>Invoice Number</th>
            <td><?php echo $invoice_number; ?></td>
        </tr>
        <tr>
            <th>Offense ID</th>
            <td><?php echo $_POST["OffenseID"]; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $_POST["Name"]; ?></td>
        </tr>
        <tr>
            <th>Officer</th>
            <td><?php echo $_POST["OfficerName"]; ?></td>
        </tr>
        <tr>
            <th>Vehicle Number</th>
            <td><?php echo $_POST["VehicleNumber"]; ?></td>
        </tr>
        <tr>
            <th>Offense</th>
            <td><?php echo $_POST["Offense"]; ?></td>
        </tr>
        <tr>
            <th>Total Charge</th>
            <td><?php echo $_POST["TotalCharge"]; ?></td>
        </tr>
        <tr>
            <th>Issued Date</th>
            <td><?php echo $_POST["IssuedDate"]; ?></td>
        </tr>
        <tr class="total">
            <th>Total:</th>
            <td><?php echo $_POST["TotalCharge"]; ?></td>
        </tr>
    </table>

	<div class="payment">
    <button id="payment-button" class="khalti-button">Pay with Khalti</button>
</div>

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
</html>