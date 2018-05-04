<?php 
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['submit'])) {// If the submit button of the signup form has been clicked
	include_once 'connexion_MySQLi.inc.php';

	$nom = mysqli_real_escape_string($connexion,$_POST['nom']);
	$prenom = mysqli_real_escape_string($connexion,$_POST['prenom']);
	$courriel = mysqli_real_escape_string($connexion,$_POST['courriel']);
	$confirmCourriel = mysqli_real_escape_string($connexion,$_POST['confirmCourriel']);
	$motdepasse = mysqli_real_escape_string($connexion,$_POST['motdepasse']);
	$confirmMotdepasse = mysqli_real_escape_string($connexion,$_POST['confirmMotdepasse']);
	$type = "membre";
	$statut = 1;
	$photo = mysqli_real_escape_string($connexion,$_POST['photo']);
	$sexe = mysqli_real_escape_string($connexion,$_POST['sexe']);
	$naissance = mysqli_real_escape_string($connexion,$_POST['naissance']);
	$codepostal = mysqli_real_escape_string($connexion,$_POST['codepostal']);
	$profession = mysqli_real_escape_string($connexion,$_POST['profession']);
	$ville = mysqli_real_escape_string($connexion,$_POST['ville']);
	$province = mysqli_real_escape_string($connexion,$_POST['province']);
	$pays = "Canada";
	$longitude = 0.0;
	$latitude = 0.0;
	$texte = mysqli_real_escape_string($connexion,$_POST['texte']);

	// ERROR HANDLERS
	//Check for empty fields
	if (empty($nom) || empty($prenom) || empty($courriel) || empty($confirmCourriel) || empty($motdepasse) || empty($confirmMotdepasse) || empty($sexe) || empty($naissance) || empty($codepostal) || empty($profession) || empty($texte)) {
		header("Location: ../index.php?signup=empty");
		exit();
	}
	elseif(!preg_match("/^[a-zA-Z àâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ]*$/", $nom) || !preg_match("/^[a-zA-Z àâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ]*$/", $prenom)) {// Check if input characters are valid
		 
			header("Location: ../index.php?signup=invalid");
			exit();
		
	}
	elseif(!filter_var($courriel,FILTER_VALIDATE_EMAIL)){// Check if e-mail is valid
		 
			header("Location: ../index.php?signup=invalid_email");
			exit();
		
	}
	else{// Check if user already exists
		$sql = "SELECT * FROM membre WHERE email='courriel'";
		$result = mysqli_query($connexion,$sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0) {
			header("Location: ../index.php?signup=usertaken");
			exit();
		}
		else{// Hashing the password
			$hashedPwd = password_hash($motdepasse,PASSWORD_DEFAULT);
			// Insert user into database
			$sql_1 = "INSERT INTO membre (prenom,nom,email,type,statut,code_postal,ville,province,pays,longitude,latitude,naissance,profession,sexe,texte,photo)
							VALUES ('$prenom','$nom','$courriel','$type','$statut','$codepostal','$ville','$province','$pays','$longitude','$latitude','$naissance','$profession','$sexe','$texte','$photo');";
			mysqli_query($connexion,$sql_1);

			$id_membre = mysqli_insert_id($connexion);

			$sql_2 = "INSERT INTO connexion (id_membre,mot_de_passe) VALUES ('$id_membre','$hashedPwd');";
			mysqli_query($connexion,$sql_2);

			header("Location: ../index.php?signup=success");
			exit();
		}
	}
	
}

else{// If someome tries to access this page without submitting the form,they are taken back to index.php
 header("Location: ../index.php");
 exit();
}


?>