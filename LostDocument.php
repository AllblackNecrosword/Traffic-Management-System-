<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/document.css">
    <!-- <script src="js/script.js"></script> -->
</head>

<body>
    <?php
    include 'files/conn.php';

    if (isset($_POST['register'])) {
        // Get form data
        $documentType = $_POST["vehicle"];
        $description = $_POST["Dname"];
        $lostDate = $_POST["Daddress"];
        $lostLocation = $_POST["Rowner"];

        // Insert data into the database
        $sql = "INSERT INTO lost_document (DocumentType, Description, Date, Location) VALUES ('$documentType', '$description', '$lostDate', '$lostLocation')";
        if ($conn->query($sql) === TRUE) {
            // Display the popup message
            echo '<script src="index_2.js"></script>';


            $title = 'Lost Vehicle Form';
            $message = "A new lost document for $documentType has been registered.";
            $stmt2 = $conn->prepare('INSERT INTO notification (Title, `Message`) VALUES (?, ?)');
            $stmt2->bind_param('ss', $title, $message);
            $stmt2->execute();
            $stmt2->close();

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>

    <header>
        <div class="main">
            <?php include 'nav.php'; ?>
        </div>
    </header>

    <div class="boddy">
        <div class="container">
            <form action="" method="post">
                <h2>Lost Document Application</h2>
                <div class="content">
                    <div class="input-box">
                        <label for="vehicle">Document Type</label>
                        <select name="vehicle" id="vehicle">
                            <option value="License"> License</option>
                            <option value="Bluebook">BlueBook</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <label for="Dname">Description</label>
                        <input type="text" placeholder="Enter Description" name="Dname" required>
                    </div>

                    <div class="input-box">
                        <label for="Daddress">Lost date</label>
                        <input type="date" placeholder="Enter date" name="Daddress" required>
                    </div>

                    <div class="input-box">
                        <label for="Rowner">Lost Location</label>
                        <input type="text" placeholder="Enter Location" name="Rowner" required>
                    </div>
                </div>

                <div class="alert">
                    <p>By clicking Register, you agree to our Terms, Privacy Policy and Cookies Policy.</p>
                </div>

                <button class="learn-more" name="register">
                    <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Register</span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>