<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Réseau sportif</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
  <script language="javascript" src="js/global.js"></script>
  <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
  <script>
	 $(document).ready(function() {
		$('select').material_select();
	 });
	 
  </script>
</head>
<body> 
  <nav class="green" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Sported In</a>
	 
	  <ul class="right hide-on-med-and-down">
	  <li><input type="search" placeholder="Recherche" class="white-text"></li> 
	  <li><a class="btn waves-effect waves-light gray" onClick="">Logout</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
    <nav class="green darken-4" role="navigation" id="membrenav">
		<div class="nav-wrapper container">
			<ul class="hide-on-med-and-down">
				<li><i class="fas fa-home fa-2x active"></i></li>
				<li><i class="fas fa-users fa-2x"></i></li>
				<li><i class="fas fa-envelope fa-2x"></i></li>
				<li><i class="fas fa-bell fa-2x"></i></li>
				<li><i class="fas fa-calendar fa-2x"></i></li>
				<li><i class="fas fa-user fa-2x"></i></li>
				
			</ul>			
		</div>
    </nav>
 
	  
	<div class="container">
	  <div class="row">
        
		  <div class="col s12 m12">
			
			<div class="card horizontal">
			  <div class="card-image">
				<img src="http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png">
			  </div>
			  <div class="card-stacked">
				<div class="card-content">
				<h5 class="header">Nom de la personne</h5>
				<b>Ville</b>
				  <p>Description</p>
				  
				</div>
				<div class="card-action">
				  <a href="#">Fiche complete</a>
				</div>
			  </div>
			</div>
			
			<div class="card horizontal">
			  <div class="card-image">
				<img src="http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png">
			  </div>
			  <div class="card-stacked">
				<div class="card-content">
				<h5 class="header">Nom de la personne</h5>
				<b>Ville</b>
				  <p>Description</p>
				  
				</div>
				<div class="card-action">
				  <a href="#">Fiche complete</a>
				</div>
			  </div>
			</div>
			
			<div class="card horizontal">
			  <div class="card-image">
				<img src="http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png">
			  </div>
			  <div class="card-stacked">
				<div class="card-content">
				<h5 class="header">Nom de la personne</h5>
				<b>Ville</b>
				  <p>Description</p>
				  
				</div>
				<div class="card-action">
				  <a href="#">Fiche complete</a>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>	
    </div>
    <br><br>

  <footer class="page-footer green">
    
    <div class="footer-copyright">
      <div class="container">
        © 2018
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
