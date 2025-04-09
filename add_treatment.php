<!DOCTYPE html>
<html>
<head>
    <title>Add Treatment</title>
    <link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print" />
</head>
<body>
    <h1>Add a New Treatment</h1>

    <!-- Add Treatment Form -->
    <form method="post" action="add_treatment.php">
        <label>Treatment Name:</label><br>
        <input type="text" name="treatment_name" required/><br/>

        <label>Category:</label><br>
        <input type="text" name="category" required/><br/>

        <label>Insurance Cost:</label><br>
        <input type="text" name="insurance_cost" required/><br/>

        <label>Out-of-Pocket Cost:</label><br>
        <input type="text" name="out_of_pocket_cost" required/><br/>

        <input type="submit" value="Add Treatment">
    </form>

    <!-- PHP Insert Logic -->
    <p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include "data_handler.php";
            $dh = new DataHandler();

            // Grab form data
            $treatment_name = $_POST['treatment_name'];
            $category = $_POST['category'];
            $insurance_cost = $_POST['insurance_cost'];
            $out_of_pocket_cost = $_POST['out_of_pocket_cost'];

            // Call the function
            $message = $dh->add_treatment($treatment_name, $category, $insurance_cost, $out_of_pocket_cost);

            echo $message;
        }
        ?>
    </p>
</body>
</html>
