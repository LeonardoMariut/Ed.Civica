


<?php

//mese anno rilevazione
function MAR($anno, $mese, $tipo) {


    $dir = 'sqlite:C:/Work/polveri.db'; //connessione db
    $dbh = new PDO($dir) or die("noooo");
    //$query="SELECT data,valore,tipoInquinante FROM rilevazioni  WHERE data<'1/1/2020'";   
    //$query="SELECT data,valore,tipoInquinante FROM rilevazioni  WHERE data>='10/1/2020' AND data<='31/12/2020'  AND tipoInquinante='PM10'";   
    //$query="SELECT data,valore,tipoInquinante FROM rilevazioni  WHERE data BETWEEN '10/1/2020' AND '31/12/2020'  AND tipoInquinante='PM10'";   

    $query = "SELECT AVG(valore) AS V FROM rilevazioni  WHERE data  LIKE '%/$mese/$anno'   AND tipoInquinante='$tipo'";
    //eseguo
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Valore";
    echo $row["V"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Polveri sottili rilevazioni</title>


    </style>
</head>
<body>

    <h1> Rilevazioni per anno e per tipo</h1>
    <?php
    echo "2020 PM10 <br>";
    for ($i = 1; $i <= 12; $i++) {
        $anno = 2020;
        $tipo = "PM10";
        if ($i < 10)
            $mese = "0" . $i;
        if ($i >= 10)
            $mese = $i;
        MAR($anno, $mese, $tipo);
        echo "<br>";
    }
    
        echo "2020 PM10 <br>";
    for ($i = 1; $i <= 12; $i++) {
        $anno = 2020;
        $tipo = "PM2.5";
        if ($i < 10)
            $mese = "0" . $i;
        if ($i >= 10)
            $mese = $i;
        MAR($anno, $mese, $tipo);
        echo "<br>";
    }

    echo "2019 PM2.5 <br>";
    for ($i = 1; $i <= 12; $i++) {
        $anno = 2019;
        $tipo = "PM2.5";
        if ($i < 10)
            $mese = "0" . $i;
        if ($i >= 10)
            $mese = $i;
        MAR($anno, $mese, $tipo);
        echo "<br>";
    }
    
    echo "2019 PM10 <br>";
    for ($i = 1; $i <= 12; $i++) {
        $anno = 2019;
        $tipo = "PM10";
        if ($i < 10)
            $mese = "0" . $i;
        if ($i >= 10)
            $mese = $i;
        MAR($anno, $mese, $tipo);
        echo "<br>";
    }
    
    
    


?>


    
    ?>


</body>
</html>


