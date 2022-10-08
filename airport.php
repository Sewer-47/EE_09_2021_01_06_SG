<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Odloty samolotów</title>
	<link rel="stylesheet" type = "text/css" href= "styl6.css">
</head>
<body>
	<header>
		<div id="leftHeader">		
			<h2>Odloty z lotniska</h2>
		</div>
		<div id="rightHeader">	
			<img src="zad6.png" alt="logotyp">
		</div>
	</header>
	<section>
		<h4>tabela odlotów</h4>

		<table>
			<tr>
				<td>lp.</td>
				<td>number rejsu</td>
				<td>czas</td>
				<td>kierunek</td>
				<td>status</td>
			</tr>
			<?php
				require_once 'connection.php';

				$connection = @new mysqli($host, $db_user, $db_password, $db_name);
				if ($connection -> connect_errno != 0) {
					echo 'Blad polaczenia db';
				}

				$result = $connection -> query('SELECT * FROM odloty');

				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['nr_rejsu'] . "</td>";
					echo "<td>" . $row['czas'] . "</td>";
					echo "<td>" . $row['kierunek'] . "</td>";
					echo "<td>" . $row['status_lotu'] . "</td>";
					echo "</tr>";
				}

				$connection -> close();
			?>
		</table>
	</section>
	<footer>
		<div id="leftFooter">
			<a href="kw1.jpg">Pobierz obraz</a>
		</div>
		<div id="centerFooter">
			<?php

				$cookie_name = "visited";

				if (!isset($_COOKIE[$cookie_name])) {
					echo "<p><em>Dzień dobry! Sprawdź regulamin naszej strony</em></p>";
				} else {
					echo "<p><strong>Miło nam, że nas znowu odwiedziłeś</strong></p>";
				}

				setcookie($cookie_name, true, time() + 3600, "/");
			?>
		</div>
		<div id="rightFooter">
			Autor: Seweryn
		</div>
	</footer>
</body>
</html>