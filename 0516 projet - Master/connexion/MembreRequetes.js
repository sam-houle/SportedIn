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
function homeButton(){
	var formHome = new FormData();
	formHome.append('action','homeButton');
	$.ajax({
		type : 'POST',
		url : 'connexion/membreControleur.php',
		data : formHome,
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
	var region='';
	$.ajax({
			type : 'GET',
			url : 'https://maps.googleapis.com/maps/api/geocode/json?'+'address='+codePostale+'&language=en'+'&key='+key ,
			dataType : 'json', //text pour le voir en format de string
			async : false,
			//cache : false,
			contentType : false,
			processData : false,
			success : function (reponse){//window.alert(reponse);
				if(reponse.status == "OK"){
					lat = reponse.results[0].geometry.location.lat;
					lng = reponse.results[0].geometry.location.lng;
					var tailleAddressComp = reponse.results[0].address_components.length;
					for(var i=0;i<tailleAddressComp;i++){
						if(reponse.results[0].address_components[i].types[0] == "locality"){
							ville = reponse.results[0].address_components[i].long_name;
						}
						if(reponse.results[0].address_components[i].types[2]=="sublocality_level_1"){
							region = reponse.results[0].address_components[i].long_name;
						}
					}
					inscriptionSendPhP(lat,lng,ville,region);
				}
			},
			fail : function (err){
			   window.alert("marche pas");
			}
		});
}
function inscriptionSendPhP(lat,lng,ville,region){
	var formInscription = new FormData(document.getElementById('formInscrip'));
	formInscription.append('action','inscription');
	formInscription.append('lat',lat);
	formInscription.append('lng',lng);
	formInscription.append('ville',ville);
	formInscription.append('region',region);
	console.log(lng,lat,ville,region);
	$.ajax({
		type : 'POST',
		url : 'connexion/membreControleur.php',
		data : formInscription,
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
