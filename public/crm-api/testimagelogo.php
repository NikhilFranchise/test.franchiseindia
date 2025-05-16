<?php
// Database configuration
$host = 'localhost'; // Database host
$dbname = 'franchis_franchisnewcopy'; // Database name
$username = 'root'; // Database username
$password = '$Z|d!$1:Dvsl>8E9n;c!'; // Database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data from the database
    $stmt = $pdo->prepare("SELECT company_logo FROM franchisor_business_details WHERE company_logo IS NOT NULL AND company_logo != ''");
    $stmt->execute();
    $companyLogos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($companyLogos) > 0) {
        // Set headers to download the file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="company_logoslive.csv"');

        // Open output stream
        $output = fopen('php://output', 'w');

        // Write CSV column headers
        fputcsv($output, ['Company Logo']);

        // Write data to CSV
        foreach ($companyLogos as $row) {
            fputcsv($output, $row);
        }

        // Close the output stream
        fclose($output);
    } else {
        echo "No data available in the company_logo column.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
