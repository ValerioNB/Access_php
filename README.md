# Access_php

AUTENTICAZIONE “STUPIDA” DI UN UTENTE 
In questo esempio viene effettuata una autenticazione definibile come “stupida”,
in quanto il nomedell’utente autorizzato è presente in una variabile all’interno del codice stesso.
Un sistema più validoprevede invece che la lettura avvenga da un file,
oppure da un database che contiene una tabellacon i dati degli utenti registrati.
Si compone di due pagine, la prima delle quali consente di effettuare il login(Accedi_dummy.php),
richiede i dati all’utente da autenticare, quindi, tramite la tecnica postback,
richiama la pagina stessapassando come parametri i campi nome utentee password.
Se i campi vengono riconosciuti, vienerichiamata la paginaAccedi_dummy_aut.php .
La prima parte del codice della pagina Accedi_dummy.php effettua il controllo sul settaggio dellavariabile $_POST[‘utente’],
in grado di verificare se si tratta del primo accesso o del successivo.
Nelcaso di primo accesso viene mostrato il Form di login.

La seconda parte del codice viene eseguita quando la variabile è stata settata,
quindi quando l’utente ha riempito i campi del Formdi login.
Se l’utente è rico-nosciuto come autorizzato, attraverso il confronto con l’array associativo $utenti[](righe 33-36),
viene settata la variabile di sessione $_SESSION[‘utente’](riga 40),quindi chiamata la pagina Accedi_dummy_aut.php(riga 42);
in caso contrario,vengono cancellate le variabili di sessione con la funzione unset(righe 47-48) erichiamata la pagina stessa (riga 50) con la funzione header. 
La stessa ope-razione viene effettuata per confrontare la password (righe 56-59).

(
Header
Come possiamo notare alle righe 42, 50e 59, 
vieneusata la funzione header(“Location: pagina.php”)per  reindirizzare  alla  pagina  phpindicata. 
Talefunzione,  tuttavia,  non  può  essere  preceduta  daistruzioni  di  visualizzazione  (echo), 
codice  HTMLe di inclusione di codice esterno (include). 
)


Il codice della seconda pagina Accedi_dummy_aut.phpche riceve i dati di login dalla prima paginaeffettua,
in primo luogo,
il controllo sul settaggio della variabile di sessione (riga 10). 
In caso positivo, apre la sezione per l’utente autorizzato, 
in caso contrario appaiono un messaggio e un link per ri-chiamare la pagina principale (riga 25):

Dall’esecuzione dello script si ottiene che, se l’utente è registrato, appare,
nella schermata di seguitoriprodotta, la pagina indicata a destra in alto, altrimenti,
si ottiene come risultato un messaggio dierrore con un link ipertestuale per tornare alla pagina di login.






