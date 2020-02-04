<?php

include 'functions.php';

if(
    isset($_POST['id_stanza'])
    // controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))
) {

    // recuperare i dati della stanza da salvare
    $numero_stanza = intval($_POST['numero_stanza']);
    $piano = intval($_POST['piano']);
    $letti = intval($_POST['letti']);
    $id_stanza = $_POST['id_stanza'];

    // salvare la stanza nel db
    $sql = "UPDATE stanze
    SET room_number= $numero_stanza, floor = $piano, beds= $letti, updated_at = NOW()
    WHERE id=$id_stanza ";
    $result = esegui_query($sql);

} else {
    $result = false;
}

//devo reindirizzare alla pagina precedente..mi creo una variabile query e la uso nella funzione header che mi permette di tornare alla pagina precedente ma con aggiunta la nostra query parlante a cui devo aggiungere l id, che poi potro usare nell altra pagina per mostrare un messaggio apposito all utente//
if ($result) {
    $get_message = "?success=true&id_stanza=" .$id_stanza;
    // code...
} else {
    $get_message = "?success=false&id_stanza=" .$id_stanza;
}
header('Location: edit.php' . $get_message);
?>
