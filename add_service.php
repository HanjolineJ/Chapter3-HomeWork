<!DOCTYPE html>
<html>
<head>
    <title>Add Service</title>
    <link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print" />
</head>
<body>
    <h1>Add a New Service</h1>

    <!-- Add Service Form -->
    <form method="post" action="add_service.php">
        <label>Service Name:</label><br>
        <input type="text" name="service_name" required/><br/>

        <label>Category:</label><br>
        <input type="text" name="category" required/><br/>
        <label>Service Price:</label><br>
        <input type="text" name="service_price" required/><br/>

        <label>Service Type:</label><br>
        <input type="text" name="service_type" required/><br/>

        <label>Description:</label><br>
        <input type="text" name="description" required/><br/>

        <input type="submit" value="Add Service">
    </form>

    <!-- PHP Insertion Logic -->
    <p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include "data_handler.php";
            $dh = new DataHandler();

            // Grab form data
            $service_name = $_POST['service_name'];
            $category = $_POST['category'];
            $service_price = $_POST['service_price'];
            $service_type = $_POST['service_type'];
            $description = $_POST['description'];

            // Call your add_service() function from the data handler
            $message = $dh->add_service($service_name, $category, $service_price, $service_type, $description);

            echo $message;
        }
        ?>
    </p>
</body>
</html>
