<?php

use Symfony\Component\HttpFoundation\Request;

use Vision\Widget\Container;
use Vision\Renderer\DefaultRenderer;
use Vision\Loader\XmlLoader;

/** show all errors! */
ini_set('display_errors', 1);
error_reporting(E_ALL);

$basepath = __DIR__ . '/..';
$app = new Silex\Application();
$app['debug'] = true;
$app->get('/hello/{name}', function($name) use($app) {
    $html = file_get_contents(__DIR__ . '/layout.html');
    
    $container = new Container();
    $loader = new XmlLoader();
    $loader->load($container, __DIR__ . '/../example/example.xml');
    
    $renderer = new DefaultRenderer();
    $content = $renderer->toHtml($container);
    
    $content .= '<br /><pre>' . htmlentities($content) . '</pre>';
    
    $html = str_replace('{{content}}', $content, $html);
    return $html; 
}); 

return $app;
