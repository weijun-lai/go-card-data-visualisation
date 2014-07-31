<?php
	if (isset($_POST)) {
		// var_dump($_POST);
	    // echo 'filename: ' . $_POST["filename"];
	    // echo ' data: ' . $_POST["data"];
		$counter = $_POST["filename"];

		// file_put_contents('./total.txt', "num_total\n"+$counter);

	    $myFile = $counter.".txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = $_POST["data"];
		$stringData = str_replace("),","\r",$stringData);
		$stringData = str_replace(')','',$stringData);
		$stringData = str_replace(' ','',$stringData);
		$stringData = str_replace('(','',$stringData);
		echo $stringData;
		fwrite($fh, "pt_lat,pt_lon\n");
		fwrite($fh, $stringData);
		fclose($fh);

		$totalfile = "total.txt";
		unlink($totalfile );
		$fht = fopen($totalfile , 'w+') or die("\ncan't open total.txt file");
		fwrite($fht, "num_total\n".$counter);
		fclose($fht);
    }
?>