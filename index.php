<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => 'true',
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => 'true',
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => 'false',
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => 'false',
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => 'true',
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

var_dump($_GET);

if (empty($_GET)) {
    $hotels;
} else {
    $filtered_array = [];

    foreach ($hotels as $hotel) {
        if ($_GET['parking'] === $hotel['parking']) {
            $filtered_array[] = $hotel;
        }
    }

    $hotels = $filtered_array;

    var_dump($hotels);
}





?>

<!-- 
    Bonus: 1
     - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
     - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .table-responsive {
            max-width: 1200px;
            margin: 1rem auto;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Hotels</h1>
    <form action="index.php" method="get">
        <div>
            <label for="parking">Parking:</label>
            <select name="parking" id="parking">
                <option value="" disabled='disabled' selected>Choose an option</option>
                <option value=true>Yes</option>
                <option value=false>No</option>
            </select>
        </div>
        <div>
            <label for="vote">Vote:</label>
            <select name="vote" id="vote">
                <option value="" disabled='disabled' selected>Choose a vote</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <button type='submit'>Submit</button>
    </form>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to Center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) : ?>
                    <tr class="">
                        <td scope="row"><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>

                        <?php if ($hotel['parking'] === 'true') : ?>
                            <td><?php echo 'Yes' ?></td>
                        <?php else : ?>
                            <td><?php echo 'No' ?></td>
                        <? endif ?>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>