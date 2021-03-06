//vue films
function listerF(reponse){
	if(reponse.isCat){
		var rep= "<h2 style=\"text-align: center;\">"+reponse.categorie+"</h2>";
		rep+="<div class=\"album py-5 bg-light\"><div class=\"container\"><div class=\"row\">";
	}else{
		var rep="<div class=\"album py-5 bg-light\"><div class=\"container\"><div class=\"row\">";
	}
	var taille;
	var listFilms = reponse.listFilms;
	taille=listFilms.length;
	for(var i=0; i<taille; i++){
		rep+="<div class=\"col-md-3\">\n<div class=\"card mb-4 box-shadow\">\n";
		rep+="<img class=\"card-img-top\" src=\"pochettes/"+listFilms[i].pochette+"\" alt=\""+listFilms[i].titre+"\" width=\"253\" height=\"372\" alt=\""+listFilms[i].titre+"\">\n";
		rep+="<div class=\"card-body\">\n";
		rep+="<p class=\"card-text\"><b>"+listFilms[i].titre+"</b></p>\n<p class=\"card-text\">"+listFilms[i].res+"</p>\n<p class=\"card-text\">"+listFilms[i].cat+"</p>\n<p class=\"card-text\">"+listFilms[i].prix+"</p>\n<p class=\"card-text\">"+listFilms[i].duree+" Min</p>\n";
		rep+="<div class=\"d-flex justify-content-between align-items-center\">\n<div class=\"btn-group\">\n<button type=\"button\" class=\"btn btn-danger\" onclick=\"location.href='"+listFilms[i].preview+"'\"><img class=\"cart-marg\" src=\"images/play-button.png\" alt=\"preview\"></button></button><button type=\"button\"  onclick=\"event.preventDefault(); ajoutezPanier("+listFilms[i].idF+")\" class=\"btn btn-primary\"><img class=\"cart-marg\" src=\"images/add-to-cart.png\" alt=\"Add-to-cart\">Ajoutez au Panier</button></div>\n";
		rep+="</div>\n</div>\n</div>\n</div>\n";
		}
	rep+="</div>\n</div>\n</div>\n";
	$('article').html(rep);
}

function afficherFiche(reponse){
  var uneFiche;
  if(reponse.OK){
	uneFiche=reponse.fiche;
	$('#idF').val(uneFiche.idF);
	$('#titre').val(uneFiche.titre);
	$('#res').val(uneFiche.res);
	$('#cat').val(uneFiche.cat);
	$('#duree').val(uneFiche.duree);
	$('#prix').val(uneFiche.prix);
	$('#preview').val(uneFiche.preview);
  }else{
	$('#messages').html("Film introuvable");
	setTimeout(function(){ $('#messages').html(""); }, 5000);
  }

}
function affichezFormModifiez(){
	var rep="<div class='album py-5 bg-light'> <div class='container'> <div class='row'> <div class='col-md-8 order-md-1'> <h4 class='mb-3'>Modifiez le film</h4> <form id='formMod' class='needs-validation'> <div class='row'> <div class='col-md-6 mb-3'> <label for='idF'>id du Film</label><input type='text' class='form-control' id='idF' name='idF'  readonly><label for='titre'>Titre</label> <input type='text' class='form-control' id='titre' name='titre' placeholder='Titre' required autofocus> </div> </div> <div class='mb-3'> <label for='res'>Réalisateur</label> <div class='input-group'> <input type='text' class='form-control' id='res' name='res' placeholder='Réalisateur' required autofocus> </div> </div> <div class='mb-3'> <label for='cat'>Catégorie</label> <div class='input-group'> <input type='text' class='form-control' id='cat' name='cat' placeholder='Catégorie' required autofocus> </div> </div> <div class='mb-3'> <label for='duree'>Durée (minute)</label> <div class='input-group'> <input type='number' class='form-control' id='duree' name='duree' placeholder='Durée' required autofocus> </div> </div> <div class='mb-3'> <label for='prix'>Prix (En cenne)</label> <div class='input-group'> <input type='text' class='form-control' id='prix' name='prix' placeholder='Prix' required autofocus> </div> </div> <div class='mb-3'> <label for='prix'>Preview</label> <div class='input-group'> <input type='text' class='form-control' id='preview' name='preview' placeholder='Preview' required autofocus> </div> </div> <div class='mb-3'> <label for='pochette'>Pochette</label> <div class='input-group'> <input type='file' id='pochette' name='pochette'> </div> </div> <hr class='mb-4'> <button class='btn btn-lg btn-primary btn-block' type='button' onclick='modifiezFilm()'>Modifiez</button> </form> </div> </div> </div> </div>";
	$('article').html(rep);
}

var filmsVue=function(reponse){
	var action=reponse.action;
	var action2=reponse.action2; 
	switch(action){
		case "ajoutez" :
		case "enlever" :
		case "modifier" :
			$('#messages').html(reponse.msg);
			setTimeout(function(){ $('#messages').html(""); }, 5000);
		break;
		case "lister" :
			listerF(reponse);
		break;
		case "fiche" :
			affichezFormModifiez();
			afficherFiche(reponse);
		break;
	}
	switch(action2){
	case "affFilmAcceuil" :
		listerF(reponse);
	break;
	}
}

