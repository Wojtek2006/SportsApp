<?php

session_start();

require_once('database.php');

$conn = connect($servername, $username, $password, $database);

$tours = $_SESSION['Tours'];

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyniki</title>
</head>
<body>

<?php for($i = 1; $i <= $tours; $i++): ?>

<?php $result = calculateResults($conn, $i); ?>

<table>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= getContenderInfo($conn, $row['ContenderID']) ?></td>
    <td><?= $row['Score'] ?></td>
    <td><?= $row['Tour'] ?></td>
</tr>
<?php endwhile ?>
</table>    
<?php endfor ?>

</body>
</html>