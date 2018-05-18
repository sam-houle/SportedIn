function afficherEventV(reponse){
	var listeEvent = reponse.listeEvent;
	var taille=listeEvent.length;
	var rep="<div class=\"container\"> <div class=\"col s12 m9\" id=\"cardEvent\">";
	
	for(var i=0; i<taille; i++){
		rep+="<div class=\"card horizontal\"> <div class=\"card-image\"><iframe frameborder=\"0\" width=\"250\" height=\"250\"  style=\"border:0\" src=\"https://www.google.com/maps/embed/v1/search?q="+listeEvent[i].endroit+",+QC&key=AIzaSyCI2zdHiA-TNQxNNgeWZ9mfcLWPKP5UGCY\" allowfullscreen></iframe> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <h4 class=\"header\">"+listeEvent[i].date_ev+"</h4> <b>"+listeEvent[i].endroit+" "+listeEvent[i].heure_debut+ "</b> <p>" +listeEvent[i].prenom + " " +listeEvent[i].nom +"</p> </div> <div class=\"card-action\"> <a class=\"btn-floating waves-effect waves-light green darker-2\"><i class=\"material-icons\"><img src=\"images/sports/"+listeEvent[i].icone+"\" class=\"recherche\"></i></a><b> </b></div> </div> </div>";
	}
	rep+="</div></div>";
	$('#content').html(rep);
	
}

function afficherMsgAmiV(reponse){
	var listeMsg = reponse.listeMsg;
	var taille=listeMsg.length;
	var rep="<h6 class=\"email-subject truncate\"><i class=\"mdi-action-star-rate yellow-text text-darken-3 right\"></i></h6>";
	for(var i=0; i<taille; i++){
		rep+="<p class=\"ultra-small\">" + listeMsg[i].prenom + " a écrit le " + listeMsg[i].stamp   +"</p> <div class=\"email-content-wrap\"> <div class=\"row\"> <div class=\"email-content col s12 m8 l8\"> <p>" + listeMsg[i].contenu + "</p></div></div><hr class=\"grey-text text-lighten-2\"></div>";
	}
	rep+="<br><div class=\"input-field col s12\"><form id=\"formAjoutMsg\" name=\"formAjoutMsg\" method=\"post\" enctype=\"multipart/form-data\"><textarea id=\"textAjoutMsg\" name=\"textAjoutMsg\" class=\"materialize-textarea\" length=\"1000\"></textarea> <label for=\"compose\">Composez votre message</label></div><div class=\"input-field col s12\"><button class=\"btn waves-effect waves-light right\" type=\"submit\" name=\"action\" onClick=\"ajouterMsg("+ listeMsg[0].id + ");\">Envoyer<i class=\"material-icons right\">send</i> </button></form> </div> ";
	$('#email-details').html(rep);
}
		
var evenementVue=function(reponse){
	var action=reponse.action;
	var action2=reponse.action2; 
	switch(action){
		case "afficherEvent":
			afficherEventV(reponse);
		break;
		case "afficherMsgAmi" :
			afficherMsgAmiV(reponse);
		break;
		case "ajouterMsg" :
			afficherMsgAmiV(reponse);
		break;
		 
	}
}