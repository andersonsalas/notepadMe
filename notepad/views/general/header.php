<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= (isset($tituloPagina) ? $tituloPagina.' - ' : '').'notepadMe!';?></title>
        <meta name="author" content="Anderson Salas">
        <meta name="description" content="notepadMe!">
        <link rel="shortcut icon" type="image/png" href="<?= img_dir('favicon.png');?>" />

        <?php

            echo css_dir('bootstrap.min.css',true)."\n\t";
            echo css_dir('general.css',true)."\n\t";

        ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php

            echo js_dir('jquery.min.js',true)."\n\t";
            echo js_dir('bootstrap.min.js',true)."\n\t";
            echo js_dir('app.js',true)."\n\t";

            if(isset($extraTags) && is_array($extraTags)):
                echo "\n\t";
                foreach($extraTags as $tag)
                    echo $tag."\n\t";
            endif;

        ?>

        <script>if(window.top !== window.self) window.top.location.replace(window.self.location.href);</script>
    </head>
    <body>