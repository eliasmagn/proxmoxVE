<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 * @copyright 2020 Elias Haisch <elias@eliashaisch.de>
 */
namespace proxmox\Api\nodes\node\storage;

use GuzzleHttp\Client;
use proxmox\Api\nodes\node\storage\content\volume;
use proxmox\Helper\connection;

/**
 * Class content
 * @package proxmox\api\nodes\node\storage
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
     * @param $cookie mixed
     */
    public function __construct($httpClient,$apiURL,$cookie){
        $this->httpClient = $httpClient; //Save the http client from GuzzleHttp in class variable
        $this->apiURL = $apiURL; //Save api url in class variable and change this to current api path
        $this->cookie = $cookie; //Save auth cookie in class variable
    }


    /**
     * GET
     */

   /**
     * List storage content
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/content
     * @param $content string
     * @param $vmid int
     * @return mixed|null
     * ,$content,$vmid $content="", $vmid
     */
    public function get(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL,$this->cookie));
    }
    /**
     * Get volume attributes
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/content
     * @return mixed
     */
    public function getvolume(){
        return new volume($this->httpClient,$this->apiURL.'volume/',$this->cookie);
    }

    /**
     * POST
     */

    /**
     * Allocate disk images.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/content
     * @param $format string
     * @param $param array
     * @return string
     */
    public function post($format="qcow2",$param){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL,$this->cookie,$format,$param));
    }

    /**
     *  Path: /nodes/{node}/storage/{storage}/content/{volume}
	 * Copy a volume. This is experimental code - do not use.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/content/{volume}
     * @param $target_node string 
     * @return string
     */
    public function postVolume($target_node=""){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.'volume/',$this->cookie,$target_node));
    }

    /**
     * PUT
     */

    /**
     * Resource Tree
     * Update volume attributes
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/content/{volume}
     * @param $notes string
     * @return null
     */
    public function putVolume($notes=""){
        return connection::processHttpResponse(connection::putAPI($this->httpClient,$this->apiURL.'volume/',$this->cookie,$params));
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
    public function deleteVolume($delay="2"){
        return connection::processHttpResponse(connection::deleteAPI($this->httpClient,$this->apiURL.'volume/',$this->cookie,$delay));
    }

}