<header>
    <ul id="menu">
    <li><a href="index.php?controle=loueur&action=stock" >Véhicules en stock</a></li>
    <li><a href="index.php?controle=loueur&action=enLocation" >Locations en cours</a></li>

		<li><a href="#" >Modifier le stock</a>
			<ul>
				<li><a href="index.php?controle=loueur&action=ajouterVehicule" >Ajouter un véhicule</a></li>
				<li><a href="index.php?controle=loueur&action=retirerVehicule" >Retirer un vehicule</a></li>
			</ul>
		</li>
    <li><a href="index.php?controle=loueur&action=factures" >Factures</a></li>
    	<li><a href="index.php?controle=utilisateur&action=bye" >Déconnexion</a></li>

</header>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    $(function() {
      if ($.browser.msie && $.browser.version.substr(0,1)<7)
      {
        $('li').has('ul').mouseover(function(){
            $(this).children('ul').show();
            }).mouseout(function(){
            $(this).children('ul').hide();
            })
      }
    });
</script>
