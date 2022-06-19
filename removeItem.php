<?php
include('include/dbconnector.inc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $query = "DELETE FROM items WHERE id = {$_POST['id']};";

        $stmt = $mysqli->prepare($query);

        $stmt->execute();

        $stmt->close();
    }
}

echo "<script>
 window.onload = function() {
     window.location.href = 'index.php';
 }
</script>";
