<?php

namespace BehaviorTest\State;

use BehaviorTest\State;

use Guzzle\Http\Client;

class Guzzle implements State {

    protected static $staticHeaders = array();

    protected $url;

    protected $document;

    protected $client;

    protected $response;

    protected $parent;

    public function __construct($url, Client $client = null, $method = 'get', array $headers = array(), $body = '', State $parent = null) {
        if (!$client) {
            $host = parse_url($url, \PHP_URL_HOST);
            if ($host) {
                $client = new Client('http://' . $host);
            } else {
                throw new \LogicException("Can't auto-create client");
            }
        }
        $this->url = $url;
        $this->client = $client;
        $this->parent = $parent;
        $headers = array_merge($headers, $this::$staticHeaders);
        $request = $this->client->$method($url, $headers, $body);
        $this->response = $request->send();
            
    }

    public function getUrl() {
        return $this->url;
    }

    public function getHeader($name) {
        return (string) $this->response->getHeader($name);
    }

    public function getBody() {
        return $this->response->getBody(true);
    }

    public function getDocument() {
        if (!$this->document) {
            libxml_use_internal_errors(true);
            $this->document = new \DomDocument;
            $this->document->loadHtml($this->getBody());
        }
        return $this->document;
    }

    public function getPrevious() {
        return $this->parent;
    }

    public function resolveLink($link) {
        return new static($link, $this->client, 'get', array(), '', $this);
    }
}