<?php
//inizializzazione sessioni
session_start();
//Tecnica postback: verifica se non � il primo accesso alla pagina
if (!isset($_POST['utente']))
{
    //se primo accesso visualizzazione form che richiama la pagina stessa
    //usando la variabile d'ambiente $PHP_SELF per evitare di riscrivere il nome della pagina
    ?>
    <HTML><HEAD><TITLE>Login</TITLE></HEAD>
    <BODY>
    <FORM METHOD="post" ACTION="<?php echo $_SERVER['PHP_SELF'] ?>"><TABLE><TR><TD>
                    Nome Utente:<TD><INPUT NAME="utente"><BR>
            <TR><TD>Password:<TD><INPUT TYPE="password" NAME="password"><BR>
            <TR><TD><INPUT TYPE="submit" VALUE="Invia">
    </FORM></BODY></HTML>
    <?php
}
else
{
    //se secondo accesso alla pagina avviene controllo autorizzazioni
    //la variabile user_id contiene il nome utente in minuscolo
    $user=strtolower($_POST['utente']);
    ///la variabile pwd contiene la password
    $pwd=$_POST['password'];
    //l'array utenti contiene i nomi degli utenti ammessi e le relative password
    $utenti = array(
        'admin' => 'qwerty',
        'paolo' => '1234',
        'riccardo' => 'pippo'
    );
    //verifica se l'array contiene contiene un nome utente come inserito nel form
    if (isset($utenti["$user"]))
        //in caso positivo verifica se l'array contiene una password come inserita nel form
    {
        if ($utenti["$user"] == $pwd)
        {
            //in caso positivo avviene la creazione della variabile di sessione
            //con il nome dell'utente
            $_SESSION['utente']=$_POST['utente'];
            //quindi viene richiamata la pagina autorizzato.php
            header("Location: Accedi_dummy_aut.php");
        }
        else
        {
            //se password non riconosciuta vengono eliminate le variabili ricevute dal form
            unset($_POST['utente']);
            unset($_POST['password']);
            //viene richiamata di nuovo la pagina di login
            header("Location: ".$_SERVER['PHP_SELF']);
        }
    }
    else
    {
        //se il nome utente non � riconosciuto vengono eliminate le variabili ricevute dal form
        unset($_POST['login']);
        unset($_POST['password']);
        //viene richiamata di nuovo la pagina di login
        header("Location: ".$_SERVER['PHP_SELF']);
    }
}
?>
