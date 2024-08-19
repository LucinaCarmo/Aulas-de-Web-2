<?php
$frutas=array("maçã","banana","laranja","uva");
print_r($frutas);
echo $frutas[3]."<br>";
//echo $frutas[0];
foreach($frutas as $fruta){
    echo ".$fruta"."<br>";
}
?>
