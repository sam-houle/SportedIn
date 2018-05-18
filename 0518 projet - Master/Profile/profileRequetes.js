function afficherProfileMoi(){
	var formafficherProfileMoi = new FormData();
	formafficherProfileMoi.append('action','afficherProfileMoi');
	$.ajax({
		type : 'POST',
		url : 'Profile/profileControleur.php',
		data : formafficherProfileMoi,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					profileVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
function afficherListeSportAjoutP(){
	var formafficherListeSportAjout = new FormData();
	formafficherListeSportAjout.append('action','afficherListeSportAjout');
	$.ajax({
		type : 'POST',
		url : 'connexion/membreControleur.php',
		data : formafficherListeSportAjout,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					profileVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
function ajoutezSport(){
	var formAjoutSport = new FormData(document.getElementById('formAjoutSport'));
	formAjoutSport.append('action','AjoutSport');
	$.ajax({
		type : 'POST',
		url : 'Profile/profileControleur.php',
		data : formAjoutSport,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					profileVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

//function aff
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