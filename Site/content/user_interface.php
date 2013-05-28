<?php
	
	# So that the path works in every environment + from every file that includes the file
	# Calculates the absolute path
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once (__ROOT__ . '/utils/connect_db.php');
	
	#require_once("utils/connect_db.php");
	
	$result = mysql_query("SELECT * FROM user WHERE user_ID = '" . $_SESSION['user_ID'] . "'");
	$row = mysql_fetch_array($result);
	
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$full_name = $first_name . ' ' . $last_name;
?>
<div class="mainContent">
	<header class="pageHeader">
		<div class="navAccount">
			<a href="#" class="profileLink">
				<?php
					echo '<img src="http://www.inigral.com/eduweb/images/thumbs/placeholder.gif" alt="Profilbild" height="50" width="50">';
					echo '<span class="userName">'.$full_name.'</span>';
				?>
			</a>
			<ul class="navAccountMenu">
				<li>
					<a href="#" class="profile">Profil</a>	
				</li>
				<li>
					<a href="#" class="logout">Logout</a>	
				</li>
			</ul>
		</div>
	</header>
	<nav class="pageSidebar">
		<ul>
			<li>
				<a href="#">Kalender</a>
			</li>
			<li>
				<a href="#">Notizen</a>
			</li>
			<li>
				<a href="#">Erinnerungen</a>
			</li>
			<li>
				<a href="#">Profil</a>
			</li>
		</ul>
	</nav>
	<section class="pageContent">
		Hallo
		<?php
			echo $full_name;
		
		?>
	</section>
	
</div>

<?php ?>