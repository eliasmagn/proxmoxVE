<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 * @copyright 2020 Elias Haisch <elias@eliashaisch.de>
 */
namespace proxmox\Api\nodes\node;
use proxmox\Api\nodes\node\qemu\vmid\agent;
use GuzzleHttp\Client;
use proxmox\Helper\connection;

/**
 * Class version
 * @package proxmox\api\nodes\node
 */
class storage
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * storage constructor.
     * @param $httpClient Client
     * @param $apiURL string
     * @param $ticket string
     */
    public function __construct($httpClient,$apiURL,$cookie){
        $this->httpClient = $httpClient; //Save the http client from GuzzleHttp in class variable
        $this->apiURL = $apiURL; //Save api url in class variable and change this to current api path
        $this->cookie = $cookie; //Save auth cookie in class variable

    }


/* possibly TODO HERE or in ./storage/storage.php
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
     * Directory index
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}
     * @param $storage string
     * @return storage
     */
    public function storage($storage){
        return new storage($this->httpClient,$this->apiURL.$storage.'/',$this->cookie);
    }
    /**
     * Directory index
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}
     * @param $storage string
     * @return content
     */
    public function content($storage){
        return new content($this->httpClient,$this->apiURL.$storage.'content/',$this->cookie);
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
