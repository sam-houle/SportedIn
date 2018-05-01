<?php 
session_start();

if (isset($_POST['submit'])) {// If the submit button of the signup form has been clicked
	include_once 'connexion_MySQLi.inc.php';

	$courriel_conn = mysqli_real_escape_string($connexion,$_POST['compte']);
	$motdepasse_conn = mysqli_real_escape_string($connexion,$_POST['connexion_motdepasse']);

	//ERROR HANDLERS
	//Check if inputs are empty
	if (empty($courriel_conn) || empty($motdepasse_conn)) {
		header("Location: ../index.php?login=empty");
 		exit();
	}
	else{
		$sql = "SELECT * FROM membre WHERE email='$courriel_conn'";
		$result = mysqli_query($connexion,$sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {// If user doesn't exist
			header("Location: ../index.php?login=error_usernotfound");
 			exit();
		}
		else{
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$id_membre = $row['id_membre'];
				$sql_2 = "SELECT * FROM connexion WHERE id_membre='$id_membre'";
				$result_2 = mysqli_query($connexion,$sql_2);
				$row_2 = mysqli_fetch_assoc($result_2);
				$hashedPwdCheck = password_verify($motdepasse_conn,$row_2['mot_de_passe']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error_wrongpassword");
 					exit();
				}
				elseif($hashedPwdCheck == true){
					// Log in the user
					$_SESSION['u_id'] = $row['id_membre'];
					$_SESSION['u_prenom'] = $row['prenom'];
					$_SESSION['u_nom'] = $row['nom'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_type'] = $row['type'];
					$_SESSION['u_statut'] = $row['statut'];
					header("Location: ../index.php?login=success");
					
 					exit();
				}
			}
		}
	}

}

else{
	header("Location: ../index.php?login=error_notsubmitted");
 	exit();
}


?>