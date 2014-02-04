<?php

namespace AppShed\Extensions\RedmineBundle\Services;


class Redmine
{
    /**
     * @var \Guzzle\Http\Client
     */
    protected $client;

    /**
     * @param \Guzzle\Http\Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getProjects()
    {
        return $this->client->get('projects.json', [
            'limit' => 100
        ])->send()->json()['projects'];
    }
}
