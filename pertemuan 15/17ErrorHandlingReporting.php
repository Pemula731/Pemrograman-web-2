<?php
error_reporting(E_ALL);
ini_set("display_errors", "0");

// Error handler function
function customError(int $errno, string $errstr): bool {
    $errstr = htmlspecialchars($errstr, ENT_QUOTES, "UTF-8");
    echo "<b>Error:</b> [$errno] $errstr<br>";
    echo "Ending Script";
    return true;
}

// Set error handler
set_error_handler("customError", E_USER_NOTICE);

// Trigger error
$test = 2;
if ($test >= 1) {
    trigger_error("Value must be 1 or below", E_USER_NOTICE);
}
?>
