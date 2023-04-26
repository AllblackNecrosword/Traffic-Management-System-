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
</head>
<body>
    <?php
    include'files/conn.php';
    if(isset($_POST['register'])) {
        // Get form data
        $documentType = $_POST["vehicle"];
        $description = $_POST["Dname"];
        $lostDate = $_POST["Daddress"];
        $lostLocation = $_POST["Rowner"];

        // Insert data into the database
        $sql = "INSERT INTO lost_document (DocumentType, Description, Date, Location) VALUES ('$documentType', '$description', '$lostDate', '$lostLocation')";
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
    mysqli_close($conn);
    ?>
  <header>
    <div class="main">
        <nav>
            <!-- <h1>Logo</h1> -->
            <img class="logo" src="images/viber_image_2023-03-16_10-13-00-055.png">
            <ul>
                <li><button class="btn"> Home
                </button></li>

                <li><button class="btn"> Services
                </button></li>
                <li><button class="btn"> About us
                </button></li>
                <!-- <li><a href="#">Contact Us</a></li> -->
                <li><button class="btn"> News
                </button></li>
            </ul>
        </nav>
    </div>
</header>


  <div class="boddy">
  <div class="container">
    <form action="" method="post">
      <h2>Lost Vechicle Application</h2>
      <div class="content">

        <div class="input-box">
        <label for="vehicle">Document Type</label>
      <select name="vehicle" id="vehicle">
      <option value="Twowheelers"> License</option>
      <option value="Threewheelers">BlueBook</option>
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
        <p>By clicking Register, you agree to our Terms, Privacy Policy and Cookies Ploicy.</p>
      </div>
      <!-- <div class="button-container">
        <button type="submit">Register</button>
      </div> -->
      <button class="learn-more" name="register">
        <span class="circle" aria-hidden="true">
        <span class="icon arrow"></span>
        </span>
        <span class="btn-log">Register</span>
      </button>

    </form>
  </div>
</div>
</body>
</html>