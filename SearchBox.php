<?php
include "Database.php";
session_start();

$branchLoc = isset($_GET['branchLoc']) ? $_GET['branchLoc'] : 'None';
$result = null;

// Fetch data based on selected location
if ($branchLoc != 'None') {
    $stmt = $conn->prepare("SELECT restaurant.Name 
    FROM restaurant
    INNER JOIN branch ON restaurant.R_ID = branch.R_ID 
    WHERE branch.branch_loc = ?");
    $stmt->bind_param("s", $branchLoc);
    $stmt->execute();
    $result = $stmt->get_result();
}

$branchQuery = "SELECT DISTINCT branch_loc FROM branch";
$branchResult = $conn->query($branchQuery);

//$selectedLocation = isset($_GET['branchLoc']) ? $_GET['branchLoc'] : 'None';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Search Engine</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            /* padding-top: 100px;/ */
        }
        .search-box {
            width: 800px;
            margin: 0 auto;
        }
        .logo {
            font-size: 64px;
            font-weight: bold;
            color: #4285f4;
            font-family: "Barlow Condensed", serif;
        }
        .search-form {
            margin-top: 20px;
        }
        input[type="text"] {
            width: 60%;
            padding: 15px;
            font-size: 18px;
            border: 1px solid #dfe1e5;
            border-radius: 24px;
            outline: none;
            box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background: #4285f4;
            border: none;
            border-radius: 24px;
            cursor: pointer;
            margin-left: 10px;
        }
        input[type="submit"]:hover {
            background: #357ae8;
        }
        .results {
            margin-top: 40px;
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
        }
        .result-item {
            background: white;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
        }
        .result-item a {
            color: #1a0dab;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }
        .result-item .url {
            color: #006621;
            font-size: 14px;
            margin: 4px 0;
        }

        select {
            width: 60%;
            padding: 15px;
            font-size: 18px;
            border: 1px solid #dfe1e5;
            border-radius: 24px;
            outline: none;
            box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
        }
    </style>
</head>
<body>
<div class="search-box">
    <div class="logo">DroneDine</div>
    <form class="search-form" method="GET" action="">
        <br>
        <select name="branchLoc" id="branchLoc">
            <option value="None" >None</option>
            <?php if ($branchResult->num_rows > 0): ?>
                <?php while ($row = $branchResult->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($row['branch_loc']); ?>">
                        <?= htmlspecialchars($row['branch_loc']); ?>
                    </option>
                <?php endwhile; ?>
            <?php endif; ?>
            
        </select>
        <input type="submit" value="Search">
    </form>

    <div class="locations">
        <?php if ($result): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="result-item">
                    <a href="page.php">    <?php echo htmlspecialchars($row["Name"]); ?>      </a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>