<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 * @copyright 2020 Elias Haisch <elias@eliashaisch.de>
 */
namespace proxmox\Api\nodes\node\storage\content;

use GuzzleHttp\Client;
use proxmox\Helper\connection;

/**
 * Class volume
 * @package proxmox\api\nodes\node\storage
 */
class volume
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * content constructor.
     * @param $httpClient Client
     * @param $apiURL string
     * @param $cookie mixed
     */
    public function __construct($httpClient,$apiURL,$cookie){
        $this->httpClient = $httpClient; //Save the http client from GuzzleHttp in class variable
        $this->apiURL = $apiURL; //Save api url in class variable and change this to current api path
        $this->cookie = $cookie; //Save auth cookie in class variable
    }

    // /**
    //  * Directory index
    //  * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}
    //  * @param $volid string
    //  * @return storage
    //  */
    // public function volume($volid){
    //     return new volume($this->httpClient,$this->apiURL.$volid.'/',$this->cookie);
    // }
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
    /**
     * POST
     */



    /**
     *  Path: /nodes/{node}/storage/{storage}/content/{volume}
	 * Copy a volume. This is experimental code - do not use.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/content/{volume}
     * @param $target_node string 
     * @return string
     */
    public function post($target_node=""){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL,$this->cookie,$target_node));
    }

    /**
     * PUT
     */

    /**
     * Resource Tree
     * Update volume attributes
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/content/{volume}
     * @param $notes string
     * @param $storage string
     * @return null
     */
    public function put($notes="", $storage=""){
        return connection::processHttpResponse(connection::putAPI($this->httpClient,$this->apiURL,$this->cookie,$notes,$storage));
    }

    /**
     * DELETE
     */

    /**
     * Destroy the vm (also delete all used/owned volumes).
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/content/{volume}
     * @param $delay int
     * @return string
     */
    public function delete(){
        return connection::processHttpResponse(connection::deleteAPI($this->httpClient,$this->apiURL,$this->cookie));
    }

}
