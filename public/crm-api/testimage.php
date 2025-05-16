<?php
// // Database connection
$dsn = 'mysql:host=localhost;dbname=franchis_franchisnewcopy;charset=utf8';
$username = 'root';
$password = '$Z|d!$1:Dvsl>8E9n;c!';
// include ('connection-file.php');

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to retrieve all image URLs
    $sql = "
        SELECT image_type_slider1 AS image_url FROM franchisor_slider_image WHERE image_type_slider1 IS NOT NULL
        UNION ALL
        SELECT image_type_slider2 AS image_url FROM franchisor_slider_image WHERE image_type_slider2 IS NOT NULL
        UNION ALL
        SELECT pre_approved_image AS image_url FROM franchisor_slider_image WHERE pre_approved_image IS NOT NULL;
    ";
    
    $stmt = $pdo->query($sql);
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Set headers to download the file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="brands_image_urls.csv"');
    
    // Open output stream for writing
    $output = fopen('php://output', 'w');
    
    // Write CSV column header
    fputcsv($output, ['Image URL']);
    
    // Write each image URL to the CSV file
    foreach ($images as $image) {
        fputcsv($output, $image);
    }
    
    // Close the output stream
    fclose($output);
    
    // Exit the script
    exit;
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
