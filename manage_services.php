<!DOCTYPE html>
<html>
	<head>
		<title> Manage Services</title>
		<link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print">
	</head>
	<body>
		<header>
            <h1>
				Manage Services
			</h1>
		</header>
		<nav>
           <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="add_treatment.php">Add Treatment</a></li>
        <li><a href="manage_treatments.php">Manage Treatment</a></li>
        <li><a href="manage_services.php">Manage Services</a></li>
        <li><a href="add_service.php">Add Service</a></li>
           </ul>
        </nav>
		<section>
            <h2>Manage Services</h2>
    <!-- Search Form -->
        <form method="post" action="manage_services.php" class="formbox">
            <label for="category">Search by Category:</label>
            <input type="text" id="category" name="category"/><br/>
            <input type="submit" value="Search">
        </form>
    <p>
        <?php
            include "data_handler.php";
            $dh = new DataHandler();

            $results = [];

            if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                $category = $_POST['category']; // search term name that matches the label/input
                $results = $dh->sp_get_services_by_category($category); // data handler method
            

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
        }
        ?>
	</section>
	<footer>
			Hanjoline Julceus <br/> &copy; 2025
	</footer>
</body>
</html>