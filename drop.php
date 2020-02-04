<?php
include 'functions.php';

if (!empty($_POST["id_stanza"])) {
    $id_stanza = $_POST["id_stanza"];
    $sql = "DELETE  FROM stanze WHERE id=$id_stanza";
    $result = esegui_query($sql);
} else {
    $result = false;
}

 // <!-- //devo reindirizzare alla pagina precedente..mi creo una variabile query e la uso nella funzione header che mi permette di tornare alla pagina precedente ma con aggiunta la nostra query parlante a cui devo aggiungere l id, che poi potro usare nell altra pagina per mostrare un messaggio apposito all utente// -->
 if ($result) {
     $get_message = "?success=true";
 } else {
     $get_message = "?success=false";
 }
 header('Location: index.php' . $get_message);
?>
