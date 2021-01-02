<?php

require 'vendor/autoload.php';

use Project\SearchEngine\Crawler;
use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler as SymfonyCrawler;


Test::hello();
die();

$crawler = new Crawler(new Client(), new SymfonyCrawler());

echo '<pre>';
    print_r($crawler->getPhpCoursesNames());
echo '</pre>';

