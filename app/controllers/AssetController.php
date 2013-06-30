<?php

class AssetController extends BaseController {
	
	public function showAsset($asset)
	{
		$asset = public_path() . '/css/' . $asset;
		$asset_name = md5($asset);

		$content = file_get_contents($asset);

		$response = Response::make($content, 200);

		$response->header('Content-type', 'text/css');
		$response->header('Expires', date('D, d M Y H:i:s', time() + (60*60*24*45)) . ' GMT');
		$response->header('Etag', $asset_name);
		return $response;
	}

	public function showScript($asset)
	{
		$asset = str_replace('-', '/', $asset);
		$asset = public_path() . '/js/' . $asset;
		$asset_name = md5($asset);

		$content = file_get_contents($asset);

		$response = Response::make($content, 200);

		$response->header('Content-type', 'text/javascript');
		$response->header('Expires', date('D, d M Y H:i:s', time() + (60*60*24*45)) . ' GMT');
		$response->header('Etag', $asset_name);
		return $response;
	}
}