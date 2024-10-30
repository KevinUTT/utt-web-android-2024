<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Primer Sitio PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $variable = 10;
        $total = $variable * 2;
        $condicion = 'caracteres';
        echo "<div class='cuadro'>$condicion</div>";

        $arreglo = [1, 2, 3];
        $objeto = [
            "dato"=>"algo",
            "propiedad" => 10
        ];

        $valor = $objeto["propiedad"];
        echo "Objeto: $valor";

        $html = "<ul>";
        for($i = 0; $i < count($arreglo); $i++) {
            $html .= "<li>$arreglo[$i]</li>";
        }
        $html .= "</ul>";
        echo "$html";
    ?>
</body>
</html>