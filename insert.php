<?php

include 'functions.php';

if(
    !empty($_POST) &&
    controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))
) {
    // recuperare i dati della stanza da salvare
    $numero_stanza = intval($_POST['numero_stanza']);
    $piano = intval($_POST['piano']);
    $letti = intval($_POST['letti']);

    // salvare la stanza nel db
    $sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($numero_stanza, $piano, $letti, NOW(), NOW())";
    $result = esegui_query($sql);


} else {
    $result = false;
}

//devo reindirizzare alla pagina precedente per evitare che ricaricando la pagina ci sia una nuova creazione della stanza dovuta ai dati rimasti nell header http..mi creo una variabile query e la uso nella funzione header che mi permette di tornare alla pagina precedente ma con aggiunta la nostra query parlante, che poi potro usare nell altra pagina per mostrare un messaggio apposito all utente//
if ($result) {
    $get_message = "?success=true";
    // code...
} else {
    $get_message = "?success=false";
}
header('Location: create.php' . $get_message);
?>
