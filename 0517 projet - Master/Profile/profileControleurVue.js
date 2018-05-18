function afficherSportProfMoi(reponse){
	var repSport ="<div class=\"card\"><div class=\"card-stacked\"><div class=\"card-content\" id=\"divSportsMonProfil\"><ul class=\"listeSports\">";
	if(reponse.OK == "true"){
		var taille=reponse.sportAutreMembre.length;
		var sportAutreMembre=reponse.sportAutreMembre;
		for(i=0;i<taille;i++){
			var couleur="";
			var niveau = sportAutreMembre[i].niveau;
			switch(niveau){
				case '1':
					couleur ="green";
				break;
				case '2' :
					couleur="yellow";
				break;
				case '3' :
					couleur="red";
				break;
			}
			repSport+="<li><a class=\"waves-effect waves-light "+couleur+" accent-2 btn-small black-text\" style=\"margin-bottom : 6px;\">"+sportAutreMembre[i].nom+"</a></i></li>";
		}
	}else{
	repSport+="<li>Aucun Sport</li>"
	}
	repSport +=	"<a class=\"btn-floating btn waves-effect waves-light grey bottom\"><i class=\"material-icons\" onClick=\"afficherListeSportAjoutP();\">add</i></a>";
	repSport+="</ul></div></div></div>";
	$('#divSports').html(repSport);
}
function affMonProfile(reponse){
	var monProfile=reponse.monProfile;
	var profile="<div class=\"container\" id=\"divProfil\"><div class=\"row\"><div class=\"col s12 m9\" id=\"divMesInfos\"><div class=\"card horizontal\"><div class=\"card-image\">";
	profile+="<img src=\"photoMembre/"+monProfile.photo+"\" width=\"250px\" height=\"250px\"></img></div><div class=\"card-stacked\"><div class=\"card-content\" id=\"infoProfil\">";
	profile+="<h5 class=\"header\">"+monProfile.prenom+" "+monProfile.nom+"</h5><b>"+monProfile.province+", "+monProfile.ville+", "+monProfile.quartier+"</b><p>"+monProfile.profession+"</p><p>"+monProfile.age+" ans</p><p>"+monProfile.sexe+"</p><br><br><a class=\"btn-floating btn waves-effect waves-light grey right\"><i class=\"material-icons\">edit</i></a>";
	profile+="</div></div></div></div><div class=\"col s12 m3\" id=\"divSports\"></div></div><div class=\"row\" id=\"divAddSport\"></div><div class=\"row\" id=\"divTexteA\"></div></div>";
	$('#content').html(profile);
	var repText="<div class=\"row\"> <div class=\"card-panel green\" id=\"secDescription\"> <h5 class=\"white-text\">À propos de moi</h5> <div class=\"row card-panel\" >"+monProfile.texte+"</div> <h5 class=\"white-text\">Recentes activités</h5> <div class=\"row card-panel\"> <div class=\"col s12 m6\"> <div class=\"card horizontal\"> <div class=\"card-image \"> <h5 class=\"center middle ph5\">15<br> Avril</h5> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <a class=\"waves-effect waves-light orange accent-2 btn-small\">Basketball</a></i> </div> </div> </div> </div> <div class=\"col s12 m6\"> <div class=\"card horizontal\"> <div class=\"card-image \"> <h5 class=\"center middle ph5\">12<br> Avril</h5> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <a class=\"waves-effect waves-light orange accent-2 btn-small\">Basketball</a></i> </div> </div> </div> </div> </div> </div> </div>";
	$('#divTexteA').html(repText);
}
function afficherSelectAdd(reponse){
	var listSport = reponse.listSport;
	taille=listSport.length;
	var rechercheAv="<div class=\"col s12 m12\"><div class=\"card-panel\"><div class = \"row\"><form id=\"formAjoutSport\"><div class=\"col s5\"><label>Sports</label><select class=\"browser-default\" id=\"sportSel\" name=\"sportSel\">";
	for(var i=0; i<taille; i++){
		rechercheAv+="<option value=\""+listSport[i].id_sport+"\">"+listSport[i].nom+"</option>";
	}
	rechercheAv+="</select></div> <div class=\"col s3\"> <label>Niveau</label> <select id=\"niveau\" name=\"niveau\" class=\"browser-default\"> <option value=\"1\">Débutant</option> <option value=\"2\">Intermédiaire</option> <option value=\"3\">Expert</option> </select> </div> <div class=\"col s4\"> <br> <button class=\"btn orange waves-effect waves-light right\" type=\"button\" onclick=\"ajoutezSport()\" name=\"action\">Ajouter <i class=\"mdi-content-send right\"></i> </button> </div></form> </div> </div> </div>";
	$('#divAddSport').html(rechercheAv);
}
var profileVue=function(reponse){
	var action=reponse.action;
	switch(action){
		case "affMonProfile" :
			affMonProfile(reponse);
			afficherSportProfMoi(reponse);
		break;
		case "afficherRechercheAv" :
			afficherSelectAdd(reponse);
		break;
		case "sportUpdate" :
			afficherSportProfMoi(reponse);
		break;
		/*case "afficherSelectAdd":
			afficherSelectAdd(reponse);
		break;*/
	}
}