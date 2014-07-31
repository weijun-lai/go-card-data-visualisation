<?php 

//-----------------ip recorder-----------------------


$browser = get_browser(null,true);
    //echo ($browser["browser"].' '.$browser["platform"]);
    //var_dump($browser);
date_default_timezone_set('australia/brisbane');
echo '</br>';
echo '</br>';
echo '<div class="container panel panel-success">';
echo '<div class="panel-body">';
echo 'Visitor-Recorder';
echo '</div>';
echo '<div class="panel-footer">';

echo '<p>';
echo '<span class="label label-primary">';
echo '⎙ Server: ';
echo '</span>';
echo '<span class="label label-danger">';
echo $_SERVER['HTTP_HOST'];#. ' ' . var_dump($_SERVER);
echo '</span>';
echo '</p>';
echo '<p>';
echo '<span class="label label-primary">';
echo '⎘ Remote: ';
echo '</span>';
echo '<span class="label label-danger">';
echo $_SERVER['REMOTE_ADDR'];
echo '</span>';
echo '</p>';
echo '<p>';

echo '<span class="label label-primary">';
echo  '⚽︎ Brower: ';//. $_SERVER['HTTP_USER_AGENT'];
echo '</span>';
echo '<span class="label label-danger">';
echo ($browser["browser"].' '.$browser["platform"]);
echo '</span>';
echo '</p>';
echo '<p>';

echo '<span class="label label-primary">';
echo '⍝ Date: ';
echo '</span>';
echo '<span class="label label-danger">';
echo date("F j, Y, g:i:s a");
echo '</span>';
echo '</p>';


$filename = 'log.txt';
$filepath = '';
$new = $_SERVER['REMOTE_ADDR'];
$new .= " ".$browser["browser"].' '.$browser["platform"];
$new .= " [".date("n/j/Y G:i:s")."]\n";

$fileAppend = fopen($filename,"a") or die("can't open file");
$fileRead = fopen($filename,"r") or die("can't open file");
fwrite($fileAppend,$new);
$count = 0;
$showsNumber = 10;
$linesNumber = count(file($filename));

while(!feof($fileRead)) {
    $line = fgets($fileRead);
    if (strlen($line) == 0) {
        break;
    }
    if ($count++ < ($linesNumber-$showsNumber)){
        continue;
    }
    echo '<p>';
    echo '<span class="label label-info">';
    echo $count;
    echo '</span>';
    echo '<span class="label label-default ">';
    echo " ".$line;//." ☠☢</br>";
    echo '</span>';
    echo '</p>';

    
}
echo '<span class="label label-success">';
echo " Total Records: ".$linesNumber."  ";
echo '</span>';
echo '</br>';
echo '</br>';

//echo "Total Records: ".--$count;

fclose($fileAppend);fclose($fileRead);

?>