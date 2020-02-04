<?php

include 'functions.php';

// Pagina dettaglio stanza

$sql = "SELECT * FROM stanze WHERE id = " . $_GET['id_stanza'];
$result = esegui_query($sql);
// visualizzo i dettagli della stanza
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title></title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <link rel="stylesheet" href="style.css">
     </head>
     <body>
         <main>
         <div class="container">
             <div class="row">
                 <div class="col-sm-6">
                     <h1>Dettaglio stanza</h1>
                 </div>
                 <div class="col-sm-6 text-right">
                     <a id="torna-in-home" class="btn btn-success" href="index.php">
                         Torna in homepage
                     </a>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-12">

                     <?php
                    if ($result && $result->num_rows > 0) {

                        // output data of each row
                        $row = $result->fetch_assoc(); ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Dettagli stanza <?php echo $row['id']; ?></h3>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <li>Numero stanza: <?php echo $row['room_number']; ?></li>
                                    <li>Piano: <?php echo $row['floor']; ?></li>
                                    <li>Numero letti: <?php echo $row['beds']; ?></li>
                                    <li>Data creazione: <?php echo $row['created_at']; ?></li>
                                    <li>Data ultima modifica: <?php echo $row['updated_at']; ?></li>
                                </ul>
                            </div>
                        </div>

                        <?php
                    } elseif ($result) { ?>
                        <p>Non ci sono risultati</p>
                        <?php
                    } else {
                        ?>
                        <p>Si è verificato un errore</p>
                        <?php
                    }
                    ?>

                 </div>
             </div>
         </div>
     </main>
     </body>
 </html>
