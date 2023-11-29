<?php
include __DIR__ . '/Model/db.php';
include __DIR__ . '/Model/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>
    <h1 class="text-center text-bg-danger">PHP HOTEL</h1>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <form method="GET" action="index.php">
                    <div class="input-group mt-4">
                        <label for="parking"></label>
                        <span class="input-group-text">Parcheggio</span>
                        <select class="form-control" id="parking" name="parking">
                            <option value="">Tutti</option>
                            <option value="1">Sì</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="input-group mt-4">
                        <label for="min_vote"></label>
                        <span class="input-group-text">Voto</span>
                        <input type="number" class="form-control" id="min_vote" name="min_vote" min="1" max="5">
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">Filtra</button>
                </form>
                <table class="table mt-4">
                    <thead>
                        <tr class="table-danger">
                            <th>Nome</th>
                            <th>Descrizione</th>
                            <th>Parcheggio</th>
                            <th>Voto</th>
                            <th>Distanza dal Centro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filteredHotels as $hotel) { ?>
                            <tr class="table-light">
                                <td><?php echo $hotel['name'] ?></td>
                                <td><?php echo $hotel['description'] ?></td>
                                <td><?php echo $hotel['parking'] ? 'Sì' : 'No' ?></td>
                                <td><?php echo $hotel['vote'] ?></td>
                                <td><?php echo $hotel['distance_to_center'] ?> km</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>