<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');  
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$valid_api_key = "rXor030XWMTWPz2AoIHO7KHqzsCORf8bomvfuCufDG2Ma5C5OlRBPXX2hs1l0tT3";

// Check if the request method is POST and if the key is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the API key from the POST request
    $api_key = isset($_POST['api_key']) ? $_POST['api_key'] : ''; // Get the api_key value from POST
    $c_date = isset($_POST['c_date']) ? $_POST['c_date'] : ''; // Get the c_date value

    // Validate the API key
    if ($api_key === $valid_api_key) {
       
        // Database connection
        $con = mysqli_connect('localhost', 'root', '$Z|d!$1:Dvsl>8E9n;c!', 'franchis_franchisnewcopy');
        if ($con) {
            // Log or return the c_date value to check what's being passed
            echo json_encode(['received_c_date' => $c_date]); // Add this to check the value of c_date

            // Initialize the merged data array
            $mergedData = [];

            // First query: express_fran_insta_apply
            $sql1 = "SELECT * 
                     FROM `express_fran_insta_apply` 
                     WHERE franchisor_id = 'FIHL303369' 
                     AND DATE(create_date) = DATE('$c_date')";
            $result1 = mysqli_query($con, $sql1);
            
            if ($result1) {
                while ($row = mysqli_fetch_assoc($result1)) {
                    // Add data from first query to merged data
                    $mergedData[] = [
                        'id' =>  $row['id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'address' => $row['address'],
                        'city' => $row['city'],
                        'state' => $row['state'],
                        'country' => $row['country'],
                        'pincode' => $row['pincode'],
                        'date' => $row['create_date'],
                        // 'source' => 'express_fran_insta_apply' // Mark source
                    ];
                }
            } else {
                echo json_encode(['error' => 'Error fetching data from express_fran_insta_apply']);
                exit;
            }

            // Second query: useractivity, investor_details, user_accounts
            $sql2 = "SELECT 
                        ua.investor_id,
                        ua.franchisor_visibility_date,
                        id.inv_det_id,
                        id.inv_address,
                        id.inv_country,
                        id.inv_city,
                        id.inv_state,
                        id.inv_pincode,
                        us.name,
                        us.email,
                        us.mobile
                     FROM 
                        `useractivity` ua
                     LEFT JOIN 
                        `investor_details` id ON ua.investor_id = id.investor_id
                     LEFT JOIN 
                        `user_accounts` us ON us.profile_str = ua.investor_id
                     WHERE 
                        ua.franchisor_id = 'FIHL303369'
                        AND DATE(ua.visit_date) = DATE('$c_date')";
            $result2 = mysqli_query($con, $sql2);
            
            if ($result2) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    // Add data from second query to merged data
                    $mergedData[] = [
                        'id' => $row['inv_det_id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['mobile'],
                        'address' => $row['inv_address'],
                        'city' => $row['inv_city'],
                        'state' => $row['inv_state'],
                        'country' => $row['inv_country'],
                        'pincode' => $row['inv_pincode'],
                        'date' => $row['franchisor_visibility_date'],
                        // 'source' => 'useractivity' // Mark source
                    ];
                }
            } else {
                echo json_encode(['error' => 'Error fetching data from useractivity']);
                exit;
            }

            // Send the merged data as the response
            echo json_encode(['data' => $mergedData], JSON_PRETTY_PRINT);
        } else {
            echo json_encode(['error' => 'Error connecting to the database']);
        }
    } else {
        // If the API key is not valid
        echo json_encode(['error' => 'Invalid API key']);
        exit; // Stop further execution
    }
} else {
    // If the request method is not POST
    echo json_encode(['error' => 'Invalid request method']);
}
?>
