<!DOCTYPE html>
<html>
<head>
    <title>Manage Treatments</title>
    <link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print"/>
</head>
<body>
    <header>
        <h1>Manage Treatments</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="AddTreatment.html">Add Treatment</a></li>
            <li><a href="AddService.html">Add Service</a></li>
            <li><a href="ManageService.html">Manage Services</a></li>
            <li><a href="ManageTreatment.html">Manage Treatments</a></li>
        </ul>
    </nav>

    <section>
        <h2>Manage Treatments</h2>
        <form method="post" action="manage_treatments.php">
            <label for="treatment_name">Filter by Treatment Name:</label>
            <input type="text" id="treatment_name" name="treatment_name" />
            <input type="submit" value="Filter">
        </form>
    <p>
        <?php
        include "data_handler.php";
        $dh = new DataHandler();

        $results = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['treatment_name'])) {
            $treatment_name = $_POST['treatment_name'];
            $results = $dh->sp_get_treatments_by_name($treatment_name);
        } else {
            $results = $dh->sp_get_all_treatments();
        }

        if (!empty($results)) {
            echo "<table class='fullborder'>
                    <tr>
                        <th>Treatment ID</th>
                        <th>Treatment Name</th>
                        <th>Category</th>
                        <th>Cost_Regular_Body_Type</th>
                        <th>Cost_Abnormal_Body_Type</th>
                    </tr>";

            foreach ($results as $row) {
                echo "<tr>
                        <td>{$row['Treatment_ID']}</td>
                        <td>{$row['Treatment_Name']}</td>
                        <td>{$row['Category']}</td>
                        <td>{$row['Cost_Regular_Body_Type']}</td>
                        <td>{$row['Cost_Abnormal_Body_Type']}</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
        ?>
    </section>
    <footer>
        Hanjoline Julceus <br/> &copy; 2025
    </footer>
    </p>
</body>
</html>
