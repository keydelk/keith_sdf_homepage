        <footer>
			<p>Author: Keith Keydel</p>
     		<p>
				<?php
				$filename = "index.php";
				if (file_exists($filename)) {
					echo "Last Updated: " . date("F d Y", filemtime($filename));
				}
				?>

			</p>
		</footer>