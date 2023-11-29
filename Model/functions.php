<?php
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