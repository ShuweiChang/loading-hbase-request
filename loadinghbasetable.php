<?php



	function delectspace($str){
		$str=trim($str);
		$str=preg_replace('/\s(?=\s)/', '', $str);
		$str=preg_replace('/[\n\r\t]/', '', $str);
		return $str;
	}
	


    //--------------------------------------------------get html content-------------------------------------------------
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, "120.96.183.91:60010/table.jsp?name=selectclassdepartment");

    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $output = curl_exec($ch);
    curl_close($ch);
    //--------------------------------------------------get html content-------------------------------------------------
    //--------------------------------------------------get Region Server Table------------------------------------------
    $array2=explode('<h2>Regions by Region Server</h2>', $array1[1]);
    //--------------------------------------------------get Region Server Table------------------------------------------



    //---------------------------------------------------html table to array start----------------------------------------
    $array2[0]=delectspace($array2[0]);
    $DOM = new DOMDocument;
	$DOM->loadHTML($array2[0]);

	$items = $DOM->getElementsByTagName('tr');
	$row=0;
	$column=0;
    foreach ($items as $node)
	    {
	        //echo tdrows() . "<br />";
	        foreach ($node->childNodes as $element)
	        {
	            if($element->nodeValue!=" "){
		            $tabledata[$row][$column]=$element->nodeValue;
		            //echo $tabledata[$row][$column];
		            $column++;
	            }
	        }
	        //echo "<br>";
	        $column=0;
	        $row++;
	    }
	
    //---------------------------------------------------html table to array end-------------------------------------------
	for ($i=0; $i < $row; $i++) { 
		for ($j=1; $j < 5; $j++) { 
			# code...
			echo $tabledata[$i][$j]." ";
		}echo "<br>";
	}
?>