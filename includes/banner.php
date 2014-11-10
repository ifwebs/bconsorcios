<section class="slider content">
	<div class="banner">
		<ul>
			<?php
				$sql = mysql_query("SELECT * FROM banners_home");
				while($row = mysql_fetch_array($sql)){
					echo "<li style='background-image: url(dashboard/{$row['arquivo']});background-position:bottom center; background-repeat:no-repeat;'>
							<h1>{$row['titulo']}</h1>
							<p><span>{$row['legenda']}</p>
						</li>";
				}
			?>
		</ul>
	</div>
	<div class="sl-shadow">
	</div>
</section>