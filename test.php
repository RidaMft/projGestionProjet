<?php
date_default_timezone_set('Europe/Paris');
//12/01/2016
$datedebut = strtotime('-10 day', strtotime('now'));
$nbjour = 5;
//24/01/2016
$dateatest = strtotime('+2 day', strtotime('now'));

//calcul timestamp datefin
$datefin = strtotime('+'.$nbjour.' day', $datedebut);
echo $datedebut.'</br>';
echo $datefin.'</br>';
echo $dateatest.'</br>';

//tache -> du 12 au 17
// demandé -> 24
if(($dateatest > $datefin && $dateatest > $datedebut) || ($dateatest < $datedebut && $dateatest < $datefin)){
    echo "c'est en dehors des 2 dates, ok </br>";
}else{
    echo "c'est deja pris </br>";
}

//215/01/2016
$dateatest = strtotime('-7 day', strtotime('now'));
//tache -> du 12 au 17
// demandé -> 17
if(($dateatest > $datefin && $dateatest > $datedebut) || ($dateatest < $datedebut && $dateatest < $datefin)){
    echo "c'est en dehors des 2 dates, ok </br>";
}else{
    echo "c'esdt deja pris </br>";
}

function showDate($timestamp){
    echo date("d/m/Y",$timestamp).'</br>';
}

?>
