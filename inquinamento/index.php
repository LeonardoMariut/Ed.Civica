<?php
    function genTable()
    {
        $dir='sqlite:D:/Work/polveri.db';
        $dbh= new PDO($dir) or die("noooo");
        $query="SELECT *FROM stazioni";
        $stmt = $dbh->prepare( $query );
        $stmt->execute();
        
        echo "<table class=\"tab\">";
            echo "<thead>";
                echo "<th>Nome</th>";
                echo "<th>Località</th>";
                echo "<th>Comune</th>";
                echo "<th>Provincia</th>";
            echo "</thead>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr>";
                    echo "<td>".$row['nome']."</td>";
                    echo "<td>".$row['localita']."</td>";
                     echo "<td>".$row['comune']."</td>";
                    echo "<td>".$row['provincia']."</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>Inquinamento da polveri sottili</title>  
        <link href="styles.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
        <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
    
    </head>
<body>    
    <div class="max_size blur">

        <div class="left_column" style="height:100%;">
            <div id="map" class="map"></div>
            <script type="text/javascript">
                var map = new ol.Map({
                    target: 'map',
                    layers: [
                        new ol.layer.Tile({
                            source: new ol.source.OSM()
                        })
                    ],
                    view: new ol.View({
                        center: ol.proj.fromLonLat([11.11, 45.45]),
                        zoom: 10
                    })
                });
            </script>
        </div>

        <div class="right_column title_nav" style="height:20%;">
            <h1 class="title"> INQUINAMENTO DA POLVERI SOTTILI </h1>
        </div>
        
        <div class="right_column" style="height:80%;">
            <input type="date" id="varDate"> </date>
        </div>
        
        <h1 class="title" style="color:yellow;"> Stazioni </h1>
        <div id="table">
            <?php genTable() ?>
        </div>
    </div>
    
</body>
</html>
