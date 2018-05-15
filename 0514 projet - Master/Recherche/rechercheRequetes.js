function rechercheAvance(){
var formRechercheAvance = new FormData(document.getElementById('formRechercheAv'));
	formRechercheAvance.append('action','rechercheAv');
	$.ajax({
		type : 'POST',
		url : 'Recherche/rechercheControleur.php',
		data : formRechercheAvance,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					rechercheVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
function afficherProfileAutre(id_membre){
	var formafficherProfileAutre = new FormData();
	formafficherProfileAutre.append('action','afficherProfileAutre');
	formafficherProfileAutre.append('id_membre',id_membre);
	$.ajax({
		type : 'POST',
		url : 'Recherche/rechercheControleur.php',
		data : formafficherProfileAutre,
		dataType : 'text', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){alert(reponse);
					//rechercheVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
/*function affrechercheAvance(){
	var formFilm = new FormData();
	formFilm.append('action','affrechercheAvance');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Recherche/rechercheControleur.php',
		data : formRechercheAvance,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					rechercheVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}*/