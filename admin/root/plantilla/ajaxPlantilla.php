<?php
		
		ob_start();
			$pagina->contenido();
			$page = ob_get_contents();
		ob_end_clean();
		echo base64_encode($page);
		
?>
