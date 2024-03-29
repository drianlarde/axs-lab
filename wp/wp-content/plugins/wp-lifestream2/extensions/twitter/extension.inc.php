<?php
class Lifestream_TwitterFeed extends Lifestream_Feed
{
	const ID		= 'twitter';
	const NAME		= 'Twitter';
	const URL		= 'http://www.twitter.com/';
	const LABEL		= 'Lifestream_MessageLabel';
	const CAN_GROUP	= false;
	const DESCRIPTION = ' Please enter your Twitter handle to pull your tweets';
	const AUTHOR = 'David Cramer, Kyle McNally, Shelby DeNike';
	
	function __toString()
	{
		return $this->get_option('username');
	}

	function get_options()
	{		
		return array(
			'username' => array($this->lifestream->__('Username:'), true, '', ''),
			'hide_username' => array($this->lifestream->__('Hide Username'), false, true, false),
			'hide_replies' => array($this->lifestream->__('Hide Replies'), false, true, false),
		);
	}
	
	function _get_user_link($match)
	{
		return $match[1].$this->get_user_link($match[2]);
	}
	
	function _get_search_term_link($match)
	{
		return $match[1].$this->lifestream->get_anchor_html(htmlspecialchars($match[2]), 'https://search.twitter.com/search?q='.urlencode($match[2]), array('class'=>'searchterm'));
	}

	function get_user_link($user)
	{
		return $this->lifestream->get_anchor_html('@'.htmlspecialchars($user), $this->get_user_url($user), array('class'=>'user'));
	}
	
	function get_user_url($user)
	{
		return 'http://www.twitter.com/'.urlencode($user);
	}
	
	function get_public_url()
	{
		return $this->get_user_url($this->get_option('username'));
	}

	function parse_users($text)
	{
		return preg_replace_callback('/([^\w]*)@([a-z0-9_\-\/]+)\b/i', array($this, '_get_user_link'), $text);
	}

	function parse_search_term($text)
	{
		return preg_replace_callback('/([^\w]*)(#[a-z0-9_\-\/]+)\b/i', array($this, '_get_search_term_link'), $text);
	}

	function get_url($page=1, $count=20)
	{
		{
			$url_base = 'http://twitter.com';
		}
		return $url_base . '/statuses/user_timeline/'.$this->get_option('username').'.rss?page='.$page.'&count='.$count.'&source=twitterandroid';
	}
	
	function save()
	{
		$is_new = (bool)!$this->id;
		parent::save();
		if ($is_new)
		{
			// new feed -- attempt to import all statuses up to 2k
			$feed_msg = array(true, '');
			$page = 0;
			while ($feed_msg[0] !== false && $page < 10)
			{
				$page += 1;
				$feed_msg = $this->refresh($this->get_url($page, 200));
			}
		}
	}
	
	function render_item($row, $item)
	{
		$url = $this->parse_search_term($this->parse_users($this->parse_urls(htmlspecialchars($item['description']))));
		if($this->get_option('hide_username')) return $url;
		else return $url . ' ['.$this->lifestream->get_anchor_html(htmlspecialchars($this->get_option('username')), $item['link']).']';
	}
	
	function yield($row, $url, $key)
	{
		$data = parent::yield($row, $url, $key);
		$string = $this->get_option('username'). ': ';
		$description = $this->lifestream->html_entity_decode($row->get_description());
		if (lifestream_str_startswith(strtolower($description), strtolower($string)))
		{
			$description = substr($description, strlen($string));
		}
		if ($this->get_option('hide_replies') && lifestream_str_startswith($description, '@'))
		{
			return false;
		}
		$data['description'] = $description;
		return $data;
	}
}

/**
 * Displays your latest Twitter status.
 * @param {Boolean} $links Parse user links.
 */
function lifestream_twitter_status($links=true)
{
	global $lifestream;

	$event = $lifestream->get_single_event('twitter');
	if (!$event) return;
	if ($links)
	{
		// to render it with links
		echo $event->feed->render_item($event, $event->data[0]);
	}
	else
	{
		// or render just the text
		echo $event->data[0]['title'];
	}
}

$lifestream->register_feed('Lifestream_TwitterFeed');
?>
