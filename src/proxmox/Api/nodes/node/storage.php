<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 * @copyright 2020 Elias Haisch <elias@eliashaisch.de>
 */
namespace proxmox\Api\nodes\node;

use GuzzleHttp\Client;
use proxmox\Helper\connection;

/**
 * Class version
 * @package proxmox\api\nodes\node
 */
class nodestorage
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * nodestorage constructor.
     * @param $httpClient Client
     * @param $apiURL string
     * @param $ticket string
     */
    public function __construct($httpClient,$apiURL,$cookie){
        $this->httpClient = $httpClient; //Save the http client from GuzzleHttp in class variable
        $this->apiURL = $apiURL.'/api2/json/nodes/node/storage/'; //Save api url in class variable and change this to current api path
        $this->cookie = $cookie; //Save auth cookie in class variable

    }
}

/* TODO HERE
*
*prunebackup
*
*rrd
*
*rrddata
*
*status
*
*upload
*
*/


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