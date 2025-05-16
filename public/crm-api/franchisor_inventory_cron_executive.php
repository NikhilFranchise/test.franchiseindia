<?php
ini_set('max_execution_time', 1200);

include_once ("configpg/function.admin.php");

$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_GET['__token']) || $_GET['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
include("configpg/configMINew.php");


// Color Codes
$green = '#bcf442';
$yellow = '#f4e541';
$red = '#f45b41';
$white = '#ffffff';


$obj_admin_function = new admin_general_function();
$rs_newsCount = $obj_admin_function->get_paid_franchisor_inventory_count($link);

$newsCount = $obj_admin_function->get_num_record($rs_newsCount);




$fetch_details = $obj_admin_function->get_fetch_record($rs_newsCount);


//  Old Plan

$targetLeadsArr = array(
    2 => '480',
    5 => '180',
    19 => '540',
    7 => '600',
    3 => '300',
    20 => '420',
    21 => '360',
    22 => '300',
    23 => '240',
    24 => '180',
    25 => '120'
);

$NewPlan = array(
    26 => array(
        '0' => '720',
        '1' => '500',
        '2' => '300',
        '3' => '170'
    ) ,
    27 => array(
        '0' => '600',
        '1' => '420',
        '2' => '250',
        '3' => '140'
    ) ,
    28 => array(
        '0' => '540',
        '1' => '380',
        '2' => '225',
        '3' => '125'
    ) ,
    29 => array(
        '0' => '480',
        '1' => '340',
        '2' => '200',
        '3' => '110'
    ) ,
    30 => array(
        '0' => '300',
        '1' => '210',
        '2' => '125',
        '3' => '70'
    ) ,
    31 => array(
        '0' => '240',
        '1' => '170',
        '2' => 'NA',
        '3' => 'NA'
    ) ,
    32 => array(
        '0' => '180',
        '1' => '130',
        '2' => 'NA',
        '3' => 'NA'
    ) ,
    33 => array(
        '0' => '120',
        '1' => '90',
        '2' => 'NA',
        '3' => 'NA'
    )
);

$capacityArray = array(
    "1" => "Email Blast",
    "2" => "TBO Standard",
    "3" => "Featured Franchise Companies",
    "4" => "Leading Business Opportunities",
    "5" => "Directory Listing",
    "6" => "Category Sponsorship",
    "7" => "TBO Platinum",
    "8" => "Home Left Banner",
    "9" => "Home Right Banner",
    "10" => "Home Top Banner",
    "11" => "Home Bottom Banner",
    "12" => "News Activity",
    "13" => "Interview Activity",
    "14" => "Newsletter",
    "15" => "TBO FIBL",
    "16" => "Top Opportunities FIBL",
    "17" => "TBO International",
    "18" => "Top Opportunities International",
    "19" => "TBO Premium",
    "20" => "Master Category- Sponsorship",
    "21" => "Sub Category- Sponsorship",
    "22" => "Sub- Sub Category- Sponsorship",
    "23" => "Master Category-Listing",
    "24" => "Sub Category-Listing",
    "25" => "Sub -Sub Category-Listing",
    "26" => "Sliding Banner",
    "27" => "Home Page TBO Platinum",
    "28" => "Home Page BFO",
    "29" => "Home Page TFO Standard",
    "30" => "Home Page FFC",
    "31" => "Master Category",
    "32" => "Sub Category",
    "33" => "Sub-Sub"
);
$sno = $from + 1;

$franarr = array();
$criticalFranchisors = "";
for ($i = 0;$i < $newsCount;$i++)
{
    $PlanTenure = $fetch_details[$i]['plan_tenure'];
    $capacity = $capacityArray[$fetch_details[$i]['product_id']];
	$franchisorData = $obj_admin_function->franchisor_nameRange($link,$fetch_details[$i]['franchisor_id']);
   $start_date = date_create($fetch_details[$i]['start_date']);
     $end_date = date_create($fetch_details[$i]['end_date']);
     $days_diff = date_diff($start_date,$end_date);
     $current_date = date_create(date("Y-m-d"));
     $remaining = date_diff($end_date, $current_date);
     
    // For Checking new Upadted Plan 
    if ($fetch_details[$i]['product_id'] > 25)
    {
        $Temp_TragetData = $NewPlan[$fetch_details[$i]['product_id']][$franchisorData['range']];
    }
    else
    {
        $Temp_TragetData = $targetLeadsArr[$fetch_details[$i]['product_id']];
    }
    
    if($days_diff->y > 0 && $days_diff->m >= 0){
           $targetLead = $Temp_TragetData;  
           $TargetMonthly = $targetLead/12; 
        } else if($days_diff->y == 0 && $days_diff->m > 0){
          $targetLead = ($Temp_TragetData / 12 ) * $days_diff->m;
          $TargetMonthly = $targetLead/$days_diff->m;
        } else if($days_diff->y == 0 && $days_diff->m == 0){
          $targetLead = (($Temp_TragetData / 12 ) * $days_diff->m)* .5;
          $TargetMonthly = $targetLead;
        } else{
          $targetLead = 0;
          $TargetMonthly = 0;
        }
        
    $acquired_till_date = $obj_admin_function->getMonthlyLeads($link, $fetch_details[$i]['franchisor_id'], $fetch_details[$i]['start_date']);
    $acquired_current_month = $obj_admin_function->getThisMonthlyLeads($link, $fetch_details[$i]['franchisor_id']);
    
    $complete_lead_percent = ($targetLead > $acquired_till_date)? 100 - (($targetLead - $acquired_till_date)*100)/ $targetLead : 100;
    $days_remaining = $remaining->days;
    // New Array
    $franarr[$i]['company_name'] = $franchisorData['company_name'];
    $franarr[$i]['capacity'] = $capacity;
    $franarr[$i]['franchisor_id'] = $fetch_details[$i]['franchisor_id'];
    $franarr[$i]['start_date'] = $fetch_details[$i]['start_date'];
    $franarr[$i]['end_date'] = $fetch_details[$i]['end_date'];
    $franarr[$i]['total_lead_target_committed'] = round($targetLead);
    $franarr[$i]['target_lead_monthly'] = round($TargetMonthly);
    $franarr[$i]['total_lead_acquired_till_date'] = $acquired_till_date;
    $franarr[$i]['lead_acquired_in_current_month'] = $acquired_current_month;
    //$franarr[$i]['complete_lead'] = $complete_lead;
    $franarr[$i]['complete_lead_percent'] = round($complete_lead_percent);
    $franarr[$i]['days_remaining'] = $days_remaining;
    $sno++;

}

// Sort by completeLead ASC
foreach ($franarr as $key => $val)
{
    $completeLead[$key] = $val['sortVal'];
}
array_multisort($completeLead, SORT_ASC, $franarr);
// End of Business Logic

//  Start of HTML Part

$body .= '<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 700px;
    margin: 0 auto;
    "id: " . 
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    font-size: 12px;
}
tr {
    background-color: #ffffff;
}
</style>';

