<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/posts.php";
    session_start();
    if (empty($_SESSION['entry_array'])) {
        $_SESSION['entry_array'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {

        return $app['twig']->render('entries.html.twig', array('entry_array' => Entry::getAll()));

    });

    $app->post('/', function() use ($app){

        $new_entry = new Entry($_POST['title'], $_POST['description'], $_POST['location'], $_POST['pay']);
        $new_entry->save();
        return $app['twig']->render('entries.html.twig', array('entry_array' => Entry::getAll()));
    });

    $app->post('/clear', function() use ($app){
        Entry::clearAll();
        return $app['twig']->render('entries.html.twig');
    });
    return $app;
?>
