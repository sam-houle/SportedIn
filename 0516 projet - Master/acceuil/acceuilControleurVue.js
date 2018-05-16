//vue films
function afficherAcceuille(reponse){
	var taille;
	var listSport = reponse.listSports;
	taille=listSport.length;
	var rep = "<div class=\"row center-align\">";
	alert(taille);
	for(var i=0; i<taille;i++){
		if(i = 10){
			rep+="</div><div class=\"row center-align\">";
		}else{
			rep+="<a onclick=\"rechercheSimple("+listSport[i].id_sport+")\" class=\"btn-floating waves-effect waves-light orange\"><i class=\"material-icons\"><img src=\"images/sports/"+listSport[i].icone+"\" class=\"recherche\" alt=\""+listSport[i].nom+"\"></i></a>";
		}
	}
	rep+="</div>";
	$('#rechercheSimple').html(rep);
}
var acceuilVue=function(reponse){
	var action=reponse.action; 
	switch(action){
		case "afficherAcceuil" :
			afficherAcceuille(reponse);
		break;
	}
}

