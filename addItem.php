<?php
include('include/dbconnector.inc.php');
$error = '';
$message = '';
$product = $owner = $place = $serialNumber = '';
$defect = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product'])) {
        $product = htmlspecialchars(trim($_POST['product']));

        if (empty($product) || strlen($product) > 90) {
            $error .= "Invalid product name. ";
        }
    } else {
        $error .= "Invalid product name";
    }
    if (isset($_POST['owner'])) {
        $owner = htmlspecialchars(trim($_POST['owner']));

        if (empty($owner) || strlen($owner) > 80) {
            $error .= "Invalid owner. ";
        }
    } else {
        $error .= "Invalid owner";
    }
    if (isset($_POST['place'])) {
        $place = htmlspecialchars(trim($_POST['place']));

        if (empty($place) || strlen($place) > 180) {
            $error .= "Invalid place. ";
        }
    } else {
        $error .= "Invalid place";
    }

    if (isset($_POST['defect']) && is_numeric($_POST['defect'])) {
        $defect = 1;
    } else {
        $defect = 0;
    }
    if (isset($_POST['serialNumber'])) {
        $serialNumber = htmlspecialchars(trim($_POST['serialNumber']));

        if (empty($serialNumber) || strlen($serialNumber) > 9999999999999999999999999) {
            $error .= "Invalid serialnumber. ";
        }
    } else {
        $error .= "Invalid serialnumber";
    }

    if (empty($error)) {
        $query = "INSERT INTO `items` (`product`, `serialNumber`, `owner`, `place`, `defect`) VALUES (?, ?, ?, ?, ?);";

        $stmt = $mysqli->prepare($query);
        if ($stmt === false) {
            $error .= 'prepare() failed ' . $mysqli->error . '<br />';
        }

        if (!$stmt->bind_param('sissi', $product, $serialNumber, $owner, $place, $defect)) {
            $error .= 'bind_param() failed ' . $mysqli->error . '<br />';
        }

        $stmt->execute();

        $stmt->close();


        echo "<script>
            window.onload = function() {
            window.location.href = 'http://localhost/m254';
           }
            </script>";
    }
    if (!empty($error)) {
        echo "<script>
             window.onload = function() {
             window.location.href = 'http://localhost/m254/index.php?err=" . $error . "';
            }
            </script>";
    }
} else {
    echo "<script>
             window.onload = function() {
             window.location.href = 'http://localhost/m254/index.php';
            }
            </script>";
}
