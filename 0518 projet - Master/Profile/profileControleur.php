<?php
	require_once("../includePDO/modele.inc.php");
	$tabRes=array();
	function afficherProfileMoi(){
		session_start();
		global $tabRes;
		$id_moi = $_SESSION['u_id'];
		try{
			$requete="SELECT * FROM membre WHERE id_membre=?";
			$moiModele=new modele($requete,array($id_moi));
			$stmt=$moiModele->executer();
			$ligne = $stmt->fetch(PDO::FETCH_OBJ);
			$tabRes['monProfile']=$ligne;
			$tabRes['action']="affMonProfile";
			afficherSportProfAutre($id_moi);
		}catch(Exception $e){
		}finally{
			$moiModele->deconnecter();
		}
	}
	function afficherSportProfAutre($id_membre){
		//afficher le sport pour les membre autre et sont propre profile
		global $tabRes;
		try{
			$requette="SELECT ns.id_membre as id_membre, ns.id_sport as id_sport, ns.niveau as niveau, s.nom as nom FROM niveau_sport ns, sport s WHERE ns.id_sport=s.id_sport AND ns.id_membre=?";
			$membreModele2=new modele($requette,array($id_membre));
			$stmt=$membreModele2->executer();
			$nbResult=$stmt->rowCount();
			if($nbResult > 0){
				while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
					$tabRes['sportAutreMembre'][]=$ligne;
				}
				$tabRes['OK']="true";
			}else{
				$tabRes['OK']="false";
			}
		}catch(Exception $e){
		}finally{
			$membreModele2->deconnecter();
		}
	}
	function AjoutSport(){
		global $tabRes;
		session_start();
		$id_sport = $_POST['sportSel'];
		$niveau = $_POST['niveau'];
		$id_moi = $_SESSION['u_id'];
		if(verifieSport($id_sport,$niveau,$id_moi) == false){
			try{
				$requetteInsert="INSERT INTO niveau_sport VALUES(?,?,?)";
				$verifieSportModele=new modele($requetteInsert,array($id_moi,$id_sport,$niveau));
				$stmt3=$verifieSportModele->executer();
				$tabRes['action']="sportUpdate";
			}catch(Exception $e){
			}finally{
				$verifieSportModele->deconnecter();
			}
		}
		afficherSportProfAutre($id_moi);
	}
	function verifieSport($id_sport,$niveau,$id_moi){
		global $tabRes;
		try{
			$requete="Select * FROM niveau_sport WHERE id_membre=?";
			$verifieSportModele=new modele($requete,array($id_moi));
			$stmt=$verifieSportModele->executer();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				if($ligne->id_sport == $id_sport && $ligne->niveau == $niveau){
					$tabRes['action']="sportDejaEntre";
					$verifieSportModele->deconnecter();
					return true;
				}else if($ligne->id_sport == $id_sport && $ligne->niveau != $niveau){
					$requette = "UPDATE niveau_sport SET niveau = ? WHERE id_membre=? AND id_sport=?";
					$updateSportNiveauModele=new modele($requette,array($niveau,$id_moi,$id_sport));
					$stmt2=$updateSportNiveauModele->executer();
					$tabRes['action']="sportUpdate";
					$updateSportNiveauModele->deconnecter();
					$verifieSportModele->deconnecter();
					return true;
				}
			}
		return false;
		}catch(Exception $e){
		}finally{
			$verifieSportModele->deconnecter();
		}
	}
	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	if(isset($_POST['id_membre'])){
		$id_membre=$_POST['id_membre'];	
	}
	switch($action){
		case "afficherProfileMoi" :
			afficherProfileMoi();
		break;
		case "AjoutSport" :
			AjoutSport();
		break;
	}
    echo json_encode($tabRes);
?>