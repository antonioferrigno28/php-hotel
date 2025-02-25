<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container my-3">
    <form action="" method="GET">
        <div>
            <label for="parcheggio">Vuoi un hotel con parcheggio?</label>
            <input type="checkbox" name="parcheggio">
        </div>
        <div>
            <label for="parcheggio" class="me-5">Vuoi vedere un hotel con una votazione in particolare?</label>
            <input type="number" name="voto" min="1" max="5">
        </div>
        <button type="submit">Daje</button>
    </form>

    <h1 class="text-primary my-3 text-center">Lista degli hotel</h1>
    
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


$searching_parking = false;
$searching_vote = 0;


if(isset($_GET['parcheggio'])) {
    $searching_parking = true;
};

if(isset($_GET['voto'])) {
    $searching_vote = $_GET['voto'];
    var_dump($searching_vote);
}

foreach ($hotels as $hotel) { 
    if($searching_parking) {
        if($hotel['parking'] != true) continue;
    }

    if($searching_vote) {
        if($hotel['vote'] < $searching_vote) continue;
    
    }
    echo "<div class='card my-2 p-2 mx-auto bg-primary'>";
         
    foreach ($hotel as $key => $value) {
        
        if ($key === "parking") {
            echo "<p class='text-light'><strong>" . $key . " : " . ($value ? 'Disponibile' : 'Non disponibile') . "</strong></p>";
        } else {
            echo "<p class='text-light'><strong>" . $key . " : " . $value . "</strong></p>";
        }
    }

    echo "</div>";
}


?>

    </div>
</body>
</html>
