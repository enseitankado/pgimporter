<?php

	$opts['h'] = 'Shows help.';
	$opts['H:'] = 'Hostname/IP of posgresql server.';
	$opts['u:'] 'Posgresql database username.';
	$opts['p:'] 'Posgresql database user password.';
	$opts['d:'] 'Posgresql database name.';

	$options = implode('', array_keys($opts));
	$cmd = getopt($options, array());


?>