function afficherMsg(){
	var formAfficherMsg = new FormData();
	formAfficherMsg.append('action','afficherMsg');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messagerie/messagerieControleur.php',
		data : formAfficherMsg,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){ //alert(reponse);
					messagerieVue(reponse);
		},
		fail : function (err){
		}
	});
}

function ajoutezFilm(){
	var formFilm = new FormData(document.getElementById('formAdd'));
	formFilm.append('action','ajoutez');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
function supprimez(){
		var formFilm = new FormData(document.getElementById('formSup'));
	formFilm.append('action','supprimez');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
function obtenirFiche(){
	var leForm=document.getElementById('formModId');
	var formFilm = new FormData(leForm);
	formFilm.append('action','fiche');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}
function modifiezFilm(){
	var leForm=document.getElementById('formMod');
	var formFilm = new FormData(leForm);
	formFilm.append('action','modifier');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}
function pageCategorie(categorie){
	var formFilm = new FormData();
	formFilm.append('action','categorie');//alert(formFilm.get("action"));
	formFilm.append('categorie', categorie);
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}
//requêtes films
function enregistrer(){
	var formFilm = new FormData(document.getElementById('formEnreg'));
	formFilm.append('action','enregistrer');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

function lister(){
	var formFilm = new FormData();
	formFilm.append('action','lister');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}

function enlever(){
	var leForm=document.getElementById('formEnlever');
	var formFilm = new FormData(leForm);
	formFilm.append('action','enlever');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}



function modifier(){
	var leForm=document.getElementById('formFicheF');
	var formFilm = new FormData(leForm);
	formFilm.append('action','modifier');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					$('#divFormFiche').hide();
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}