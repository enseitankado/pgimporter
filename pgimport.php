<?php

	$opts['h'] = array("-h", 'Shows help.');
	$opts['H:'] = array("-H", 'Hostname/IP of posgresql server.');
	$opts['u:'] = array("-u", 'Posgresql database username.');
	$opts['p:'] = array("-p", 'Posgresql database user password.');
	$opts['d:'] = array("-d", 'Posgresql database name.');

	$options = implode('', array_keys($opts));
	$cmd = getopt($options, array());


	# Display help
	if (isset($cmd['h']) || !count($cmd)) {
		echo "\n";
		foreach ($opts as $opt => $opt_arr)
			echo $opt_arr[0]."\t".$opt_arr[1]."\n";
		exit(0);
	}
	
	try {
		echo $dsn = "pgsql:host={$cmd['H']};port=5432;dbname={$cmd['d']};";
		$pdo = new PDO($dsn, $cmd['u'], $cmd['p'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		$statement = $pdo->query($sql);
		
	} catch (PDOException $e) {
		die("PDO Exception: ". $e->getMessage());
	} finally {
		if ($pdo) {
			$pdo = null;
		}
	}
	
?>
