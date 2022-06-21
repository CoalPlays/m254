<?php

//Datenbank verbinden
include('include/dbconnector.inc.php');

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventur</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/aa92474866.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
        .bgimg {
            background-image: url('images/background.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>

</head>

<body>
    <?php include('include/addItemModal.php'); ?>


    <?php include('include/nav.php'); ?>

    <div class="text-center bgimg">
        <div class="row py-lg-5 mx-auto">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Inventur</h1>
                <p style="margin-bottom: 400px;" class="lead text">Alles auf einem Blick</p>
            </div>
        </div>
    </div>
       
    <div class="album py-4 bg-light">
        <div class="d-flex justify-content-center">
            <a style="margin: 10px;" href="" class="btn btn-warning my-2" data-toggle="modal" data-target="#modalAddItem">Add item</a>
        </div>
        <div class="container">
            <div id="schedule" class="table-responsive">
                <table class="table w-75 mx-auto table-bordered table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Produkt</th>
                            <th>Seriennummer</th>
                            <th>Besitzer</th>
                            <th>Ort</th>
                            <th>Defekt</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php
                        $query = "SELECT * FROM items";

                        $stmt = $mysqli->prepare($query);

                        $stmt->execute();

                        $result = $stmt->get_result();

                        foreach ($result as $value) {
                            echo "<tr>
                                <td>", $value['id'], "</td>
                                <td>", $value['product'], "</td>
                                <td>", $value['serialNumber'], "</td>
                                <td>", $value['owner'], "</td>
                                <td>", $value['place'], "</td>
                                <td>";
                            if ($value['defect'] == 0) echo "Nein";
                            else echo "Ja";
                            echo "</td>
                            <td> <form action='removeItem.php' method='post'>
                            <input type='number' value='", $value['id'],"' name='id' hidden>
                            <input type='image' class='btn btn-danger' src='images/trash-can-solid.svg' alt='Submit' width='40' height='40'>
                        </form></td>
                            </tr>";
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <?php
    if (isset($_GET['err'])) {
        echo "<script>alert('", $_GET['err'],"')</script>";
    }
    ?>
</body>


</html>