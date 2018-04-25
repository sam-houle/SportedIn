<?php
require_once("connexion.inc.php");
class modele{
	private $requete;
	private $params;
	private $connexion;
	
function __construct($requete=null,$params=null){
		$this->requete=$requete;
		$this->params=$params;
}
	
function obtenirConnexion(){
	$maConnexion = new Connexion("localhost", "root", "", "bdfilm_labo3");
	$maConnexion->connecter();
	return $maConnexion->getConnexion();
}

function executer(){
		$this->connexion = $this->obtenirConnexion();
		$stmt = $this->connexion->prepare($this->requete);
		$stmt->execute($this->params);
		$this->deconnecter();
		return $stmt;		
	}
function deconnecter(){
		unset($this->connexion);
}
/* fichier CRUD
function verserFichier($dossier, $inputNom, $fichierDefaut, $chaine){
	$dossier="../$dossier/";
	$nomPochette=sha1($chaine.time());
	$pochette=$fichierDefaut;
	if($_FILES[$inputNom]['tmp_name']!==""){
		//Upload de la photo
		$tmp = $_FILES[$inputNom]['tmp_name'];
		$fichier= $_FILES[$inputNom]['name'];
		$extension=strrchr($fichier,'.');
		@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
		$pochette=$nomPochette.$extension;
	}
	return $pochette;
}
function enleverFichier($dossier,$pochette){
	if($pochette!="default.jpg"){
		$rmPoc="../$dossier/".$pochette;
		$tabFichiers = glob("../$dossier/*");
		//print_r($tabFichiers);
		// parcourir les fichier
		foreach($tabFichiers as $fichier){
		  if(is_file($fichier) && $fichier==trim($rmPoc)) {
			// enlever le fichier
			unlink($fichier);
			break;
		  }
		}
	}
}
}//fin de la class
*/


?>