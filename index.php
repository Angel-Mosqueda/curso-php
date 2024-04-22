<?php
const API_URL="https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesion de cURL; ch = cURL handle 
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultadod e la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutra la peticion 
y guardamos el resultado*/
$result = curl_exec($ch);

// una alternativa seria utilizar file_get_contents
//$result = file_get_contents(API_URL); // si solo quieres hacer el GET de una api
$data = json_decode($result, true);
curl_close($ch);

// var_dump($data);
?>
<head>
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel" />
    <meta name="viewport" content="widt=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <pre style="font-size: 10px; overflow: scroll; height: 250px;">
        <?php var_dump($data); ?>
    </pre>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]?>" style="border-radius: 16px;" />
        <!-- <h2>La proxima pelicula de Marvel</h2> -->
    </section>

    <hgroup>
        <h3><?= $data["title"];?> se estrena en <?= $data["days_until"]; ?> días</h3>
        <p>Fehca de estreno: <?= $data["release_date"];?> </p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<style>
    :root{
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }
</style>