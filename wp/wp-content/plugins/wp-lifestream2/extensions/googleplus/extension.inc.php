<?php
class Lifestream_GooglePlusFeed extends Lifestream_Feed
{
	const ID			= 'googleplus';
	const NAME			= 'Google+';
	const URL			= 'http://www.google.com/+';
	const DESCRIPTION	= 'Retrieve Your Google+ Public Shares. To gather this information login to Google+ and then click on your profile.<br><br>The URL will be something like https://plus.google.com/113390079384628293623/posts, your ID number would be <b>113390079384628293623</b>';
	const LABEL			= 'Lifestream_MessageLabel';
	const AUTHOR		= 'Robert McGhee / Shelby DeNike';
	
	function __toString()
	{
		return $this->get_option('id');
	}

	function get_options()
	{
		return array(
			'id' => array($this->lifestream->__('Your Google+ ID Number:'), true, '', ''),
		);
	}
	
	function get_url()
	{
		return "http://googleplusrss.nodester.com/". $this->get_option('id');
	}

	function get_public_url()
	{
		return 'https://plus.google.com/u/0/' . $this->get_option('id');
	}
}
$lifestream->register_feed('Lifestream_GooglePlusFeed');
?>
