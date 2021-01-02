<?php

namespace Project\SearchEngine;

use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler as SymfonyCrawler;

class Crawler
{
    private $client;
    private $crawler;

    public function __construct($client, SymfonyCrawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    public function getPhpCoursesNames(string $url): array
    {
        $response = $this->client->request('GET', $url);

        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);

        $names = $this->crawler->filter("span.card-curso__nome");

        $namesArray = [];

        foreach ($names as $name) {
            array_push($namesArray, $name->textContent);
        }

        return $namesArray;
    }

}