$body .= '<table id="results" border="0"  cellpadding="0" cellspacing="0">
                <tbody>
                    <caption class="header">Franchisor Leads Management List (' . $newsCount . ')</caption>
                    <tr class="sub-header">
                    <th width="4%" class="LtRtbdr">S.No.</th>
                    <th width="10%">Company Name</th>
                    <th width="5%">Capacity</th>
                    <th width="10%">Start Date </th>
                    <th width="10%">End Date</th>
                    <th width="5%">Total Lead Target Committed</th>
                    <th width="2%">Target Lead Monthly</th>
                    <th width="2%">Total Lead acquired Till date  </th>
                    <th width="2%">Lead acquired in current month </th>
                    <th width="2%">Complete Lead %(Till Date) </th>   
                    <th width="2%">Days Remaining  </th>    
                </tr>';

$i = 1;

// Changes in logic
 $sqlExecutive = "SELECT DISTINCT(executive_name) from `franchisor_payment_history` WHERE status = 1 AND executive_name NOT LIKE '%@franchiseindia.in%'";
$resultExecutive = mysqli_query($link,$sqlExecutive);

$finalData = [];

if (mysqli_num_rows($resultExecutive) > 0)
{
    // output data of each row
    while ($row = mysqli_fetch_assoc($resultExecutive))
    {

        $sqlFranchisorIds = "SELECT DISTINCT(franchisor_id) from `franchisor_payment_history` WHERE status = 1 AND executive_name = '" . $row["executive_name"] . "'";
        $resultFranchisorIds = mysqli_query($link,$sqlFranchisorIds);

        if (mysqli_num_rows($resultFranchisorIds) > 0)
        {
            // output data of each row
            $franchisorIds = [];
            while ($row1 = mysqli_fetch_assoc($resultFranchisorIds))
            {
                array_push($franchisorIds, $row1['franchisor_id']);
            }
            $tempArrayExecutive = ["email" => $row["executive_name"], "franchisorIds" => $franchisorIds];

            array_push($finalData, $tempArrayExecutive);
        }
        else
        {
            echo "No results <br>";
        }
    }
}
else
{
    echo "0 results";
}


