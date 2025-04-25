<?php
include 'db.php';

// Sanitize input
$query = isset($_GET['query']) ? $con->real_escape_string($_GET['query']) : '';

// Show the search term
echo "<h4>Search Term: " . htmlspecialchars($query) . "</h4>";

// SQL query (case-insensitive using LOWER)
$sql = "SELECT * FROM categories WHERE name LIKE LOWER('%$query%') OR Category LIKE LOWER('%$query%')";
$result = $con->query($sql);

// Check for SQL errors
if (!$result) {
    echo "<p>Query Error: " . $con->error . "</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="css/search.css">  <!-- Link to external CSS -->
</head>
<body>
    <header>
        <div class="logo">
            DishCraft
            <div class="slogan">...Where Recipes Come to Life...</div>
        </div>
    </header>
    <style>
         .btn-back {
                    display: inline-block;
                    align-item: center;
                    margin-top: 20px;
                    padding: 10px 20px;
                    background-color:rgb(4, 124, 8);
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                }
                .btn-back:hover {
                    background-color: #45a049;
                }
                </style>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="container">
            <div class="card">
                <div class="content">
                    <h3>' . htmlspecialchars($row['Category']) . '</h3>
                    <h4>' . htmlspecialchars($row['name']) . '</h4>
                </div>
                <div class="card-image" style="background-image: url(' . htmlspecialchars($row['image']) . ');"></div>

                <div class="introduction">
                    <div class="ingredients">
                        <h4>Ingredients</h4>
                        <p>' . nl2br(htmlspecialchars($row['Ingredients'])) . '</p>
                    </div>

                    <div class="instructions">
                        <h4>Instructions</h4>
                        <p>' . nl2br(htmlspecialchars($row['Instructions'])) . '</p>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
} else {
    echo "<p>No results found.</p>";
}
?>
            <a href="recipes.html" class="btn-back">Back to Home</a>

</body>
</html>

<?php
$con->close();
?>
