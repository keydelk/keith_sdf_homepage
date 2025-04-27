    <footer>
		<p>Author: Keith Keydel</p>
     	<p>
				<?php
				$filename = '.' . $_SERVER['PHP_SELF'];
// For some reason, I can't get this to work with files in subdirectories.
//$filename = preg_replace("\S*\/", '\.\/', $filename);
//echo "File: " . $filename . '<br>';
				if (file_exists($filename)) {
					echo "Last Updated: " . date("F d Y", filemtime($filename));
				}
				?>

		</p>
		<p>
			Hosting for this site is provided by 
			<a target=new href="http://sdf.org">The SDF Public Access UNIX System</a>
		</p>
		<p>
			This site has been visited
			<?php
			    $cnt = file_get_contents('./hits') + 1;
				file_put_contents('./hits', $cnt);
				echo $cnt;
			?>
			
			times
		</p>	
	</footer>
