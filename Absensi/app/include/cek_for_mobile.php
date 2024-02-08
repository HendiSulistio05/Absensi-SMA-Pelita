<?php
	$ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    if(!$isMob) {
        header('location:home');
    }
?>