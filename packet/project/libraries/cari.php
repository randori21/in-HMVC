<?php
class cari{
	function lain($x){
		$CI =& get_instance();
		$CI->load->helper('file');
		$CI->load->helper('directory');
		$urlcari = "./project/modules/";
		$map =  directory_map($urlcari,1);$a = 1;$b = count($map);
		while($a < $b){
			if(($map[$a]!='auth')&&($map[$a]!='installer')&&($map[$a]!='setting')&&($map[$a]!='site')){
				return $map[$a];
			}
			$a++;
		}
	}
}
?>