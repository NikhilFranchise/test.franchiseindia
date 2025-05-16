<?php
// Set Content-Type to JSON
header('Content-Type: application/json');

// Database connection settings
include('apidb.php');

// Get the page, limit, category, and investment_range parameters from the query string
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Default to page 1
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20; // Default to 20 results per page
$category = isset($_GET['category']) ? $_GET['category'] : 'All'; // Default to 'All' if not provided
$investment_range = isset($_GET['investment_range']) ? (int)$_GET['investment_range'] : null; // Default to null if not provided

// Calculate the OFFSET for the SQL query
$offset = ($page - 1) * $limit;

include('brands.php');

// Filter static data based on category
if ($category !== 'All') {
    // Filter static data by category if a category is specified
    $static_data = array_filter($static_data, function ($item) use ($category) {
        return strtolower($item['catname']) === strtolower($category);
    });
}

// Investment Range Mapping
$investment_ranges = [
    1 => [10000, 50000],
    3 => [50000, 200000],
    5 => [200000, 500000],
    7 => [500000, 1000000],
    9 => [1000000, 2000000],
    11 => [2000000, 3000000],
    13 => [3000000, 5000000],
    15 => [5000000, 10000000],
    17 => [10000000, 20000000],
    19 => [20000000, 50000000],
    21 => [50000000, PHP_INT_MAX] // No upper limit, so we use PHP's maximum integer value
];

// Start the SQL query
$sql = "SELECT f.profile_name, f.franchisor_id, f.company_logo, f.ind_main_cat, f.unit_inv_min, f.unit_inv_max, c.catname
        FROM franchisor_business_details AS f
        JOIN category_final c ON f.ind_main_cat = c.catid
        WHERE f.unit_inv_max < 1500000
        AND f.expansion_location LIKE '%Uttar Pradesh%'
        AND f.profile_status = 1
        
        AND (f.company_logo IS NOT NULL AND f.company_logo <> '')";

// If a category is provided and is not 'All', modify the query to filter by category
if ($category !== 'All') {
    $sql .= " AND c.catname = '" . $conn->real_escape_string($category) . "'";
}

// If an investment range is provided, filter the query by the investment range
if ($investment_range !== null && isset($investment_ranges[$investment_range])) {
    $range = $investment_ranges[$investment_range];
    $sql .= " AND f.unit_inv_min >= " . $range[0] . " AND f.unit_inv_max <= " . $range[1];
}

// Add pagination (LIMIT and OFFSET)
$sql .= " LIMIT $limit OFFSET $offset";

// Execute the query
$result = $conn->query($sql);

// Initialize an array to store the dynamic data
$data = [];

// Check if query was successful and if any rows were returned
if ($result->num_rows > 0) {
    // Fetch the results and store them in the array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Get the total number of records (for pagination purposes)
    $total_result = $conn->query("SELECT COUNT(*) AS total 
                                  FROM franchisor_business_details f
                                  JOIN category_final c ON f.ind_main_cat = c.catid
                                  WHERE f.unit_inv_max < 1500000
                                  AND f.expansion_location LIKE '%Uttar Pradesh%'
                                  AND f.profile_status = 1
                                  
                                  AND (f.company_logo IS NOT NULL AND f.company_logo <> '')");

    // If category is specified, filter the total count by category as well
    if ($category !== 'All') {
        $total_result = $conn->query("SELECT COUNT(*) AS total 
                                      FROM franchisor_business_details f
                                      JOIN category_final c ON f.ind_main_cat = c.catid
                                      WHERE f.unit_inv_max < 1500000
                                      AND f.expansion_location LIKE '%Uttar Pradesh%'
                                      AND f.profile_status = 1
                                      
                                      AND (f.company_logo IS NOT NULL AND f.company_logo <> '')
                                      AND c.catname = '" . $conn->real_escape_string($category) . "'");
    }

    // If an investment range is provided, filter the total count by the investment range
    if ($investment_range !== null && isset($investment_ranges[$investment_range])) {
        $range = $investment_ranges[$investment_range];
        $total_result = $conn->query("SELECT COUNT(*) AS total 
                                      FROM franchisor_business_details f
                                      JOIN category_final c ON f.ind_main_cat = c.catid
                                      WHERE f.unit_inv_max < 1500000
                                      AND f.expansion_location LIKE '%Uttar Pradesh%'
                                      AND f.profile_status = 1
                                      
                                      AND (f.company_logo IS NOT NULL AND f.company_logo <> '')
                                      AND f.unit_inv_min >= " . $range[0] . " AND f.unit_inv_max <= " . $range[1]);
    }

    // Get the total count
    $total_row = $total_result->fetch_assoc();
    $total_records = $total_row['total'];

    // Calculate total pages
    $total_pages = ceil($total_records / $limit);

    // Merge the static data with the dynamic data only on page 1
    if ($page == 1) {
        $final_data = array_merge($static_data, $data); // Static data at the top
    } else {
        $final_data = $data; // Only dynamic data for other pages
    }

    // Return the data along with pagination information
    echo json_encode([
        'status' => 'success',
        'data' => $final_data,
        'total_records' => $total_records,
        'total_pages' => $total_pages,
        'current_page' => $page,
    ]);
} else {
    // If no results found, return an empty response
    echo json_encode(['status' => 'failure', 'message' => 'No data found']);
}

// Close the database connection
$conn->close();
?>
