<?php
/** * ·µ»ØcookieÖµ * @var COOKIE¼üÖµ */function ret_cookie($var){
	if (!empty($_COOKIE[T.$var]))	return $_COOKIE[T.$var];	else	return '';}

?>