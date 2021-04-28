

<?php
    function genTable()
    {
        $dir='sqlite:C:/Work/polveri.db';
        $dbh= new PDO($dir) or die("noooo");
        $query="SELECT r.codseqst,r.data,r.tipoInquinante,r.valore,s.localita FROM rilevazioni r JOIN stazioni s ON (r.codseqst=s.codseqst)";

        $stmt = $dbh->prepare($query);
        $stmt->execute();

        echo "<table class=\"tab\">";
            echo "<thead>";
                //echo "<th>Codice</th>";
                echo "<th>Data</th>";
                echo "<th>Tipo Inquinante</th>";
                echo "<th>Valore</th>";
                echo "<th>Località</th>";
                
            echo "</thead>";


            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                    //echo "<td>".$row['codseqst']."</td>";
                    echo "<td>".$row['data']."</td>";
                    echo "<td>".$row['tipoInquinante']."</td>";
                    echo "<td>".$row['valore']."</td>";
                    echo "<td>".$row['localita']."</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Polveri sottili rilevazioni</title>
    
    <style>
        .tab
        {
          width: 100%;
          background-color: #FFFFFF;
          border-collapse: collapse;
          border-width: 1px;
          border-color: #95F881;
          border-style: dotted;
          color: #000000;
        }
        
        .tab td, .tab th 
        {
            border-width: 1px;
            border-color: #95F881;
            border-style: dotted;
            padding: 5px;
        }

        .tab thead 
        {
            background-color: #56C470;
        }
</style>
    </style>
    </head>
<body>

    <h1> Rilevazioni</h1>
    <div id="table">
        <?php genTable() ?>
        
        
    </div>
    
</body>
</html>
