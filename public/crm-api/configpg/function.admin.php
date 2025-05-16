<?php
/*
Title : Admin Panel Sales Department
Created Date : 06th August 2012
Modified By : Sachin
*/

class admin_general_function{

	var $query_result;
	var $num_result;
	var $data;
	var $row;
	var $result_set;
	var $result;
	var $query;
	
	/* Note: Status field either D - DE-ACTIVE or A - ACTIVE */

//------------------------------------------------------------------------------------------------------------------------------------------
	// FUNCTION TO EXECUTE THE QUERY 

	function get_query_result($link,$query)
	{		
		$query_result = mysqli_query($link,$query);
		
		if(!$query_result){

			$query_result = mysqli_errno() . ": " . mysqli_error();

		}
		
		return $query_result;
		
	}//End 
	
//------------------------------------------------------------------------------------------------------------------------------------------

	// FUNCTION TO FIND THE NUMBER OF RECORDS
	
	function get_num_record($result)
	{

		$num_result = mysqli_num_rows($result);
		
		return $num_result;
		
	}//End 
	
//------------------------------------------------------------------------------------------------------------------------------------------
	// FUNCTION TO FETCH THE RECORD FROM THE DATABASE
	
	function get_fetch_record($result)
	{	
		$data = 0 ;		
		while ($row = mysqli_fetch_assoc($result)) 
		{
			$result_set[$data] = $row;
			$data++ ;
		}
		mysqli_free_result($result);
		
		return $result_set;
		
	}//End 

//------------------------------------------------------------------------------------------------------------------------------------------
	// FUNCTION TO ESCAPE SPECIAL CHARACTER IN A ARRAY
	
	function escape_array_string($array_value)
	{	
		return array_map("mysql_real_escape_string",$array_value);
		
	}//End

//------------------------------------------------------------------------------------------------------------------------------------------

	function getOneLevel($catId){
		$query=mysql_query("SELECT catid FROM category_final WHERE parent_id='".$catId."'");
		$cat_id=array();
		if(mysql_num_rows($query)>0){
			while($result=mysql_fetch_assoc($query)){
				$cat_id[]=$result['catid'];
				$$cat_id=array_merge($cat_id,array($result['catid']));
			}
		}   
		return $cat_id;
	}
	function getChildren($parent_id) {
		$tree = Array();
		if (!empty($parent_id)) {
			$tree = $this->getOneLevel($parent_id);
			foreach ($tree as $key => $val) {
				$ids = $this->getChildren($val);
				$tree = array_merge($tree, $ids);
			}
		}
		return $tree;
	}


//############################## Function Authentication ####################################################

