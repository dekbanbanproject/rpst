<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

    table {
        border-collapse: collapse;
        }
        table, th, td {
        border: 1px solid black;
        }        
</style>
</head>

<body>
{{$drugs->DRUG_CODE }}  
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
          
</body>
</html>