<?php
	
	function seoUrl($string)
        {
                $string = preg_replace("`\[.*\]`U","",$string);
                $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
                $string = htmlentities($string);
                $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
                $string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $string);
                return strtolower(trim($string, '-'));
                
        }
        
	function friendlyUrl ($str = '') {
	
		$friendlyURL = htmlentities($str, ENT_COMPAT, "UTF-8", false); 
		$friendlyURL = preg_replace('/&([a-z]{1,2})(?:acute|lig|grave|ring|tilde|uml|cedil|caron);/i','\1',$friendlyURL);
		$friendlyURL = html_entity_decode($friendlyURL,ENT_COMPAT, "UTF-8"); 
		$friendlyURL = preg_replace('/[^a-z0-9-]+/i', '-', $friendlyURL);
		$friendlyURL = preg_replace('/-+/', '-', $friendlyURL);
		$friendlyURL = trim($friendlyURL, '-');
		$friendlyURL = strtolower($friendlyURL);
		return $friendlyURL;
	
	}
	
	function criaResumo($string,$caracteres) {
		$string = html_entity_decode(strip_tags($string),ENT_QUOTES,"UTF-8");
		if (strlen($string) > $caracteres) {
			while (substr($string,$caracteres,1) <> ' ' && ($caracteres < strlen($string))){
				$caracteres++;
			};
		};
		$caracteres = str_replace("\r\n",";",trim($caracteres));
		return substr($string,0,$caracteres);
	}

	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		echo "<META http-equiv='refresh' content='0;URL=index.php'> ";
		exit();
	}
	$logado = $_SESSION['login'];
?>