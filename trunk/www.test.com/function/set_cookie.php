<?php

/** * ����COOKIE * @var COOKIE��ֵ * @val COOKIEֵ */function set_cookie($var,$val){
	return setcookie(T.$var,$val,0,'/',$_SERVER['HTTP_HOST']);}

?>