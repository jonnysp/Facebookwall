<?php


class FacebookwallModel extends \Model
{
    protected static $strTable = 'tl_facebookwall';

    public function escapeTags($value='')
	{
		$val =  preg_replace('/</ix', '&lt;', $value);
		return  preg_replace('/>/ix', '&gt;', $val);
	}

	public function nl2br($value="")
	{
		return  preg_replace('/(\r\n)|(\n\r)|\r|\n/ix', '<br>', $value);
	}                     

	public function autoLink($value="")
	{
		$val = preg_replace('!(http|ftp|https)://[\w\-_]+(\.[\w\-_]+)+([\w\-.,@?^=%&amp;:/~+#ÄäÖöÜüß]*[\w\-@?^=%&amp;/~+#])?!i', '<a href="$0" target="_blank">$0</a>', $value);
		return preg_replace('/(\B\#)([0-9a-zA-ZÄäÖöÜüß_\-+]+\b)(?!;)/u', '<a href="https://www.facebook.com/hashtag/$2" target="_blank">$0</a>', $val);
	}

	public function modText($value="")
	{
		return $this->nl2br($this->autoLink($this->escapeTags($value)));
	}
}
