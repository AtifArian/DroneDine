<?php
include "Database.php";
session_start();

$branchLoc = isset($_GET['branchLoc']) ? $_GET['branchLoc'] : 'None';
$result = null;

if ($branchLoc != 'None') {
    $query =
            ("SELECT restaurant.R_ID as rid, restaurant.Name as rname
            FROM restaurant
            INNER JOIN branch ON restaurant.R_ID = branch.R_ID
            WHERE branch.branch_loc = ?");
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $branchLoc);
    $stmt->execute();
    $result = $stmt->get_result();

}

$branchQuery = "SELECT DISTINCT Branch_loc as loc FROM branch";
$branchResult = $conn->query($branchQuery);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Search Engine</title>
    <link rel="stylesheet" href="sb.css"/>
</head>
<body>
<form class="log" action="logout.php">
        <button class="out">
            Log Out
        </button>        
</form>
<div class="search-box">
    <div class="logo">DroneDine</div><br><br>
    <label class="locbox">Select Location</label>
    <form class="search-form" method="GET" action="">
        <br>
        <select name="branchLoc" id="branchLoc">
            <option value="None" >None</option>
            <?php
                if ($branchResult->num_rows > 0):
                    while ($row = $branchResult->fetch_assoc()):?>
                    <option value="<?= htmlspecialchars($row['loc'])?>">
                        <?= htmlspecialchars($row['loc']); ?>
                    </option>
                    <?php endwhile; ?>
                <?php endif; ?>   
        </select>
        <input type="submit" value="Search">
    </form>
    <br><br>
    <div class="locations">
        <?php if ($result): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="result-item">
                <a href="check2.php?r_id=<?php echo htmlspecialchars($row['rid']);?>&rname=<?php echo htmlspecialchars($row['rname']); ?>">
                <?php echo htmlspecialchars($row['rname']); ?>
                </a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    
</div>
</body>
</html>