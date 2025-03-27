<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "franchiseindia";

$conn = new mysqli($host, $username, $password, $database);
// echo $conn;die;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all active franchisors
$sql = "SELECT fran_detail_id, franchisor_id, profile_name, company_name, unit_inv_min, unit_inv_max, company_logo, ind_main_cat 
        FROM franchisor_business_details 
        WHERE profile_status = 1";
$result = $conn->query($sql);
// print_r($result);die;
$brandData = [];
$unmatchedBrands = [];
while ($franDetails = $result->fetch_assoc()) {
    $companyName = trim($franDetails['company_name']);
    // echo $companyName. '<br/>';
    // Prepare regex-friendly company name
    $cleanCompanyName = preg_replace('/[^a-zA-Z0-9\s]/', '', $companyName);
    $cleanCompanyName = preg_replace('/\s+/', ' ', $cleanCompanyName);
    $companyNameRegex = mysqli_real_escape_string($conn, $cleanCompanyName);

    // Fetch related insights for this franchisor
    $insightQuery = "SELECT COUNT(*) AS match_count 
                     FROM insights_list_english 
                     WHERE status = 1 
                     AND LOWER(title) REGEXP LOWER('(^|[[:space:]])$companyNameRegex([[:space:]]|$)') 
                     ORDER BY created_at DESC 
                     LIMIT 3";

    $insightResult = $conn->query($insightQuery);
    $matchCount = $insightResult->fetch_assoc()['match_count'];
    if ($matchCount != 0) {
        $unmatchedBrands[] = [
            // 'fran_detail_id' => $franDetails['fran_detail_id'],
            // 'franchisor_id'  => $franDetails['franchisor_id'],
            // 'profile_name'   => $franDetails['profile_name'],
            'company_name'   => $franDetails['company_name'],
            // 'unit_inv_min'   => $franDetails['unit_inv_min'],
            // 'unit_inv_max'   => $franDetails['unit_inv_max'],
            // 'company_logo'   => $franDetails['company_logo'],
            // 'ind_main_cat'   => $franDetails['ind_main_cat']
        ];
    }

    // $relatedArticles = [];
    // while ($article = $insightResult->fetch_assoc()) {
    //     // $article['url'] = "insights/en/" . strtolower($article['insight_type']) . "/" . $article['slug'] . "." . $article['news_id'];
    //     $relatedArticles[] = $article['title'];
    // }

    // Store franchisor details with related articles
    // $brandData[] = [
        //'fran_detail_id' => $franDetails['fran_detail_id'],
        //'franchisor_id'  => $franDetails['franchisor_id'],
        //'profile_name'   => $franDetails['profile_name'],
        // 'company_name'   => $franDetails['company_name'],
        // 'unit_inv_min'   => $franDetails['unit_inv_min'],
        // 'unit_inv_max'   => $franDetails['unit_inv_max'],
        // 'company_logo'   => $franDetails['company_logo'],
        // 'ind_main_cat'   => $franDetails['ind_main_cat'],
        // 'related_articles' => $relatedArticles
    // ];
}
// exit;

// Close connection
$conn->close();

// Output result as JSON
header('Content-Type: application/json');
echo json_encode($unmatchedBrands);
