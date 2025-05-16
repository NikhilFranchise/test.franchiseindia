<?php

$link = mysqli_connect('localhost', 'root', '', 'franchis_franchisnewcopy');
if (!$link) {
    die('Network Problem.... Kindly try after 15 mins!');
}

// Select query to get the franchisors
$freefran = "SELECT DISTINCT(ua.profile_str)
    FROM user_accounts AS ua 
    JOIN express_fran_insta_apply AS efia 
    ON ua.profile_str = efia.franchisor_id
    WHERE ua.profile_status = 1 
    AND ua.profile_type = 1 
    AND ua.membership_type = 0 
    AND ua.created_at >= '2023-01-01' ";
// echo '<br/>';
$query = mysqli_query($link, $freefran);

// Create an array to store processed franchisor_ids

if (mysqli_num_rows($query) > 0) {
    // Fetch each row and append profile_str to $franId array
    while ($row = mysqli_fetch_array($query)) {
        echo $getLeads = "SELECT id, visibility FROM express_fran_insta_apply
                          WHERE franchisor_id='" . $row['profile_str'] . "'
                          ORDER BY id
                          LIMIT 5";
        echo '<br/>';

        $result = mysqli_query($link, $getLeads);
        if ($result) {

            $visibilityCount = 0;
            while ($leadRow = mysqli_fetch_assoc($result)) {
                if ($leadRow['visibility'] == 1) {
                    $visibilityCount++;
                }
                if ($visibilityCount > 0 && $visibilityCount <= 5) { 
                    echo  $instapply = "UPDATE express_fran_insta_apply SET visibility = 0 WHERE id = '" . $leadRow['id'] . "' AND  franchisor_id='" . $row['profile_str'] . "' LIMIT 1 ";

                          echo '<br/>';

                   if (mysqli_query($link, $instapply)) {
                       echo "Records updated successfully.";
                       echo "<br/>";
                   } else {
                        echo "Error updating records: " . mysqli_error($link);
                   }
                }
            }
        } else {
            echo "Error fetching leads: " . mysqli_error($link);
        }
    }
}

mysqli_close($link);
