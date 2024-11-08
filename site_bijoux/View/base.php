<?php
require_once File::build_path(array("Model", "Model.php"));

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $pagetitle?></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/polices.css">
        <link rel="stylesheet" href="css/mediaQueries.css">
        <link rel="stylesheet" type="text/css" media="print" href="css/print.css">
    </head>
    
    <body>

            <?php require_once 'includes/header.php'; ?>
                   
        <main>
            <?php require_once File::build_path(array("View",$controller, $view.".php"));  ?>
        </main>
        
        <?php require_once 'includes/footer.php'; ?>

        </body>
        
   
</html>
