<?php
/*$ch = curl_init('https://www.opportunityindia.com/api/article/apidata');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
		$result = curl_exec($ch);
		curl_close($ch);
		
		$articles = json_decode($result, true);
		print_r($articles);
*/
// hindi
		$ch = curl_init('https://www.opportunityindia.com/api/article/hindiapidata');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
		$result = curl_exec($ch);
		curl_close($ch);
		
		$articles = json_decode($result, true);
				print_r($articles);

?>		