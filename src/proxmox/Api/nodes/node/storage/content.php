<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 * @copyright 2020 Elias Haisch <elias@eliashaisch.de>
 */
namespace proxmox\Api\nodes\node\storage;
use GuzzleHttp\Client;
use proxmox\Helper\connection;

/**
 * Class version
 * @package proxmox\api\nodes\node
 */
class content
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * content constructor.
     * @param $httpClient Client
     * @param $apiURL string
     * @param $ticket string
     */
    public function __construct($httpClient,$apiURL,$cookie){
        $this->httpClient = $httpClient; //Save the http client from GuzzleHttp in class variable
        $this->apiURL = $apiURL; //Save api url in class variable and change this to current api path
        $this->cookie = $cookie; //Save auth cookie in class variable

    }


    /**
     * Path: /nodes/{node}/storage/{storage}/content/{volume}
     * Get volume attributes
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes
     * @param $string
     * @return mixed|null
     */
    public function volume($volume){
        return new volume($this->httpClient,$this->apiURL.$volume.'/',$this->cookie);
    }

    /**
     * GET
     */

    /**
     * Path: /nodes/{node}/storage
     * Get status for all datastores.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage
     * @return mixed|null
     */
    public function get(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL,$this->cookie));
    }
}
