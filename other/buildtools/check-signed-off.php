<?php

/**
 * Simple Machines Forum (SMF)
 *
 * @package SMF
 * @author Simple Machines http://www.simplemachines.org
 * @copyright 2017 Simple Machines and individual contributors
 * @license http://www.simplemachines.org/about/smf/license.php BSD
 *
 * @version 2.1 Beta 3
 */

$message = trim(shell_exec('git show -s --format=%B HEAD'));
$lines = explode("\n", trim(str_replace("\r", "\n", $message)));
$lastLine = $lines[count($lines) - 1];
var_dump($lines);

$result = stripos($lastLine, 'Signed-off-by:');
if ($result === false)
{
	// Try 2.
	$result2 = stripos($lastLine, 'Signed by');
	if ($result2 === false)
		die('Error: Signed-off-by not found in commit message [' . $lastLine . ']' . "\n");
}