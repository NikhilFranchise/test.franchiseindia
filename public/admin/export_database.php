<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'opi';

// MySQL dump command
$command = "mysqldump --host={$host} --user={$username} --password={$password} {$database} > database_backup.sql";

// Execute the command
exec($command, $output, $return_var);

// Check if the command executed successfully
if ($return_var === 0) {
    echo "Database exported successfully.";
} else {
    echo "Error exporting database: " . implode("\n", $output);
}
?>
