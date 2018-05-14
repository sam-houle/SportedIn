function afficherResultAv(reponse){
	var taille=reponse.listRecherche.length;
	var listRecherche=reponse.listRecherche;
	var rep="<div class=\"container\"> <div class=\"row\"> <div class=\"col s12 m12 l12\"> <div class=\"card-panel green\" id=\"secRecherche\"> <h4 class=\"white-text\"><a class=\"btn-floating waves-effect waves-light orange\"><i class=\"material-icons\"><img src=\"images/sports/"+reponse.icone+"\" class=\"recherche\"></i></a>"+reponse.sport+"</h4> <p class=\"white-text\">"+reponse.msg+"</p> </div> <div class=\"col s12 m12\">";
	for(i=0;i<taille;i++){
	rep+="<div class=\"card horizontal\"><div class=\"card-image\"><img src=\"photoMembre/"+listRecherche[i].photo+"\">";
			  rep+="</div><div class=\"card-stacked\"><div class=\"card-content\"><h5 class=\"header\">"+listRecherche[i].prenom+" "+listRecherche[i].nomMembre+"</h5>";
				rep+="<b>"+listRecherche[i].ville+"</b><p>"+listRecherche[i].texte+"</p></div><div class=\"card-action\"><a style=\"cursor: pointer;\" onclick=\"salut()\">Fiche complete</a>";
				rep+="</div></div></div>";
	}
	rep+="</div></div></div></div>";
	$('#content').html(rep);
}
var rechercheVue=function(reponse){
	var action=reponse.action;
	switch(action){
		case "rechercheAv" :
			afficherResultAv(reponse);
		break;
	}
}