	function usrAuthenticate($name){

		$query = sprintf("SELECT * FROM `admin_sales_team` WHERE `email` = '%s' AND `status` = '%s'",mysql_real_escape_string($name), "A");

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End	
	
	function updateLastLogin($admUsrName){

		$query = "UPDATE `admin_sales_team` SET  `lastvisitDate` = NOW() WHERE `email` = '".$admUsrName."'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	
	function get_user_details($uesr_id){

		$query = "SELECT * FROM `admin_sales_team` WHERE `uid` = '".$uesr_id."'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	
	function check_user_email($email){

		$query = "SELECT `email` FROM `admin_sales_team` WHERE `email` = '".$email."'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	
//############################## Function User JotPad ######################################################

	function update_jotpad($uesr_id,$txtValue){

		$query = "UPDATE `admin_jotpad` SET  `message` = '".addslashes($txtValue)."' WHERE `user_id` = '".$uesr_id."'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	
	function get_jotpad_details($uesr_id){

		$query = "SELECT `message` FROM `admin_jotpad` WHERE `user_id` = '".$uesr_id."'";

		$result = $this -> get_query_result($query);
		
		return $result;
	}//End
	
	function insert_jotpad_user($txtUsrEmailId,$txtUsrName){

		$message = "Welcome ".addslashes($txtUsrName)."!...";
		
		$query = "INSERT INTO `admin_jotpad` SET `user_id` 	= '".addslashes($txtUsrEmailId)."',
		`message` 	= '".$message."',
		`createDate`	= NOW()";

		$result = $this -> get_query_result($query);
		return $result;
	}//End
	
//############################## Admin Franchisor ##############################################################

	function get_franchisor_count($search_name,$search_status,$city,$authenticate,$type,$search_catg,$search_from,$search_to){

		$query = "SELECT DISTINCT(a.franchisor_id) FROM `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = b.`franchisor_id` AND a.confirmation <> 'H' ";

		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.confirmation ='".$search_status."'";	
		}

		if($city){ 	  
			$query .= " AND b.city LIKE '%".$city."%'";	
		}

		if($authenticate){ 	  
			$query .= " AND b.authenticate ='".$authenticate."'";	
		}
		
		if($type){ 	  
			$query .= " AND a.franchisor_type ='".$type."'";	
		}

		if($search_catg){ 	  
			$catids = $this -> getChildren($search_catg);
			$catidsIn = implode(", ", $catids);
			if(count($catids) > 0){
				$query .= " AND b.industry_category_final IN ($catidsIn) ";		
			}

		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";		
		}
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	
	function get_franchisor_details_pagenation($search_name,$search_status,$city,$authenticate,$type,$search_catg,$search_from,$search_to,$from,$perPage){	 

		$query = "SELECT a.franchisor_id, a.email, a.confirmation, a.email,a.password, a.confirm_date, a.franchisor_type, b.franchisor_address, b.city, b.franchisor_name, b.industry_cat, b.industry_category_final, b.industry_category, b.authenticate, b.submission_date, b.mcategory, b.subcategory, b.finalsubcategory, b.required_investor  FROM `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = b.`franchisor_id` AND a.confirmation <> 'H'  ";
		
		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.confirmation ='".$search_status."'";	
		}
		if($city){ 	  
			$query .= " AND b.city LIKE '%".$city."%'";	
		}

		if($authenticate){ 	  
			$query .= " AND b.authenticate ='".$authenticate."'";	
		}
		if($type){ 	  
			$query .= " AND a.franchisor_type ='".$type."'";	
		}
		if($search_catg){ 	  
			$catids = $this -> getChildren($search_catg);
			$catidsIn = implode(", ", $catids);
			if(count($catids) > 0){
				$query .= " AND b.industry_category_final IN ($catidsIn) ";		
			}

		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";			
		}
		
		$query .= " GROUP BY a.franchisor_id ORDER BY b.`submission_date` DESC LIMIT $from , $perPage";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End 

	/*** 																	start 						**/
	function get_franchisor_details_inventory($search_name,$search_status,$city,$authenticate,$type,$search_catg,$search_from,$search_to,$from,$perPage){	 

		$query = "SELECT * FROM `franchisor_inventory_management`";
		
		if($search_name){ 	  
			$query .= " AND title LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.confirmation ='".$search_status."'";	
		}
		if($city){ 	  
			$query .= " AND b.city LIKE '%".$city."%'";	
		}

		if($authenticate){ 	  
			$query .= " AND b.authenticate ='".$authenticate."'";	
		}
		if($type){}


			if($search_from && $search_to){ 	  
				$query .= " AND starttime BETWEEN '".$search_from."' AND '".$search_to."'";			
			}

			$query .= "ORDER BY `time` DESC LIMIT $from , $perPage";

			$result = $this -> get_query_result($query);

			return $result;	
	}//End 
	
	
	/**                           **/	
	function get_franchisor_inventory_count($search_name,$search_status,$city,$authenticate,$type,$search_catg,$search_from,$search_to){

		$query = "SELECT DISTINCT(franchisor_id) FROM `franchisor_inventory_management`";

		if($search_name){ 	  
			$query .= " AND franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND  confirmation ='".$search_status."'";	
		}

		if($city){ 	  
			$query .= " AND city LIKE '%".$city."%'";	
		}

		if($authenticate){ 	  
			$query .= " AND authenticate ='".$authenticate."'";	
		}
		
		if($type){ 	  
			$query .= " AND franchisor_type ='".$type."'";	
		}

		if($search_catg){ 	  
			$catids = $this -> getChildren($search_catg);
			$catidsIn = implode(", ", $catids);
			if(count($catids) > 0){
				$query .= " AND b.industry_category_final IN ($catidsIn) ";		
			}

		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";		
		}
		//$query .= " DESC LIMIT $from , $perPage";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	/** 																	end Start 	`				**/


	/** for pagenation **/
	function get_franchisor_inventory_count_pagenation1($search_name,$search_status,$city,$selSearchAuthenticate,$selSearchType,$search_catg,$search_from,$search_to, $from,$perPage){

		echo  $query = "SELECT * FROM `franchisor_inventory_management`";

		die;

		if($search_name){ 	  
			$query .= " AND franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND  confirmation ='".$search_status."'";	
		}

		if($city){ 	  
			$query .= " AND city LIKE '%".$city."%'";	
		}

		if($authenticate){ 	  
			$query .= " AND authenticate ='".$authenticate."'";	
		}
		
		if($type){ 	  
			$query .= " AND franchisor_type ='".$type."'";	
		}

		if($search_catg){ 	  
			$catids = $this -> getChildren($search_catg);
			$catidsIn = implode(", ", $catids);
			if(count($catids) > 0){
				$query .= " AND b.industry_category_final IN ($catidsIn) ";		
			}

		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";		
		}
		echo $query .= " DESC LIMIT $from , $perPage";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function get_paid_franchisor_inventory_count($link)
	{
		$query = "SELECT `franchisor_id`, `product_id`, `plan_tenure`, `status`, `start_date`, `end_date` FROM `franchisor_payment_history` WHERE status = 1 AND amount > 0 AND start_date < NOW() AND end_date > NOW() AND product_id IN('2','3','5','7','19','20','21','22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33')";
		$result = $this -> get_query_result($link, $query);

		return $result;
    }//End

	function get_paid_franchisor_inventory_count_all()
	{
		$query = "SELECT `franchisor_id`, `product_id`, `amount`, `fresh_entry`, `plan_tenure`, `status`, `start_date`, `end_date` FROM `franchisor_payment_history` WHERE status = 1 AND start_date < NOW() AND end_date > NOW() AND product_id IN('2','3','5','7','19','20','21','22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33')";
		$result = $this -> get_query_result($query);

		return $result;
    }//End


    function get_paid_franchisor_inventory_expired()
    {
    	$query = "SELECT COUNT(1) Cnt, `product_id` ,  `plan_tenure`, `franchisor_id` ,  `amount` ,  `pay_mode` ,  `pay_details` ,  `pay_date` ,  `executive_name` ,  `status` ,  `created_at` , `start_date` ,  `end_date` ,  `offer_desc`, `track_id` FROM `franchisor_payment_history` WHERE status = 2 AND end_date >= '2017-04-01 00:00:00' AND `product_id` IN('2','3','5','7','19','20','21','22', '23', '24', '25') AND amount > 0 GROUP BY franchisor_id HAVING Cnt = 1";
    	$result = $this -> get_query_result($query);
    	return $result;
    }//End

    /** **/
    function get_franchisor_details_pagenation1($search_name,$search_status,$city,$authenticate,$type,$search_catg,$search_from,$search_to,$from,$perPage){	 

    	$query = "SELECT a.franchisor_id, a.email, a.confirmation, a.email,a.password, a.confirm_date, a.franchisor_type, b.franchisor_address, b.city, b.franchisor_name, b.industry_cat, b.industry_category_final, b.industry_category, b.authenticate, b.submission_date FROM `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = b.`franchisor_id` AND a.confirmation <> 'H'  ";

    	if($search_name){ 	  
    		$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
    	}

    	if($search_status){ 	  
    		$query .= " AND a.confirmation ='".$search_status."'";	
    	}
    	if($city){ 	  
    		$query .= " AND b.city LIKE '%".$city."%'";	
    	}

    	if($authenticate){ 	  
    		$query .= " AND b.authenticate ='".$authenticate."'";	
    	}
    	if($type){ 	  
    		$query .= " AND a.franchisor_type ='".$type."'";	
    	}
    	if($search_catg){ 	  
    		$catids = $this -> getChildren($search_catg);
    		$catidsIn = implode(", ", $catids);
    		if(count($catids) > 0){
    			$query .= " AND b.industry_category_final IN ($catidsIn) ";		
    		}

    	}

    	if($search_from && $search_to){ 	  
    		$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";			
    	}

    	$query .= " GROUP BY a.franchisor_id ORDER BY b.`industry_cat_main` DESC LIMIT $from , $perPage";

    	$result = $this -> get_query_result($query);

    	return $result;	
	}//End 
	
	function get_franchisor_count_user($search_name,$search_status,$city,$authenticate,$type,$search_catg,$search_from,$search_to,$from,$perPage){

		$query = "SELECT DISTINCT(a.franchisor_id) FROM `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = b.`franchisor_id` AND a.confirmation NOT IN ('Y','H') ";

		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.confirmation ='".$search_status."'";	
		}
		if($city){ 	  
			$query .= " AND b.city LIKE '%".$city."%'";	
		}
		if($authenticate){ 	  
			$query .= " AND b.authenticate ='".$authenticate."'";	
		}
		if($type){ 	  
			$query .= " AND a.franchisor_type ='".$type."'";	
		}
		
		if($search_catg){ 	  
			$catids = $this -> getChildren($search_catg);
			$catidsIn = implode(", ", $catids);
			if(count($catids) > 0){
				$query .= " AND b.industry_category_final IN ($catidsIn) ";		
			}

		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";		
		}
		$query .= " DESC LIMIT $from , $perPage";
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End		
	
	function get_franchisor_details_pagenation_user($search_name,$search_status,$city,$authenticate,$type,$search_catg,$search_from,$search_to,$from,$perPage){	 

		$query = "SELECT a.franchisor_id, a.email, a.confirmation, a.email,a.password, a.confirm_date, a.franchisor_type, b.franchisor_address, b.franchisor_name, b.industry_cat, b.industry_cat, b.industry_category_final, b.industry_category, b.authenticate, b.submission_date FROM `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = b.`franchisor_id` AND a.confirmation NOT IN ('Y','H') ";
		
		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.confirmation ='".$search_status."'";	
		}
		if($city){ 	  
			$query .= " AND b.city LIKE '%".$city."%'";	
		}

		if($authenticate){ 	  
			$query .= " AND b.authenticate ='".$authenticate."'";	
		}
		
		if($type){ 	  
			$query .= " AND a.franchisor_type ='".$type."'";	
		}

		if($search_catg){ 	  
			$catids = $this -> getChildren($search_catg);
			$catidsIn = implode(", ", $catids);
			if(count($catids) > 0){
				$query .= " AND b.industry_category_final IN ($catidsIn) ";		
			}

		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";			
		}
		
		$query .= " GROUP BY a.franchisor_id ORDER BY b.`submission_date` DESC LIMIT $from , $perPage";
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End 
	
	function get_paid_franchisor_count($search_name,$search_catg,$search_from,$search_to){

		//$query = "SELECT a.franchisor_id FROM `franchisor_account` AS a, `franchisor_business_details` AS b WHERE a.franchisor_type = 'P' AND (SELECT `franchisor_id` FROM franchisor_account WHERE a.`franchisor_id` = b.`franchisor_id`) IN (SELECT `franchisor_id` FROM `advertisement` WHERE verified >= 1)";
		
		$query = "SELECT DISTINCT(a.`franchisor_id`) FROM `advertisement` a LEFT JOIN `franchisor_business_details` b ON a.`franchisor_id` = b.`franchisor_id` LEFT JOIN franchisor_account c ON c.`franchisor_id` = a.`franchisor_id` WHERE c.franchisor_type = 'P' AND a.`ad_cat`='DL'";

		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.confirmation ='".$search_status."'";	
		}

		if($search_catg){ 	  
			$query .= " AND b.industry_cat LIKE '%".$search_catg."%'";		
		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";		
		}

		$result = $this -> get_query_result($query);

		return $result;	
	}//End		
	
	function get_paid_franchisor_details_pagenation($search_name,$search_catg,$search_from,$search_to,$from,$perPage){	 

		//$query = "SELECT a.franchisor_id, a.email, a.confirmation, a.confirm_date, b.franchisor_address, b.franchisor_name, b.industry_cat, b.submission_date FROM `franchisor_account` AS a, `franchisor_business_details` AS b WHERE a.franchisor_type = 'P' AND (SELECT `franchisor_id` FROM franchisor_account WHERE a.`franchisor_id` = b.`franchisor_id`) IN (SELECT `franchisor_id` FROM `advertisement` WHERE verified >= 1)";
		
		$query= "SELECT b.franchisor_address, b.franchisor_name, b.industry_cat, b.submission_date, c.franchisor_id, c.password, c.email, c.confirmation, c.confirm_date FROM advertisement a LEFT JOIN franchisor_business_details b ON a.franchisor_id = b.franchisor_id LEFT JOIN franchisor_account c ON c.`franchisor_id` = a.`franchisor_id` WHERE c.franchisor_type = 'P' AND a.ad_cat='DL'";
		
		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.confirmation ='".$search_status."'";	
		}

		if($search_catg){ 	  
			$query .= " AND b.industry_cat LIKE '%".$search_catg."%'";		
		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND b.submission_date BETWEEN '".$search_from."' AND '".$search_to."'";			
		}
		
		$query .= " GROUP BY a.franchisor_id ORDER BY b.`submission_date` DESC LIMIT $from , $perPage";
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End 
	
	function getFranchisorById($franID){

		$query = "SELECT a.*, b.* FROM  `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = '$franID' AND b.`franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}
	
	function getFranchisorTrade($franID){

		$query = "SELECT * FROM  `franchisor_tradepartners` WHERE `franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}
	
	function getFranchisorMaster($franID){

		$query = "SELECT * FROM  `master_franchisor` WHERE `franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}
	
	function get_franchisor_status($franID){

		$query = "SELECT a.email, a.confirmation, a.confirm_date, b.franchisor_address, b.franchisor_name, b.industry_cat, b.submission_date  FROM  `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = b.`franchisor_id` LIMIT 10";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}
	
	function update_franchisor_status($fran_id){

		$query = "UPDATE `franchisor_account` SET `confirmation` = 'Y', confirm_date = now() WHERE `franchisor_id` = '$fran_id'";

		$result = $this -> get_query_result($query);

		return $result;	
	}

	function update_franchisor_bus_status($fran_id){

		$query = "UPDATE `franchisor_business_details` SET `status` = 1, time = now() WHERE `franchisor_id` = '$fran_id'";

		$result = $this -> get_query_result($query);

		return $result;	
	}

	function update_franchisor_authenticate($fran_id, $authenticate){

		$query = "UPDATE `franchisor_business_details` SET `authenticate` = '$authenticate' WHERE `franchisor_id` = '$fran_id'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}

	function insert_advertisement_details($franID,$categoryID,$franName){
		$query=mysql_query("SELECT franchisor_id FROM advertisement WHERE franchisor_id='".$franID."' AND `ad_cat` = 'DL'");
		if(mysql_num_rows($query)>0){
			$query = "UPDATE `advertisement` SET  `catid` 	 		= '".addslashes($categoryID)."',
			`ad_content` 	 	= '".addslashes($franName)."',
			`begin_dt`	 	= NOW()
			WHERE franchisor_id='".$franID."' AND `ad_cat` = 'DL'";

		}else{
			$query = "INSERT INTO `advertisement` SET `franchisor_id` 	= '".addslashes($franID)."', 
			`ad_cat`	 		= 'DL',
			`catid` 	 		= '".addslashes($categoryID)."',
			`ad_content` 	 	= '".addslashes($franName)."',
			`begin_dt`	 	= NOW()";
		}
		$result = $this -> get_query_result($query);
		
		return $result;	
	}	
	
	function get_franchisor_account($franID){

		$query = "SELECT * FROM `franchisor_account` WHERE `franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}
	
	function getFranBusinessDetails($franID){

		$query = "SELECT * FROM  `franchisor_business_details` WHERE `franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		
		return $result;
	}
	function getFranBusinessinventoryDetails($franID){

		$query = "SELECT * FROM  `franchisor_inventory_management` WHERE `franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		
		return $result;
	}	
	
	function delete_franchisor($fid){

		$franTableArr = array("1" => "franchisor_tradepartners", "2" => "master_franchisor", "3" => "franchisor_business_details", "4" => "franchisor_account");
		
		for($i=1;$i<=count($franTableArr);$i++){		

			$query = "";
			
			$query = "DELETE FROM `$franTableArr[$i]` WHERE `franchisor_id` = '".$fid."'";
			
			$result = $this -> get_query_result($query);
		}
		
/*	echo $query = "
		   DELETE franchisor_account, master_franchisor, franchisor_tradepartners, franchisor_business_details 
		   FROM franchisor_account
		   LEFT JOIN master_franchisor
		   ON franchisor_account.franchisor_id = master_franchisor.franchisor_id
		   LEFT JOIN franchisor_tradepartners
		   ON master_franchisor.franchisor_id = franchisor_tradepartners.franchisor_id
		   LEFT JOIN franchisor_business_details
		   ON franchisor_tradepartners.franchisor_id = franchisor_business_details.franchisor_id
		   WHERE franchisor_business_details.franchisor_id = '$fid'";  
		   exit;
		   $result = $this -> get_query_result($query);*/
		   return $result;	
	}//End
	
	function delete_fran_reg_confirm($email){

		$query = "DELETE FROM `reg_confirmation` WHERE `email` = '".$email."'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	
	function get_verified_account($franID){

		$query = "SELECT * FROM `advertisement` WHERE `franchisor_id` = '$franID' AND `ad_cat` = 'DL'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}
	
	function update_franchisor_verification($status, $fran_id){

		$query = "UPDATE `advertisement` SET `verified` = '".$status."', `ad_cat` = 'DL' WHERE `franchisor_id` = '".$fran_id."'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

//############################ End Franchisor ##################################################################

//###############FICOM CRM MODULE BEGAIN########################################################################
	function get_ficomcrm_id($franID){

		$query = "SELECT `franchisor_id` FROM `ficomcrm_tasks` WHERE `franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		$result = $this -> get_num_record($result);
		
		return $result;	
	}
	
	function ShowComment($franchiseId){
		$query = "Select * From client_comment WHERE `franchisor_id` = '".$franchiseId."' ORDER BY cid DESC";
		$result = $this -> get_query_result($query);
		return $result;
	}	
	
	
	
	function insert_ficomcrm_details($franID,$ceo_name,$franName,$addr,$phone,$email,$url,$franchisorType,$sub_date,$state){
		
		$query = "INSERT INTO `ficomcrm_tasks` SET 	`franchisor_id` 		= '".addslashes($franID)."', 
		`franchisor_ceo`	 	= '".addslashes($ceo_name)."',
		`franchisor_name` 	 	= '".addslashes($franName)."',
		`franchisor_state`		= '".addslashes($state)."',
		`franchisor_address` 	= '".addslashes($addr)."',
		`franchisor_mobile` 	= '".addslashes($phone)."',
		`franchisor_email` 	 	= '".addslashes($email)."',
		`franchisor_url`	 	= '".addslashes($url)."',
		`franchisor_type`       = '".addslashes($franchisorType)."',																                                                    `franchisor_subm_date`	= '".addslashes($sub_date)."',
		`task_work_status`		= '',
		`task_assign_status`	= 'U'";

		$result = $this -> get_query_result($query);

		return $result;	
	}	
//################FICOM CRM MODULE END#########################################################################

//################ SALESCRM MODULE START HERE #############################################################

	function get_salescrm_id($franID){

		$query = "SELECT `franchisor_id` FROM `company_list` WHERE `franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		$result = $this -> get_num_record($result);
		
		return $result;	
	}
	
//################ SALESCRM MODULE START HERE #############################################################

//################DOTCOM G1 & G2 CRM#########################################################################

	function get_dotcomg1g2_id($franID){

		$query = "SELECT `franchisor_id` FROM `fiforce_company_details` WHERE `franchisor_id` = '$franID'";

		$result = $this -> get_query_result($query);
		$result = $this -> get_num_record($result);
		
		return $result;	
	}


	function insert_dotcomg1g2_company($company_name, $cparent_id){
		
		$query = "INSERT INTO `fiforce_company` SET
		`company_name` 		= '".addslashes($company_name)."', 
		`cparent_id` 		= '".addslashes($cparent_id)."', 
		`company_status`	= 'A'";
		$result = $this -> get_query_result($query);

		return $result;	
	}	
	
	function insert_dotcomg1g2_brand($company_name, $cparent_id){
		
		$query = "INSERT INTO `fiforce_company` SET
		`company_name` 		= '".addslashes($company_name)."', 
		`cparent_id` 		= '".addslashes($cparent_id)."', 
		`company_status`	= 'A'";
		
		$result = $this -> get_query_result($query);

		return $result;	
	}	


	function insert_dotcomg1g2_details($brandid, $franID, $company, $brand_name, $industry, $business_category, $first_name, $franchise_manager, $city, $state, $postcode, $country, $address, $mobile, $phone, $fax, $email, $url, $sub_date, $aid){
		
		$query = "INSERT INTO `fiforce_company_details` SET
		`company_id` 		= '".addslashes($brandid)."', 
		`franchisor_id` 		= '".addslashes($franID)."', 
		`company`	 	= '".addslashes($company)."',
		`brand_name` 	 	= '".addslashes($brand_name)."',
		`industry`		= '".addslashes($industry)."',
		`business_category` 	= '".addslashes($business_category)."',
		`first_name` 	= '".addslashes($first_name)."',
		`franchise_manager`	 	= '".addslashes($franchise_manager)."',
		`city`       = '".addslashes($city)."',	
		`state`       = '".addslashes($state)."',	
		`pincode`       = '".$pincode."',	
		`country`       = '".addslashes($country)."',	
		`address`       = '".addslashes($address)."',	
		`mobile`       = '".addslashes($mobile)."',	
		`phone`       = '".addslashes($phone)."',	
		`fax`       = '".addslashes($fax)."',	
		`email`       = '".addslashes($email)."',	
		`url`		  ='".addslashes(strip_tags($url))."',
		`company_status`	= 'N',	
		`assign_status`		= 'A',	
		`lead_type`			= 'website',
		`create_date`		= Now(),
		`register_date`       = '".addslashes($sub_date)."',	
		`create_by`     = '".$aid."',	
		`assignTo`      = '".$aid."',	
		`assignBy`      = '".$aid."',	
		`assign_date`	= Now(),
		`status`		= 'A'";
		
		$result = $this -> get_query_result($query);

		return $result;	
	}
	
	function insert_dotcomg1g2_contact($first_name, $email, $phone, $mobile, $company_lid){
		
		$query = "INSERT INTO `fiforce_contact` SET	`contact_id` 		= '',
		`contact_name`		= '".$first_name."',
		`contact_desig` 	= 'CEO',
		`contact_email`		= '".$email."',
		`contact_2email`	= '',
		`contact_phone`		= '".$phone."',
		`contact_mobile`	= '".$mobile."',
		`contact_2mobile`	= '',
		`cdid` 				= '".$company_lid."'";
		
		$result = $this -> get_query_result($query);

		return $result;	
	}	
	
//################################ G1 & G2 CRM MOD Membership ######################################################

//################################ Franchisor Membership ######################################################

	function get_franchisor_active_count($search_name,$search_status,$search_catg){

		$query = "SELECT a.franchisor_id, b.franchisor_id FROM `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = b.`franchisor_id` AND a.`confirmation` = 'Y'";

		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.franchisor_type ='".$search_status."'";	
		}

		if($search_catg){ 	  
			$query .= " AND b.industry_cat LIKE '%".$search_catg."%'";		
		}

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End		
	
	function get_franchisor_details_active_pagenation($search_name,$search_status,$search_catg,$from,$perPage){	 

		$query = "SELECT a.franchisor_id, a.email, a.franchisor_type, a.confirmation, a.email,a.password, a.confirm_date, b.franchisor_address, b.franchisor_name, b.industry_cat, b.submission_date FROM `franchisor_account` AS a,  `franchisor_business_details` AS b WHERE a.`franchisor_id` = b.`franchisor_id` AND a.`confirmation` = 'Y'";
		
		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_status){ 	  
			$query .= " AND a.franchisor_type ='".$search_status."'";	
		}

		if($search_catg){ 	  
			$query .= " AND b.industry_cat LIKE '%".$search_catg."%'";		
		}
		
		$query .= " ORDER BY b.`franchisor_name` LIMIT $from , $perPage";
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End 

//############################ Company Logo ####################################################################

	function check_logo_exist($franId){

		$query = "SELECT `sno`,`image`,`industry_cat_main` FROM `franchisor_business_details` WHERE `franchisor_id` = '$franId'";
 		//$query = "SELECT `id`,`ad_cat`,`catid`,`ad_content`,`logo` FROM `advertisement` WHERE `ad_cat` = 'DL' AND `franchisor_id` = '$franId'";

		$result = $this -> get_query_result($query);

		return $result;	
	}

	function update_franchisor_logo($hidUploadFranId, $hidUploadLogoId, $upload_logo_name){

		$query = "UPDATE `franchisor_business_details` SET `image` = '$upload_logo_name' WHERE `franchisor_id` = '$hidUploadFranId' AND `sno` = '$hidUploadLogoId'";
 		//$query = "UPDATE `advertisement` SET `logo` = '$upload_logo_name' WHERE `franchisor_id` = '$hidUploadFranId' AND `ID` = '$hidUploadLogoId' AND `ad_cat` = 'DL'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}	
//############################ End Company Logo ################################################################

//############################ Franchisor Moderation Functions ####################################################################

	function get_franchisor_moderator_count(){

		$query = "SELECT `franchisor_id` FROM `franchisor_detail_moderate`";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End		
	
	function get_franchisor_moderator_pagenation($from,$perPage){	 

		$query = "SELECT * FROM `franchisor_detail_moderate` ORDER BY `franchisor_name` DESC LIMIT $from , $perPage ";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End 
	
	function get_franchisor_moderator_details($franID){

		$query = "SELECT * FROM `franchisor_detail_moderate` WHERE `franchisor_id`='".$franID."'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End		
	

//############################ Franchisor Membership Functions ####################################################################
	
	function update_franchisor_membership($status, $fran_id){
		
		if($status==3){	
			$query = "UPDATE `franchisor_account` SET `franchisor_type` = 'P' WHERE `franchisor_id` = '".$fran_id."'";
			$query_fbs = "UPDATE `franchisor_business_details` SET `franchisor_type` = 'P' WHERE `franchisor_id` = '".$fran_id."'";			
			$result_fbs = $this -> get_query_result($query_fbs);			
		}else{
			$query = "UPDATE `franchisor_account` SET `franchisor_type` = 'F' WHERE `franchisor_id` = '".$fran_id."'";
			$query_fbs = "UPDATE `franchisor_business_details` SET `franchisor_type` = 'F' WHERE `franchisor_id` = '".$fran_id."'";			
			$result_fbs = $this -> get_query_result($query_fbs);			
		}	
		
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

//############################ Other Functions ##################################################################

	function changeDateToDbType($value){
		
		$date_array = explode("-",$value);
		
		$final_date = $date_array[2]."-".$date_array[1]."-".$date_array[0];
		
		return $final_date;
	}
	
	
	function get_all_category()
	{
		$query  = "Select * from category  ORDER BY catname";
		$result = $this -> get_query_result($query);
		return $result;	
	}

	function get_category_franchise($catID)
	{
		$query = "Select * from advertisement where catid = '$catID' and ad_cat ='DL'";
		$result = $this -> get_query_result($query);
		return $result;	

	}


	function get_category_franchise_count($catID)
	{

		$query = "Select * from advertisement where catid = '$catID' and ad_cat ='DL'";
		$result = $this -> get_query_result($query);
		return $result;



	}
	function get_category_franchise_pagination($catID,$from,$perPage)  
	{
		$query = "Select * from advertisement where catid = '$catID' AND ad_cat ='DL' AND rank <>0 ORDER BY rank,ID LIMIT $from , $perPage";
		$result = $this -> get_query_result($query);
		return $result;	
}//End 

function get_franchise_weight($catID)  
{
	$query = "SELECT * FROM `advertisement` WHERE `catid`='$catID' AND `ad_cat`='DL' AND `verified`=3 ORDER BY `rank` ASC LIMIT 20";
	$result = $this -> get_query_result($query);
	return $result;	
}//End 


//###########################################################################################################################################################

function get_featured_franchisor_count($search_name,$search_loc,$search_catg){

	$query = "SELECT a.`franchisor_id` FROM `advertisement` a LEFT JOIN `franchisor_business_details` b ON a.`franchisor_id` = b.`franchisor_id` LEFT JOIN franchisor_account c ON c.`franchisor_id` = a.`franchisor_id` WHERE a.`ad_cat`='DL' AND c.`confirmation`='Y'";

	if($search_name){ 	  
		$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
	}

	if($search_loc){ 	  
		$query .= " AND (b.state LIKE '%".$search_loc."%' OR b.country LIKE '%".$search_loc."%')";	
	}
	
	if($search_catg){ 	  
		$query .= " AND b.industry_cat LIKE '%".$search_catg."%'";		
	}

	$result = $this -> get_query_result($query);

	return $result;	
	}//End		
	
	function get_featured_franchisor_details_pagenation($search_name,$search_loc,$search_catg,$from,$perPage){	 

		$query = "SELECT a.catid, a.franchisor_id, b.franchisor_name, b.industry_cat, b.profile_name, b.state, b.country, c.email, c.confirmation, c.featuredin FROM advertisement a LEFT JOIN franchisor_business_details b ON a.franchisor_id = b.franchisor_id LEFT JOIN franchisor_account c ON c.`franchisor_id` = a.`franchisor_id` WHERE a.ad_cat='DL' AND c.`confirmation`='Y'";
		
		if($search_name){ 	  
			$query .= " AND b.franchisor_name LIKE '%".$search_name."%'";	
		}
		
		if($search_loc){ 	  
			$query .= " AND (b.state LIKE '%".$search_loc."%' OR b.country LIKE '%".$search_loc."%')";	
		}

		if($search_catg){ 	  
			$query .= " AND b.industry_cat LIKE '%".$search_catg."%'";		
		}
		
		$query .= " ORDER BY a.ID DESC LIMIT $from , $perPage";		
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End 

	function update_fanchisor_featuredin($franid,$nvalue){

		$query = "UPDATE `franchisor_account` SET `featuredin` = '".$nvalue."' WHERE `franchisor_id` = '".$franid."'";

		$result = $this -> get_query_result($query);

		return $result;	
	}//End

//####################### Hide Franchisor ###################################################

	function hideListingAccount($franId){
		$query = " update franchisor_account set confirmation = 'H' where franchisor_id = '".$franId."' ";
		$result = $this -> get_query_result($query);
		$query_fbs = "UPDATE `franchisor_business_details` SET `status` = 3 WHERE `franchisor_id` = '".$fran_id."'";			
		$result_fbs = $this -> get_query_result($query_fbs);			

		return $result;
	}
	
	function hideAdvertisement($franId, $txtHideComment){
		$query = " update advertisement set ad_cat = 'HD', hideComment = '".$txtHideComment."' where franchisor_id = '".$franId."' ";
		$result = $this -> get_query_result($query);
		return $result;
	}

//####################### Category Sub Category #############################################

	function getSubcatById($catId) {
		$query = " select catid, catname, parent_id from category_new where parent_id = '".$catId."' ";
		$result = $this -> get_query_result($query);
		return $result;
	}

	function getCategoryDetails($catId='', $pId='') {

		$WHERE = '';
		if($catId == 'c' && $pId != "") {
			$WHERE .= " and c.parent_id = '".$pId."' ";
		} elseif($catId == 'p') {
			$WHERE .= " and c.parent_id = '0' ";
		} elseif(isset($catId) && $catId != "") {
			$WHERE .= " and c.catid = '".$catId."' ";
		}

		$query = " select c.* from category_new c where 1=1 $WHERE ";
		$result = $this -> get_query_result($query);
		return $result;
	}


//################################## DOTCOM-MIS Merging functions ######################

	function get_active_paid_fran_count($search_name, $selProduct, $city, $startDateFrom, $startDateTo, $endADateFrom, $endADateTo, $order){

		$CONDITION = "";
		
		if($search_name != "") {
			$CONDITION .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";
		}

		if($city != "") {
			$CONDITION .= " AND b.`city` LIKE '%".$city."%'";
		}

		if($selProduct != "") {
			$CONDITION .= " AND a.`productID` REGEXP '(".$selProduct.",)|".$selProduct."$' ";
		}
		
		if($startDateFrom != "") {
			$CONDITION .= " AND a.start_date >= '".$startDateFrom." 00:00:00' ";
		}
		
		if($startDateTo != "") {
			$CONDITION .= " AND a.start_date <= '".$startDateTo." 23:59:59' ";
		}
		
		if($endADateFrom != "") {
			$CONDITION .= " AND a.end_date >= '".$endADateFrom." 00:00:00' ";
		}
		
		if($endADateTo != "") {
			$CONDITION .= " AND a.end_date <= '".$endADateTo." 23:59:59' ";
		}
		
		if($order == "expired") {
			$CONDITION .= " AND a.end_date <= '".date('Y-m-d H:i:s')."' ";
		}

		$query = "SELECT a.`trackID` FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status`<>'Expired' $CONDITION ";

		
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function get_active_paid_fran_count1($search_name, $selProduct, $city, $startDateFrom, $startDateTo, $endADateFrom, $endADateTo, $order){

		$CONDITION = "";
		
		if($search_name != "") {
			$CONDITION .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";
		}

		if($city != "") {
			$CONDITION .= " AND b.`city` LIKE '%".$city."%'";
		}

		if($selProduct != "") {
			$CONDITION .= " AND a.`productID` REGEXP '(".$selProduct.",)|".$selProduct."$' ";
		}
		
		if($startDateFrom != "") {
			$CONDITION .= " AND a.start_date >= '".$startDateFrom." 00:00:00' ";
		}
		
		if($startDateTo != "") {
			$CONDITION .= " AND a.start_date <= '".$startDateTo." 23:59:59' ";
		}
		
		if($endADateFrom != "") {
			$CONDITION .= " AND a.end_date >= '".$endADateFrom." 00:00:00' ";
		}
		
		if($endADateTo != "") {
			$CONDITION .= " AND a.end_date <= '".$endADateTo." 23:59:59' ";
		}
		
		if($order == "expired") {
			$CONDITION .= " AND a.end_date <= '".date('Y-m-d H:i:s')."' ";
		}

		$query = "SELECT a.`trackID` FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status`<>'Expired' $CONDITION ";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function get_active_paid_fran_pagenation($search_name, $selProduct, $city, $startDateFrom, $startDateTo, $endADateFrom, $endADateTo, $order,$from,$perPage) {

		if($search_name != "") {
			$CONDITION .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";
		}
		if($city != "") {
			$CONDITION .= " AND b.`city` LIKE '%".$city."%'";
		}

		if($selProduct != "") {
			$CONDITION .= " AND a.`productID` REGEXP '(".$selProduct.",)|".$selProduct."$' ";
		}
		
		if($startDateFrom != "") {
			$CONDITION .= " AND a.start_date >= '".$startDateFrom." 00:00:00' ";
		}
		
		if($startDateTo != "") {
			$CONDITION .= " AND a.start_date <= '".$startDateTo." 23:59:59' ";
		}
		
		if($endADateFrom != "") {
			$CONDITION .= " AND a.end_date >= '".$endADateFrom." 00:00:00' ";
		}
		
		if($endADateTo != "") {
			$CONDITION .= " AND a.end_date <= '".$endADateTo." 23:59:59' ";
		}
		if($order == "expired") {
			$CONDITION .= " AND a.end_date <= '".date('Y-m-d H:i:s')."' ";
		}
		
		$query = "SELECT a.* FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status`<>'Expired' $CONDITION";

		if($order != "" &&  $order != "expired") {
			$query .= " ORDER BY  cast( a.".$order." as unsigned)  ASC ";
		} else {
			$query .= " ORDER BY b.`franchisor_name`";
		}
		
		$query .= "  LIMIT $from , $perPage";


		$result = $this -> get_query_result($query);
		
		return $result;
	}//End


	function get_active_paid_fran_pagenation1($search_name, $selProduct, $city, $startDateFrom, $startDateTo, $endADateFrom, $endADateTo, $order,$from,$perPage) {

		if($search_name != "") {
			$CONDITION .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";
		}
		if($city != "") {
			$CONDITION .= " AND b.`city` LIKE '%".$city."%'";
		}

		if($selProduct != "") {
			$CONDITION .= " AND a.`productID` REGEXP '(".$selProduct.",)|".$selProduct."$' ";
		}
		
		if($startDateFrom != "") {
			$CONDITION .= " AND a.start_date >= '".$startDateFrom." 00:00:00' ";
		}
		
		if($startDateTo != "") {
			$CONDITION .= " AND a.start_date <= '".$startDateTo." 23:59:59' ";
		}
		
		if($endADateFrom != "") {
			$CONDITION .= " AND a.end_date >= '".$endADateFrom." 00:00:00' ";
		}
		
		if($endADateTo != "") {
			$CONDITION .= " AND a.end_date <= '".$endADateTo." 23:59:59' ";
		}
		if($order == "expired") {
			$CONDITION .= " AND a.end_date <= '".date('Y-m-d H:i:s')."' ";
		}
		
		$query = "SELECT a.* FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status`<>'Expired' $CONDITION";

		if($order != "" &&  $order != "expired") {
			$query .= " ORDER BY  cast( a.".$order." as unsigned)  ASC ";
		} else {
			$query .= " ORDER BY b.`franchisor_name`";
		}
		
		$query .= "  LIMIT $from , $perPage";


		$result = $this -> get_query_result($query);
		
		return $result;
	}//End


	function get_active_paid_fran_user_count($userid,$search_name, $city){

		$query = "SELECT a.`trackID` FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status`<>'Expired' AND `executive_name`='$userid'";

		if($search_name){ 	  
			$query .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";	
		}

		if($city){ 	  
			$query .= " AND b.`city` LIKE '%".$city."%'";	
		}
		
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function get_active_paid_fran_user_pagenation($userid,$search_name,$city,$from,$perPage){	 

		$query = "SELECT a.* FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status`<>'Expired' AND `executive_name`='$userid'";
		
		if($search_name){ 	  
			$query .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";	
		}

		if($city){ 	  
			$query .= " AND b.`city` LIKE '%".$city."%'";	
		}
		
		$query .= " ORDER BY a.`create_date` DESC LIMIT $from , $perPage";
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	
	function get_expired_paid_fran_count($search_name){

		$query = "SELECT a.`trackID` FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status` = 'Expired'";

		if($search_name){ 	  
			$query .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";	
		}
		
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function get_expired_paid_fran_pagenation($search_name,$from,$perPage){	 

		$query = "SELECT a.* FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status` = 'Expired'";
		
		if($search_name){ 	  
			$query .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";	
		}
		
		$query .= " ORDER BY a.`create_date` DESC LIMIT $from , $perPage";
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function get_expired_paid_fran_pagenation1($search_name,$search_city,$from,$perPage){	 

		$query = "SELECT a.* FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status` = 'Expired'";
		
		if($search_name){ 	  
			$query .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";	
		}

		if($search_city){ 	  
			$query .= " AND b.`city` LIKE '%".$search_city."%'";	
		}
		$query .= " AND a.`create_date` >= '2014-01-01 00:00:00'";	
		$query .= " ORDER BY a.`create_date` DESC LIMIT $from , $perPage";
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	
	function get_expired_paid_fran_user_count($userid,$search_name){

		$query = "SELECT a.`trackID` FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status` = 'Expired' AND `executive_name`='$userid'";

		if($search_name){ 	  
			$query .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";	
		}
		
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function get_expired_paid_fran_user_pagenation($userid,$search_name,$from,$perPage){	 

		$query = "SELECT a.* FROM `fran_payment_history` a LEFT JOIN franchisor_business_details b ON a.`franchisorID` = b.`franchisor_id` WHERE a.`status` = 'Expired' AND `executive_name`='$userid'";
		
		if($search_name){ 	  
			$query .= " AND b.`franchisor_name` LIKE '%".$search_name."%'";	
		}
		
		$query .= " ORDER BY a.`create_date` DESC LIMIT $from , $perPage";
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End	

	function get_franchisor_details($franchisor_id){	 

		$query = "SELECT a.tel, b.franchisor_id, a.profile_name, a.industry_category_final, a.industry_cat_main, a.industry_category, a.industry_cat, a.fibl_brands, b.email, b.confirmation, b.password, b.confirm_date, a.franchisor_address, a.franchisor_name, a.industry_cat, a.submission_date FROM `franchisor_business_details` AS a LEFT JOIN `franchisor_account` AS b ON a.`franchisor_id` = b.`franchisor_id` WHERE a.`franchisor_id`='$franchisor_id'";
		
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function getProduct(){

		$query = "SELECT * FROM `fran_product` WHERE `prod_status`='Active'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	
	function getProductDetails($prodid){

		$query = "SELECT * FROM `fran_product` WHERE `productID`=$prodid";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End


	function getFranProd($trackid){

		$query = "SELECT `productID` FROM `fran_payment_history` WHERE `trackID`=$trackid";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

    /**
     * @param $franchisorId
     * @return mixed
     */
    function getFranchisorName($franchisorId)
    {
    	$query  = "SELECT `company_name` FROM `franchisor_business_details` WHERE `franchisor_id` = '$franchisorId' LIMIT 1";
    	$result = $this->get_query_result($query);
    	$resArr = $this->get_fetch_record($result);
    	return $resArr[0]['company_name'];
    }//End

    /**
     * @param $franchisorID
     * @param $thisYmd
     * @return int
     */
    function getMonthlyLeads($link, $franchisorID, $thisYmd)
    {
    	$query  = sprintf("SELECT email FROM `express_fran_insta_apply` WHERE `franchisor_id` = '%s' AND `create_date` >= '%s'", $franchisorID, $thisYmd);
    	$result = $this->get_query_result($link, $query);
    	$resCnt = $this->get_num_record($result);
    	return $resCnt;
    }

    function getTotalLeads($franchisorID, $fromDate, $toDate)
    {
    	$query  = sprintf("SELECT email FROM `express_fran_insta_apply` WHERE `franchisor_id` = '%s' AND `create_date` >= '%s' AND `create_date` <= '%s'", $franchisorID, $fromDate, $toDate);
    	$result = $this->get_query_result($query);
    	$resCnt = $this->get_num_record($result);
    	return $resCnt;
    }

    function update_fran_product($track_id,$product){

    	$query = "UPDATE `fran_payment_history` SET `productID`='$product' WHERE `trackID`='$track_id'";											 

    	$result = $this -> get_query_result($query);

    	return $result;	
   }//End	

   function insert_product_history($track_id,$prod_id,$txtStatus){

   	$query = "INSERT INTO `fran_product_history` SET `trackID` 		= '$track_id',	
   	`productID` 	= '$prod_id',
   	`pstatus` 		= '$txtStatus',													 
   	`pcreate_date`	= NOW()";		

   	$result = $this -> get_query_result($query);

   	return $result;	
	}//End
	

	function get_fran_pay_count($franid,$search_exec,$search_status){

		$query = "SELECT `trackID` FROM `fran_payment_history` WHERE `franchisorID` = '$franid'";

		if($search_exec){ 	  
			$query .= " AND `executive_name` LIKE '%".$search_exec."%'";		
		}
		
		if($search_status){ 	  
			$query .= " AND `status` = '".$search_status."'";		
		}
		
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function get_fran_pay_pagenation($franid,$search_exec,$search_status,$from,$perPage){	 

		$query = "SELECT * FROM `fran_payment_history` WHERE `franchisorID` = '$franid'";

		if($search_exec){ 	  
			$query .= " AND `executive_name` LIKE '%".$search_exec."%'";		
		}
		
		if($search_status){ 	  
			$query .= " AND `status` = '".$search_status."'";		
		}
		
		$query .= " ORDER BY `create_date` DESC LIMIT $from , $perPage";		

		$result = $this -> get_query_result($query);
		

		return $result;	
	}//End 
	

	function getFranPayDetails($trackid){

		$query = "SELECT * FROM `fran_payment_history` WHERE `trackID`=$trackid";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function getProductHistory($trackid){

		$query = "SELECT * FROM `fran_product_history` WHERE `trackID`=$trackid";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	
	function getProductHistoryDetails($phid){

		$query = "SELECT * FROM `fran_product_history` WHERE `phID`=$phid";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	

	function insert_fran_payment($txtFranId,$txtProd,$txtAmount,$txtPayMode,$txtPayDetail,$pay_date,$start_date,$end_date,$txtExecName,$txtStatus,$txtOfferDetail){

		$query = "INSERT INTO `fran_payment_history` SET `franchisorID` 	= '$txtFranId',	
		`productID` 		= '$txtProd',														 
		`amount`			= $txtAmount,
		`pay_mode` 		= '$txtPayMode',
		`pay_details` 		= '$txtPayDetail',
		`pay_date` 		= '$pay_date',
		`start_date` 		= '$start_date',
		`end_date` 		= '$end_date',
		`executive_name` 	= '$txtExecName',
		`offer_desc` 		= '$txtOfferDetail',	
		`status` 			= '$txtStatus',
		`create_date`		= NOW()";		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End

	function update_fran_payment($trackid,$txtAmount,$txtPayMode,$txtPayDetail,$pay_date,$start_date,$end_date,$txtExecName,$txtStatus,$txtOfferDetail){

		$query = "UPDATE `fran_payment_history` SET `amount`			= '$txtAmount',
		`pay_mode` 			= '$txtPayMode',
		`pay_details` 		= '$txtPayDetail',
		`pay_date` 			= '$pay_date',
		`start_date` 		= '$start_date',
		`end_date` 			= '$end_date',
		`executive_name` 	= '$txtExecName',
		`offer_desc` 		= '$txtOfferDetail',
		`status` 			= '$txtStatus'
		WHERE 	`trackID` 			= '$trackid'";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End


	function update_product_history($phid,$start_date,$end_date,$txtOfferDetail,$txtStatus){

		$query = "UPDATE `fran_product_history` SET `pstart_date` 	= '$start_date',
		`pend_date` 	= '$end_date',
		`psummary` 		= '$txtOfferDetail',
		`pstatus` 		= '$txtStatus'											 	
		WHERE 	`phID` 			= '$phid'";											 

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End
	

	function update_franchisor_paid($status, $txtFranId) {

	 if(($status == 0 || $status == 1) && $txtFranId != "") {  // update status to expire
	 	$query = "UPDATE `fran_payment_history` SET `status` = 'Expired' WHERE 	`franchisorID` = '".$txtFranId."'";
	 	$result = $this -> get_query_result($query);
	 	return $result;
	 }

	}

	function getFranPayment($franId) {
		$query = ' select * from fran_payment_history  where franchisorID = "'.$franId.'" AND status = "Active" ';
		$result = $this -> get_query_result($query);
		return $result;
	}

	function delete_product_history($phid){
		$query = "DELETE FROM `fran_product_history` WHERE `phID`='$phid'";
		$result = $this -> get_query_result($query);
		return $result;

	}

	function convert_url_to_link($string) {
		
		$output = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" rel=\"nofollow\" target='_blank'><br>[ View ]</a>", $string);
		
		return $output;
	}
	
	function mysql_real_escape_array($parms){

		return array_map("mysql_real_escape_string",$parms);
	}	

//####################### EB Details #############################################3

	function add_eb_details($brand_name, $database_name, $eb_type, $requested_by, $aproved_by, $align_date, $execution_date, $payment_description, $comments){

		$query = "INSERT INTO `admin_eb_details` SET `brand_name` 			= '".addslashes($brand_name)."', 
		`database_name`	 		= '".addslashes($database_name)."',
		`eb_type`	 				= '".addslashes($eb_type)."',
		`requested_by` 			= '".addslashes($requested_by)."',
		`aproved_by` 			= '".addslashes($aproved_by)."',												  
		`align_date` 	 			= '".addslashes($align_date)."',
		`execution_date` 	 		= '".addslashes($execution_date)."',
		`payment_description` 	= '".addslashes($payment_description)."',
		`comments` 	 			= '".addslashes($comments)."',							 												  										 	  	  `create_date`	 			= NOW()";


		$result = $this -> get_query_result($query);
		
		return $result;	
	}	

	function update_eb_details($eid, $brand_name,$database_name,$eb_type,$requested_by,$aproved_by,$align_date, $execution_date, $payment_description, $comments){

		$query = "UPDATE `admin_eb_details` SET `brand_name` 			= '".addslashes($brand_name)."',
		`database_name`  			= '".addslashes($database_name)."',
		`eb_type`  			= '".addslashes($eb_type)."',
		`requested_by`  			= '".addslashes($requested_by)."',
		`aproved_by` B?		= '".addslashes($aproved_by)."', 
		`align_date`  			= '".addslashes($align_date)."',
		`execution_date` 		= '".addslashes($execution_date)."',
		`payment_description` 	= '".addslashes($payment_description)."',
		`comments` 	 			= '".addslashes($comments)."' 
		WHERE eid = $eid";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}	

	function get_eb_details_count($brand_name, $eb_type, $requested_by, $search_from, $search_to){

		$query = "SELECT eid FROM `admin_eb_details` WHERE 1=1 ";

		if($brand_name){ 	  
			$query .= " AND brand_name LIKE '%".$brand_name."%'";	
		}

		if($requested_by){ 	  
			$query .= " AND requested_by = '".$requested_by."'";	
		}
		
		if($eb_type){ 	  
			$query .= " AND eb_type = '".$eb_type."'";	
		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND align_date BETWEEN '".$search_from."' AND '".$search_to."'";		
		}

		$result = $this -> get_query_result($query);

		return $result;	
	}//End	

	function get_eb_details_pagenation($brand_name, $eb_type, $requested_by, $search_from, $search_to, $from, $perPage){	 

		$query = "SELECT * FROM `admin_eb_details` WHERE 1=1 ";
		
		if($brand_name){ 	  
			$query .= " AND brand_name LIKE '%".$brand_name."%'";	
		}

		if($eb_type){ 	  
			$query .= " AND eb_type = '".$eb_type."'";	
		}

		if($requested_by){ 	  
			$query .= " AND requested_by = '".$requested_by."'";	
		}
		
		if($search_from && $search_to){ 	  
			$query .= " AND align_date BETWEEN '".$search_from."' AND '".$search_to."'";			
		}
		
		$query .= " ORDER BY align_date DESC LIMIT $from, $perPage";
		

		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End 
	
	function get_eb_details_id($eid){	 

		$query = "SELECT * FROM `admin_eb_details` WHERE eid = $eid LIMIT 1 ";
		
		$result = $this -> get_query_result($query);
		
		return $result;	
	}//End 
	
//####################### Other Function #############################################3
	
	function concatImageNameWithId($img_name){

		$split_result	= explode(".", $img_name);
		
		$rec_id = trim(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 4));

		$concat_result	= trim($split_result[0]).$rec_id;
		
		$final_result	= $concat_result.".". $split_result[1];
		
		return $final_result;
	}
	
	function add_subscriber_details($email_id, $subscribe_type){

		$query = "INSERT INTO `expo_subscriber_data` SET `email_id` 	= '".addslashes($email_id)."', 
		`subscribe_type`		= '".addslashes($subscribe_type)."',
		`create_date`	 		= NOW()";

		$result = $this -> get_query_result($query);
		
		return $result;	
	}
	
	function subscriber_detail_check($email_id, $subscribe_type){

		$query = "SELECT `email_id` FROM `expo_subscriber_data` WHERE `email_id` = '".$email_id."' AND `subscribe_type` = '".$subscribe_type."' LIMIT 1";

		$result = $this -> get_query_result($query);
		$result = $this -> get_num_record($result);
		
		return $result;	
	}	

//------------------------------------------------------------------------------------------------------------------------------------------
function franchisor_nameRange($link, $franID){
	
$query = "SELECT company_name, 
	(
	CASE 
	WHEN unit_inv_min < '2000000' THEN 0
	WHEN unit_inv_min >= '2000000' && unit_inv_max <= '5000000' THEN 1
	WHEN unit_inv_min >= '5000000' && unit_inv_max <= '10000000' THEN 1
	ELSE 0
	END ) AS rng
	from franchisor_business_details WHERE franchisor_id = '$franID'";
	$result = $this->get_query_result($link, $query);
    $resArr = $this->get_fetch_record($result);
    return array('company_name' => $resArr[0]['company_name'], 'range' => $resArr[0]['rng']);
}


function getThisMonthlyLeads($link, $franchisorID)
    {
     $query  = sprintf("SELECT email FROM `express_fran_insta_apply` WHERE `franchisor_id` = '%s' AND MONTH(create_date) = MONTH(CURRENT_DATE()) AND YEAR(create_date) = YEAR(CURRENT_DATE())", $franchisorID);
     $result = $this->get_query_result($link, $query);
     $resCnt = $this->get_num_record($result);
     return $resCnt;
    }

	
}//CLASS END

function get_value_by_key($array,$key)
{
	foreach($array as $k=>$each)
	{
		if($k==$key)
		{
			return $each;
		}
		
		if(is_array($each))
		{
			if($return = get_value_by_key($each,$key))
			{
				return $return;
			}
		}
	}
}

function getParentStack($child, $stack)
{
	foreach ($stack as $k => $v) {
		if (is_array($v))
		{
			$return = getParentStack($child, $v);
			if (is_array($return))
			{
				return array($k => $return);
			}
		} else {
			if ($v == $child)
			{
				return array($k => $child);
			}
		}
	}
	return false;
}

?>
