<?php namespace Aller\API\Resource\Eloquent;

use Illuminate\Database\Eloquent\Collection as BaseCollection;
use Aller\API\Resource\CollectionInterface;

class Collection extends BaseCollection implements CollectionInterface {

	protected $collectionName;

	/**
	* Return ETag based on collection of items
	*
	* @return string 	md5 of all ETags
	*/
	public function getEtags($regen=false)
	{
		$etag = '';

		foreach ( $this as $resource )
		{
			$etag .= $resource->getEtag($regen);
		}

		return md5($etag);
	}

	/**
	* Set the name of the collection
	* for API resource output
	*
	* @param string   Name of the collection
	* @return object  Api\Resource\Eloquent\Collection
	*/
	public function setCollectionName($name)
	{
		$this->collectionName = $name;

		return $this;
	}

	/**
	* Retrieve the collection name
	*
	* @return string Name of the collection
	*/
	public function getCollectionName() {
		return $this->collectionName;
	}

}