<?php

class FacebookwallViewer extends \ContentElement
{
	protected $strTemplate = 'ce_facebookwall';

	public function generate()
	{
		$this->loadLanguageFile('tl_facebookwall');
		if (TL_MODE == 'BE')
		{
			$objWall = \FacebookwallModel::findByPK($this->facebookwall);
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->title =  $objWall->title . " - " . $objWall->count . " Items";
			return $objTemplate->parse();	
		}
		return parent::generate();
		
	}//end generate

	protected function get_data($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}//end get_data

	protected function compile(){

		$objWall = \FacebookwallModel::findByPK($this->facebookwall);
		$access_token = $objWall->appid.'|'.$objWall->secret;

		$userfields = "id,name,picture,cover";
		$feedfields = "id,message,picture,link,name,description,type,icon,created_time,from,object_id";

		$user_link = "https://graph.facebook.com/{$objWall->userid}?access_token={$access_token}&fields={$userfields}";
		$feed_link = "https://graph.facebook.com/{$objWall->userid}/feed?access_token={$access_token}&fields={$feedfields}&limit={$objWall->count}";

		$this->Template->wall = $objWall;
		$this->Template->user = json_decode($this->get_data($user_link));
		$this->Template->feed = json_decode($this->get_data($feed_link));
		
	}//end compile

}//end class
