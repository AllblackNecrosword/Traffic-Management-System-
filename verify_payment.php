<?php
// Replace with your own values
$khalti_public_key = 'test_public_key_62f23974083e4e0a9bf0c644804bc217';
$khalti_secret_key = 'test_secret_key_fdaa78917e8d4cab8866a694d9393e2e';

if(isset($_POST['token']) && isset($_POST['amount']) && isset($_POST['offense_id'])){
    $offense_id = intval($_POST['offense_id']);

    // Verify payment with Khalti API
    $args = http_build_query(array(
        'token' => $_POST['token'],
        'amount'  => $_POST['amount']
    ));

    $url = "https://khalti.com/api/v2/payment/verify/";

    # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = ['Authorization: Key ' . $khalti_secret_key];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Response
    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Parse the response JSON
    $response_json = json_decode($response, true);

    // Check if payment is verified
    if ($status_code == 200 && $response_json['state']['name'] == 'Completed') {
        // Update the status column of the offense table to 'paid'
        include 'files/conn.php';
        $stmt = $conn->prepare('UPDATE offense SET status = "paid" WHERE ticket_no = ?');
        $stmt->bind_param('i', $offense_id);
        $stmt->execute();
        $stmt->close();

        // Insert notification to the notification table
        $title = 'Offense Payment';
        $message = "Offense has been paid for ticket number $offense_id.";
        $stmt2 = $conn->prepare('INSERT INTO notification (Title, Message) VALUES (?, ?)');
        $stmt2->bind_param('ss', $title, $message);
        $stmt2->execute();
        $stmt2->close();
        $conn->close();

        echo 'Payment verified and status updated successfully.';
        echo '<script>Payment done successfully</script>';
        echo '<script>window.location.href = "landing.php";</script>';

        
        exit();

    } else {
        echo 'Payment verification failed.';
    }
}
?>
