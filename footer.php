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
		<p>
			Hosting for this site is provided by 
			<a target=new href="http://sdf.org">The SDF Public Access UNIX System</a>
		</p>
	</footer>