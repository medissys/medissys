<?php
/*
Ce module est à utiliser dans le cas de liaison avec Ajax et d'ajout de fonction PHP appelable directement en javascript
Pour utiliser ce fichier insérer la ligne ci-dessous
include("../include_php/read_parametre3.inc");//lecture des parametres et accès direct aux fonctions PHP via js
include("http://jpconnexion.free.fr/include_php/read_parametre3.inc");//lecture des parametres et accès direct aux fonctions PHP via js
*/

$ip_client = (getenv("HTTP_X_FORWARDED_FOR")? getenv("HTTP_X_FORWARDED_FOR"):getenv("REMOTE_ADDR"));

if ($ip_client == "127.0.0.1") {
    //echo $ip_client;
}

if (isset($_GET)) {
    //recherche les données de type GET transmises( lien html)!
    foreach ($_GET as $c => $v) {
        //echo $c, " : ", $v, " in GET méthode. <br>\n";
        $$c=$v;
        $arg[] = $c; //sert aux appels de fonction php
    }
}

if (isset($_POST)) {
    //recherche les données de type POST transmises (formulaire)!
    foreach ($_POST as $c => $v) {
        //echo $c, " : ", $v, " in POST méthode. <br>\n";
        $$c=$v;
        $arg[] = $c; //sert aux appels de fonction php
    }
} 

if (isset($_FILES)) {
    //recherche les données de type FILES transmises (formulaire)!
    foreach ($_FILES as $file => $v) { //génère la variable $c
        //echo $file, " : ", $v, " in FILES méthode. <br>\n";
        
        $$file=$v; // le contenu de "input type file" est un array => $v est un array et $$file génère une variuable $kontrol_file ou kontrol_file est le name du contrôle de formulaire de type input file
        /*
        le contenu de $file est le name du controle input file
        $$file génère donc une variable nommée $name où name est la propriété name du input file
        $v est un array
        
        le contenu de "input type file" est un array 
        => $v est un array 
        et $$file génère une variable $kontrol_file 
        où kontrol_file est le name du contrôle de formulaire de type input file
        
        ainsi si le name du input file est "fichiercsv" nous aurons:
        $file = "fichiercsv";
        $$file = $fichiercsv = $_FILES['fichiercsv'] = $kontrol_file qui contiendra un array

        $kontrol_file = $_FILES['fichiercsv']; //controle file dans le formulaire
		$tmp_file = $kontrol_file['tmp_name']; //nom du fichier temporaire qui sera téléchargé
		$type_file = $kontrol_file['type']; // extension du fichier à télécharge
		$name_file = $kontrol_file['name']; //nom du fichier à télécharger du système client
		$size_file = $kontrol_file['size']; //taille du fichier à télécharger
		$error_file = $kontrol_file['error']; //une erreur est elle survenue - pas d'erreur si 0
		*/
    }  
} 

if (isset($_COOKIE)) {
    //recherche les données de type Cookies!
    foreach ($_COOKIE as $c => $v) {
        //echo $c, " : ", $v, " in COOKIE méthode. <br>\n";
        $$c=$v;
    }
} 

if (isset($_SESSION)) {
    //recherche les données de type Cookies!
    foreach ($_SESSION as $c => $v) {
        //echo $c, " : ", $v, " in SESSION méthode. <br>\n";
        $$c=$v;
    }
} 


if (isset($arg)){ // appel de la fonction PHP depuis js/ajax
	if (function_exists($$arg[0])) { //teste si la fonction existe - fonction as string - $$arg[0] contient le nom de la fonction
		//echo $$arg[0];
		$fonction = "$".$arg[0] . "("; //contient le nom de la fonction
		$longueur = count($arg)-1;
		for ($numero = 1; $numero < $longueur; $numero++){ // boucle pour afficher les arguments de la fonction PHP
			$fonction = $fonction ."$".$arg[$numero] . ", ";
		}
		$fonction = $fonction ."$".$arg[$longueur].");"; //dernier argument de la fonction -boucler si pas d'argument!
		//echo $fonction;
		eval($fonction);
	}
}

?>