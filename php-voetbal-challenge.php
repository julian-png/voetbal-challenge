<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">  

<title>voetbal challenge</title>
</head>
<body>
<?php

$uitslagen=[
['thuis' => 'Feyenoord', 'uit' => 'FC Twente', 'uitslag'=> [1,2] ],
['thuis' => 'AZ', 'uit' => 'RKC Waalwijk', 'uitslag'=> [1,3] ],
['thuis' => 'PEC Zwolle', 'uit' => 'PSV', 'uitslag'=> [1,2] ],
['thuis' => 'Heracles Almelo', 'uit' => 'Sparta Rotterdam', 'uitslag'=> [1,3] ],
['thuis' => 'sc Heerenveen', 'uit' => 'Go Ahead Eagles', 'uitslag'=> [3,1] ],
['thuis' => 'FC Groningen', 'uit' => 'SC Cambuur', 'uitslag'=> [2,3] ],
['thuis' => 'Vitesse', 'uit' => 'Ajax', 'uitslag'=> [2,2] ],
['thuis' => 'Willem II', 'uit' => 'FC Utrecht', 'uitslag'=> [3,0] ],
['thuis' => 'N.E.C.', 'uit' => 'Fortuna Sittard', 'uitslag'=> [0,1] ],

['thuis' => 'Ajax', 'uit' => 'sc Heerenveen', 'uitslag'=> [5,0] ],
['thuis' => 'RKC Waalwijk', 'uit' => 'Heracles Almelo', 'uitslag'=> [2,0] ],
['thuis' => 'Fortuna Sittard', 'uit' => 'Vitesse', 'uitslag'=> [1,2] ],
['thuis' => 'Sparta Rotterdam', 'uit' => 'PEC Zwolle', 'uitslag'=> [2,0] ],
['thuis' => 'Go Ahead Eagles', 'uit' => 'Feyenoord', 'uitslag'=> [0,1] ],
['thuis' => 'SC Cambuur', 'uit' => 'Willem II', 'uitslag'=> [1,1] ],
['thuis' => 'PSV', 'uit' => 'N.E.C.', 'uitslag'=> [3,2] ],
['thuis' => 'FC Twente', 'uit' => 'FC Groningen', 'uitslag'=> [3,0] ],
['thuis' => 'FC Utrecht', 'uit' => 'AZ', 'uitslag'=> [2,2] ],

['thuis' => 'Feyenoord', 'uit' => 'PSV', 'uitslag'=> [2,2] ],
['thuis' => 'AZ', 'uit' => 'Ajax', 'uitslag'=> [2,2] ],
['thuis' => 'Vitesse', 'uit' => 'sc Heerenveen', 'uitslag'=> [1,2] ],
['thuis' => 'N.E.C.', 'uit' => 'Go Ahead Eagles', 'uitslag'=> [1,0] ],
['thuis' => 'FC Groningen', 'uit' => 'Sparta Rotterdam', 'uitslag'=> [1,2] ],
['thuis' => 'PEC Zwolle', 'uit' => 'FC Utrecht', 'uitslag'=> [1,1] ],
['thuis' => 'Willem II', 'uit' => 'Heracles Almelo', 'uitslag'=> [2,0] ],
['thuis' => 'FC Twente', 'uit' => 'Fortuna Sittard', 'uitslag'=> [1,2] ],
['thuis' => 'SC Cambuur', 'uit' => 'RKC Waalwijk', 'uitslag'=> [0,0] ],
['thuis' => 'N.E.C.', 'uit' => 'Fortuna Sittard', 'uitslag'=> [0,0] ],
];
echo "<h1 class = 'tekst'>hieronder vind u de opdracht voor de voetbal challenge</h1>";
echo "<hr>";

echo "<h2 class = 'tekst'>hieronder de tabel met uitslagen van de gegeven wedstrijden</h2>";
echo "<hr>";


echo "<table align= center>";
echo "<tr><th class='table-1'>Thuis</th><th class='table-1'>Uit</th><th></th><th></th></tr>";
foreach ($uitslagen as $uitslag) {
  echo "<tr class='table'>";
  echo "<td class='table'>".$uitslag['thuis']."</td>";
  echo "<td class='table'>".$uitslag['uit']."</td>";
  echo "<td class='table'>".$uitslag['uitslag'][0]."</td>";
  echo "<td class='table'>".$uitslag['uitslag'][1]."</td>";
  echo "</tr>";
}
echo "</table>";


echo "<hr>";

  $punten=[];
  $gespeeld=[];
  foreach ($uitslagen as $uitslag) {
  
  $punten[$uitslag['thuis']]=0;
  $punten[$uitslag['uit']]=0;
  $gespeeld[$uitslag['thuis']]=0;
  $gespeeld[$uitslag['uit']]=0;
}

  //hier begint de loopt voor de punten
  foreach ($uitslagen as $uitslag){
  $thuisclub = $uitslag['thuis'];
  $uitclub = $uitslag['uit'];

  $thuisscore = $uitslag['uitslag'][0];
  $uitscore = $uitslag['uitslag'][1];
  
  //score berekenen hieronder
  if ($thuisscore > $uitscore){
    $p = $punten[$uitslag['thuis']];
    $p +=3;
    $punten[$uitslag['thuis']]= $p;
  }
  
  if ( $uitscore > $thuisscore){
    $p = $punten[$uitslag['uit']];
    $p +=3;
    $punten[$uitslag['uit']]= $p;  
  
  }
  if($uitscore == $thuisscore){
    $p = $punten[$uitslag['thuis']];
    $p +=1;
    $punten[$uitslag['thuis']]=$p;

    $p = $punten[$uitslag['uit']];
    $p +=1;
    $punten[$uitslag['uit']]=$p;
}
}

// hier moet ik de wedstrijden ophogen met de $gespeeld varibale 
  foreach($uitslagen as $uitslag){
    
    if (array_key_exists($thuisclub , $gespeeld)){
      $gespeeld[$uitslag['thuis']]+=1;
    }

    if (array_key_exists($uitclub , $gespeeld)){
      $gespeeld[$uitslag['uit']]+=1;
    }

    else{ 
      $gespeeld[$uitslag['thuis']]=1;
      $gespeeld[$uitslag['uit']]=1;

    }
  }
arsort($punten);

// hier begint de table voor de uitslagen en de punten
echo "<h2 class = 'tekst'> hieronder de tabel met de uitslagen gesorteerd op de meeste punten</h2>";
echo "<hr>";



echo "<table align= center>";
echo "<tr><th class='table-1'>Club</th><th class='table-1'>Punten</th><th class='table-1'>Gespeeld</th></tr>";
foreach ($punten as $key => $value) {
echo "<tr class='table'>";
echo "<td class='table'>".$key."</td>";
echo "<td class='table'>".$value."</td>";
echo "<td class='table'>".$gespeeld[$key]."</td>";
echo "</tr>";
}
echo "</table>";
echo "<hr>";
?>
</body>
</html>
