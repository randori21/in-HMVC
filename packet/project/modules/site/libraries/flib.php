<?php
class flib{
	function fada($x){
		if (is_file($x)== TRUE)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>