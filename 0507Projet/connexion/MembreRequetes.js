function connexionMembre(){
	var formConnecter = new FormData(document.getElementById('formConnexion'));
	formConnecter.append('action','connecter');
	$.ajax({
		type : 'POST',
		url : 'connexion/membreControleur.php',
		data : formConnecter,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//window.alert(reponse);
					ConnexionVue(reponse);
		},
		fail : function (err){
		   window.alert("marche pas");
		}
	});
}
function inscription(){
	var formInscription = new FormData(document.getElementById('formInscrip'));
	formInscription.append('action','inscription');
	$.ajax({
		type : 'POST',
		url : 'connexion/membreControleur.php',
		data : formInscription,
		dataType : 'json', //text pour le voir en format de string
		async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//window.alert(reponse);
		ConnexionVue(reponse);
		},
		fail : function (err){
		   window.alert("marche pas");
		}
	});
}