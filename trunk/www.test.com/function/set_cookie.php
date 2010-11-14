<?php

/** * ÉèÖÃCOOKIE * @var COOKIE¼üÖµ * @val COOKIEÖµ */function set_cookie($var,$val){
	return setcookie(T.$var,$val,0,'/',$_SERVER['HTTP_HOST']);}

?>