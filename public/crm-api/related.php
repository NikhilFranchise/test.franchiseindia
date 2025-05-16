<?php
header('Content-Type: application/json');

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "franchiseindia";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database Connection Failed: " . $conn->connect_error]));
}

// Fetch all active franchisors
$sql = "SELECT company_name FROM franchisor_business_details WHERE profile_status = 1 LIMIT 1000";

$result = $conn->query($sql);

$matchedBrands = [];
$unmatchedBrands = [];
$matchedCount = 0;
$unmatchedCount = 0;

while ($franDetails = $result->fetch_assoc()) {
    $companyName = trim($franDetails['company_name']);

    // Prepare regex-friendly company name
    $cleanCompanyName = preg_replace('/[^a-zA-Z0-9\s]/', '', $companyName);
    $cleanCompanyName = preg_replace('/\s+/', ' ', $cleanCompanyName);
    $companyNameRegex = mysqli_real_escape_string($conn, $cleanCompanyName);

    // Find matching articles
    $insightQuery = "SELECT title FROM insights_list_english WHERE status = 1  AND LOWER(title) REGEXP LOWER('(^|[[:space:]])$companyNameRegex([[:space:]]|$)') LIMIT 3";

    $insightResult = $conn->query($insightQuery);

    if ($insightResult->num_rows > 0) {
        $articles = [];
        while ($article = $insightResult->fetch_assoc()) {
            $articles[] = [
                'title' => $article['title'],
                
            ];
        }

        // Add to matched brands
        $matchedBrands[] = [
          
            'company_name'   => $franDetails['company_name'],
            'articles'       => $articles
        ];
        $matchedCount++;
    } else {
        // Add to unmatched brands
        $unmatchedBrands[] = [
           
            'company_name'   => $franDetails['company_name'],
        ];
        $unmatchedCount++;
    }
}

// Close the connection
$conn->close();

// Output JSON response
echo json_encode([
    'matched_count'   => $matchedCount,
    'unmatched_count' => $unmatchedCount,
    'matched_brands'  => $matchedBrands,
    'unmatched_brands' => $unmatchedBrands
]);
?>
