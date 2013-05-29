<?php use JProjFinal\Includes\Views; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Re: Wanting/Getting</title>
    <link rel="stylesheet" type="text/css" href="<?php echo siteurl('ui/css/main.css'); ?>" />
</head>
<body>
    <header>
        <div class="container">
            <h1>Re: Cycle</h1>
            <h2>Repreparing Today's Trash for Tomorrow's Tomorrow.</h2>
        </div>
    </header>

    <div class="container page" id="page">
        <div id="side" class="side">
            <?php Views::renderPart('template/navigation'); ?>
        </div>
        <div class="content">
            <?php displayFlashMessage(); ?>