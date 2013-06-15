<?php namespace Aller\API\Resource;

interface ResourceInterface {

	public function getEtag($regen=false);

    public function setResourceName($name);

    public function getResourceName();

}