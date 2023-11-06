<?php
//inizializzazione sessioni
session_start();
?>
<HTML><BODY>
<?php
//verifica se variabile di sessione è attiva
//questo per evitare che se un utente conosce la pagina
//la possa aprire direttamente senza passare dalla pagina di autorizzazione
if (isset($_SESSION['utente']))
{
    ?>
    <H3>Utente RICONOSCIUTO</H3><BR>
    <?php
    //visualizzazione nome utente
    echo "Benvenuto<B> " . $_SESSION['utente'];
    ?>
    </B>Sei nella sezione riservata.
    <?php
}
else
{
    //utente non riconosciuto in quanto la variabile di sessione non è stata settata
    ?>
    Utente sconosciuto, riprova a <A HREF="Accedi_dummy.php">connetterti</a>
    <?php
}
?>
</BODY></HTML>
