<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$filteredHotels = $hotels;
if (isset($_GET['parking'])) {
    $filteredHotels = array_filter($filteredHotels, function ($hotel) {
        return $hotel['parking'] == $_GET['parking'];
    });
}
if (isset($_GET['min_vote'])) {
    $filteredHotels = array_filter($filteredHotels, function ($hotel) {
        return $hotel['vote'] >= $_GET['min_vote'];
    });
}
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
                            <option value="">All</option>
                            <option value="1">Yes</option>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Parking</th>
                            <th>Vote</th>
                            <th>Distance to Center</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filteredHotels as $hotel) { ?>
                            <tr class="table-light">
                                <td><?php echo $hotel['name'] ?></td>
                                <td><?php echo $hotel['description'] ?></td>
                                <td><?php echo $hotel['parking'] ? 'Yes' : 'No' ?></td>
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