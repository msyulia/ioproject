<?php
    require "../application.php";
	
    /** Zatrzymanie sesji - usunięcie z serwera danych na temat połączenia
	* z użytkownikiem.
	*/
    Sessions::startSession();
    Sessions::stopSession();
	
	/** Po wylogowaniu użytkownik zostaje przekierowany
	* na stronę główną index.php.
	*/
    header("Location: ../../index.php");
    exit();
?>