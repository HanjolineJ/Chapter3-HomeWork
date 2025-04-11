<!DOCTYPE html>
<html>
<head>
    <title>Manage Services</title>
    <link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print" />
</head>
<body>
    <h1>Manage Services</h1>

    <!-- Search Form -->
    <div>
        <form method="post" action="manage_services.php">
            <label for="category">Search by Category:</label>
            <input type="text" id="category" name="category" required/><br/>
            <input type="submit" value="Search">
        </form>
    </div>

    <!-- build dynamic table -->
    <p>
        <?php
            include "data_handler.php";
            $dh = new DataHandler();

            $results = [];

            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['category'])) {
                $category = $_POST['category']; // search term name that matches the label/input
                $results = $dh->sp_get_services_by_category($category); // data handler method
            } else {
                $results = $dh->sp_get_all_services(); // show all by default
            }

            // Build table if results exist
            if (!empty($results)) {
                echo "<table class='fullborder'>
                        <tr>
                            <th>Service ID</th>
                            <th>Service Name</th>
                            <th>Category</th>
                            <th>Service Price</th>
                            <th>Service Type</th>
                            <th>Description</th>
                        </tr>";

                foreach ($results as $row) {
                    echo "<tr>
                            <td>{$row['Service_ID']}</td>
                            <td>{$row['Service_Name']}</td>
                            <td>{$row['Category']}</td>
                            <td>{$row['Service_Price']}</td>
                            <td>{$row['Service_Type']}</td>
                            <td>{$row['Description']}</td>
                          </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No results found.</p>";
            }
        ?>
    </p>
</body>
</html>
