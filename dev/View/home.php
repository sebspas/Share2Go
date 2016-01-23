<?php
	start_page("Home");
?>
<div class="menu">
			<div class="menu-logo">
				<a class="menu-logo-link" href="#"></a>
			</div>
			<nav class="menu-navigation">
				<ul class="inline-block left">
					<li class="menu-list">
						<a class="menu-link current" href="../dev/home.php">Home
							<span class="link-notif"><i class="link-notif-i">42</i></span>
						</a>
					</li>
					<li class="menu-list"><a class="menu-link" href="#">Profile</a></li>
					<li class="menu-list">
						<a class="menu-link" href="#">Messages
							<span class="link-notif"><i class="link-notif-i">3</i></span>
						</a>
					</li>
				</ul>
			</nav>
			<div class="menu-user right">
				<span class="user-avatar left"><img src="http://gravatar.com/avatar/c71c38340fc94601738c4d0c794cca36?s=512" alt="avatar"></span>
				<a class="menu-link right" href="../dev/Controller/logout.php">Se déconnecter</a>
			</div>
		</div><!-- // menu -->
		<div class="row">
			<div class="cols10">
				<div class="frame cols7">
					<div class="hb red3"><h2 class="hb-title">Bienvenue !</h2></div>
					<div class="frame-content">
						mon texte ici !
						<a class="btn2 red3 right" href="#">Réserver</a>
					</div>
				</div>
				<div class="g1"></div>
				<div class="frame cols4">
					<div class="hb cyan3"><h2 class="hb-title">Test</h2></div>
					<div class="frame-content">
						mon texte ici !
						<a class="btn2 cyan3 right" href="#">Réserver</a>
					</div>
				</div>
			</div>
			<div class="g1"></div>
			<div class="cols3 fixed left">
				<div class="frame cols7">
					<div class="hb blue1"><h2 class="hb-title">Recherche</h2></div>
					<div class="frame-content">
						<form>
							<input type="text" placeholder="Départ" required />
							<input type="text" placeholder="Arrivée" required />
							<input type="submit" class="btn2 blue1" value="Rechercher" />
						</form>
					</div>
				</div>
			</div>
		</div><!-- .row -->
<?php 
	end_page();
?>