<?php
    //* Creation de la variable globale $Bdd
	global $Bdd;
    //* Connexion à la base de données
	$Bdd = new PDO('mysql:host=localhost;dbname=ensp_arles_com;charset=utf8','root','');
	//* Commencer une session
    session_start();