foreach ($finalData as $dataFinal)
{

    $singleMailData = "";
    $sll = 1;
    $redRow = array();
    $yellowRow = array();
    $greenRow = array();
    foreach ($franarr as $key => $val)
    {  
        
        $bgColor = $white;
        if ($val['complete_lead_percent'] < 50) $bgColor = $red;
        if ($val['complete_lead_percent'] >= 50 && $val['complete_lead_percent'] <= 75) $bgColor = $yellow;
        if ($val['complete_lead_percent'] > 75 && $val['complete_lead_percent'] <= 100) $bgColor = $green;

        $lastFiveDays = date('Y-m-d 00:00:00', mktime(0, 0, 0, date('m') , date('d') - 5, date('Y')));
        if (strtotime($lastFiveDays) < strtotime($val['thisYmd']) && $val['sortVal'] < 50) $bgColor = $white;
        //-------------------------------------------------------------
        if($val['complete_lead_percent'] < 50){
            
           $redRow[] = $val;     
        } else if($val['complete_lead_percent'] >= 50 && $val['complete_lead_percent'] <= 75){
            
                $yellowRow[] = $val;
            } else{
                
                $greenRow[] = $val;
               
            }
        
        $i++;

        // if (in_array($val['franchisor_id'], $dataFinal['franchisorIds']))
        // {
            //$singleMailData .= $singleRow;
        //}
        $sll++;
    }
	}
     $newSl = 1;
     foreach ($redRow as $key => $val) {
         $row .= '<tr style="background-color: ' . $red . '">
                    <td align="center" valign="top" class="brdrLft">' . $newSl++ . '</td>
                    <td align="left" valign="top">' . $val['company_name'] . '<br/><b>' . $val['franchisor_id'] . '</b></td>
                     <td align="left" valign="top">' . $val['capacity'] . '</td>
                    <td align="left" valign="top">' . $val['start_date'] . '</td>
                    <td align="left" valign="top">' . $val['end_date'] . '</td>
                    <td align="left" valign="top">' . $val['total_lead_target_committed'] . '</td>               
                    <td align="left" valign="top">' . $val['target_lead_monthly'] . '</td>
                    <td align="left" valign="top">' . $val['total_lead_acquired_till_date'] . '</td>
                    <td align="left" valign="top">' . $val['lead_acquired_in_current_month'].'</td>
                    
                    <td align="left" valign="top">' . $val['complete_lead_percent'] . ' %</td>
                    <td align="left" valign="top">' . $val['days_remaining'] . '</td>
                </tr>';
     }

     foreach ($yellowRow as $key => $val) {
         $row .= '<tr style="background-color: ' . $yellow . '">
                    <td align="center" valign="top" class="brdrLft">' . $newSl++ . '</td>
                    <td align="left" valign="top">' . $val['company_name'] . '<br/><b>' . $val['franchisor_id'] . '</b></td>
                     <td align="left" valign="top">' . $val['capacity'] . '</td>
                    <td align="left" valign="top">' . $val['start_date'] . '</td>
                    <td align="left" valign="top">' . $val['end_date'] . '</td>
                    <td align="left" valign="top">' . $val['total_lead_target_committed'] . '</td>               
                    <td align="left" valign="top">' . $val['target_lead_monthly'] . '</td>
                    <td align="left" valign="top">' . $val['total_lead_acquired_till_date'] . '</td>
                    <td align="left" valign="top">' . $val['lead_acquired_in_current_month'].'</td>
                    
                    <td align="left" valign="top">' . $val['complete_lead_percent'] . ' %</td>
                    <td align="left" valign="top">' . $val['days_remaining'] . '</td>
                </tr>';
     }

     foreach ($greenRow as $key => $val) {
         $row .= '<tr style="background-color: ' . $green . '">
                    <td align="center" valign="top" class="brdrLft">' . $newSl++ . '</td>
                    <td align="left" valign="top">' . $val['company_name'] . '<br/><b>' . $val['franchisor_id'] . '</b></td>
                     <td align="left" valign="top">' . $val['capacity'] . '</td>
                    <td align="left" valign="top">' . $val['start_date'] . '</td>
                    <td align="left" valign="top">' . $val['end_date'] . '</td>
                    <td align="left" valign="top">' . $val['total_lead_target_committed'] . '</td>               
                    <td align="left" valign="top">' . $val['target_lead_monthly'] . '</td>
                    <td align="left" valign="top">' . $val['total_lead_acquired_till_date'] . '</td>
                    <td align="left" valign="top">' . $val['lead_acquired_in_current_month'].'</td>
                    
                    <td align="left" valign="top">' . $val['complete_lead_percent'] . ' %</td>
                    <td align="left" valign="top">' . $val['days_remaining'] . '</td>
                </tr>';
     }
	 $singleMailData = $row;
	//if (!empty($dataFinal['email']) && !empty($singleMailData))
	//{
		echo $body . $singleMailData;
	//}
?>
