<?php

function getFormHTML()
{
	$output = '';
	$output .= <<< 'EOD'
<html>
<head>
</head>
<form action="" method="GET">
<input type="text" name="ip"></input>
<input type="submit" name="submit">
</form>
</html>
EOD;

	return $output;
}

function getOctalIP($input)
{
	$parts = explode('.', $input);

	$output = '';

	foreach($parts as $part)
	{
		$output .= '0'.decoct($part).'.';
	}

	return $output;
}

function getHexIP($input)
{
	$parts = explode('.', $input);

	$output = '';

	foreach($parts as $part)
	{
		$output .= '0x'.dechex($part).'.';
	}

	$output .= '<br>anything before real, dots optional';

	return $output;
}

function getDWORDIP($input)
{
	$parts = explode('.', $input);

	$output = $parts[0]*256;
	$output = ($output + $parts[1]) * 256;
	$output = ($output + $parts[2]) * 256;
	$output = $output + $parts[3];

	return $output;
}

$output = '';

if(true)
{
	if(isset($_GET['submit']))
	{
		$ip = $_GET['ip'];

		$output .= $ip."<br>";

		$output .= getOctalIP($ip)."<br>";
		$output .= getHexIP($ip)."<br>";
		$output .= getDWORDIP($ip)."<br>";
	}
	else
	{
		$output .= getFormHTML();
	}
}

echo $output;
