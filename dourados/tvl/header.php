<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dourados em Patrimônio</title>
    <?php wp_head()?>
    <!-- <link rel="stylesheet" href="css/style.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container d-flex align-items-center justify-content-between">
            <h1><img src="<?php echo get_template_directory_uri().'/images/marca.png'; ?>" alt="<?php echo 'Marca do site '.bloginfo( 'name' ); ?>"></h1>
            <nav>
                <input type="checkbox" id="nav" class="hidden"/>
                <label for="nav" class="nav-open"><i></i><i></i><i></i></label>
                <div class="nav-container">
                    <?php wp_nav_menu( 'primary_menu' ) ?>                    
                </div>
            </nav>
        </div>
    </header>