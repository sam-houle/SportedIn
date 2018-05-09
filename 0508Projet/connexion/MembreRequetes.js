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
	var codePostale = document.getElementById('codepostal').value;
	var key = 'AIzaSyCI2zdHiA-TNQxNNgeWZ9mfcLWPKP5UGCY';
	var lat='';
	var lng='';
	var ville='';
	$.ajax({
			type : 'GET',
			url : 'https://maps.googleapis.com/maps/api/geocode/json?'+'address='+codePostale+'&key='+key ,
			dataType : 'json', //text pour le voir en format de string
			async : false,
			//cache : false,
			contentType : false,
			processData : false,
			success : function (reponse){//window.alert(reponse);
				console.log(reponse);
				if(reponse.status == "OK"){
					lat = reponse.results[0].geometry.location.lat;
					lng = reponse.results[0].geometry.location.lng;
					ville = reponse.results[0].address_components[1].long_name;
					inscriptionSendPhP(lat,lng,ville);
				}
			},
			fail : function (err){
			   window.alert("marche pas");
			}
		});
}
function inscriptionSendPhP(lat,lng,ville){
	var formInscription = new FormData(document.getElementById('formInscrip'));
	formInscription.append('action','inscription');
	formInscription.append('lat',lat);
	formInscription.append('lng',lng);
	formInscription.append('ville',ville);
	console.log(lng,lat,ville);
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
