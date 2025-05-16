<?php
// Set Content-Type to JSON
header('Content-Type: application/json');

// Database connection settings
include('apidb.php');

// Get the page and limit parameters from the query string (default to 1 for page and 20 for limit)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Default to page 1
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20; // Default to 20 results per page

// Calculate the OFFSET for the SQL query
$offset = ($page - 1) * $limit;

// Static data that should be displayed at the top only on the first page
include('brands.php');

// Define the SQL query to fetch dynamic data with pagination
$sql = "SELECT f.profile_name, f.franchisor_id, f.company_logo, f.ind_main_cat, f.unit_inv_min, f.unit_inv_max, c.catname
        FROM franchisor_business_details as f
        JOIN category_final c ON f.ind_main_cat = c.catid
        WHERE f.unit_inv_max < 1500000
        AND f.expansion_location LIKE '%Uttar Pradesh%'
        AND f.profile_status = 1
        
        AND (f.company_logo IS NOT NULL AND f.company_logo <> '')
        LIMIT $limit OFFSET $offset;";

// Execute the query to fetch dynamic data
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
                                  FROM franchisor_business_details 
                                  WHERE unit_inv_max < 1500000 
                                  AND expansion_location LIKE '%Uttar Pradesh%' 
                                  AND profile_status = 1 
                                  
                                  AND (company_logo IS NOT NULL AND company_logo <> '')");
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
