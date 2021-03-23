
<?php
function get_prestamos(){
	$txt=file_get_contents('data/prestamos.txt', false);
	return $txt;
}



?>