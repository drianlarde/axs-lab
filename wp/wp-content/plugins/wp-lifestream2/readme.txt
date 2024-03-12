=== WP-Lifestream2 ===
Contributors: sdenike
Tags: lifestream, rss, social, miniblogging, twitter, pictmobi, flickr, friendfeed, delicious, last.fm, facebook, digg, atom, instapaper, Google Plus, youtube
Requires at least: 2.8
Tested up to: 3.3
Stable tag: trunk

Create a Lifestream on your blog

== Description ==

Lifestream displays your social feeds and photos much like you would see it on many of the social networking sites. 

== Installation ==

Upload the plugin into `/wp-content/plugins/`. You should end up with `/wp-content/plugins/lifestream/`.

Activate the plugin under the "Plugins" menu.

Visit "Lifestream" -> "Settings" to configure the basic options, and add feeds.

There are severals methods in which you can use Lifestream in a WordPress page.

The easiest way is to use the normal context handler (works in pages and posts):

`[lifestream]`

Another method requires a [custom WordPress page](http://codex.wordpress.org/Pages#Page_Templates), or the use of a template, and is a simple function call:

`<?php lifestream(); ?>`

You may also specify several parameters in the `lifestream` method (useful for sidebar display). These should be in the standard key=>value format for PHP calls.

* `(int) offset`: defaults to 0
* `(int) limit`: defaults to '50'
* `(string) date_interval`: defaults to '1 month'
* `(boolean) break_events`: defaults to false - forces grouped events to be single
* `(array) user_ids`: defaults to all users -- specify the ids of users to show
* `(array) feed_types`: defaults to all feeds -- specify the feed keys (e.g. twitter) to show
* `(array) feed_ids`: defaults to all feeds -- specify the ids of feeds to show, also overrides `feed_types` setting

For example:

`[lifestream limit="10"]`

For more advanced uses, you may directly use `get_events()` which will return an array of `Event` instances. This is the same syntax as the `lifestream()` method.

Example:

`<ul>
<?php
$options = array('limit' => 50);
$events = $lifestream->get_events($options);

foreach ($events as $event)
{
	echo '<li>'.$event->render($options).'</li>';
}
?>
</ul>`

Another popular example, would to be show your current Twitter, or Facebook status somewhere in your templates:

`$events = $lifestream->get_events(array('feed_types'=>array('twitter'), 'number_of_results'=>1, 'break_groups'=>true);
$event = $events[0];

// to render it with links
echo $event->feed->render_item($event, $event->data);

// or render just the text
echo $event->data['title'];`

Or, use our handy shortcuts:

`<?php lifestream_twitter_status(); ?>`

And

`<?php lifestream_facebook_status(); ?>`

== Requirements ==

* PHP 5
* WordPress 2.8 or newer

== Features ==

* Personalizable CSS classes.
* Detailed configuration options.
* Supports nearly every major social networking website
* Unlimited number of feeds in your Lifestream.
* Supports grouping of events.
* Localization ready!
* Digest available to summarize your activities.
* WordPress MU is supported.

== Built-in Feeds ==

The plugin includes most of the major social networking feeds available. You may add your own, as well as send me ideas for new feeds at the GitHub Forum. If you wish to add custom extensions, please see extensions/README.

* Facebook
* Digg
* Blog
* Twitter
* Reddit
* De.licio.us
* GetGlue
* Instapaper
* Jaiku
* Last.fm (Revamped plugin in 0.38)
* Flickr (Improved display in 0.39)
* Photobucket
* Pownce
* YouTube
* Google Plus
* Yelp
* MySpace Blog
* Skitch
* Identi.ca
* Pandora
* TwitPic
* Pict.Mobi
* Vimeo
* StumbleUpon
* Tumblr
* Ma.gnolia
* Zooomr
* Blip.fm
* Brightkite
* Picasa (Web)
* Kongregate
* Viddler
* coComment
* FoodFeed
* MyEpisodes
* Mixx
* SlideShare
* Blip.tv
* Steam
* Xbox Live
* Github
* Readernaut
* ScrnShots
* Mobypicture
* SmugMug
* DeviantArt
* BackType
* LibraryThing
* Netflix
* Wikipedia
* Upcoming.org
* WordPress Codex
* Raptr
* Gowalla
* Kiva
* Codaset
* Foursquare
* Ustream
* World of Warcraft Armory

Want to add your own? See extensions/README for more information.

== Localization ==

Currently the plugin is localized in the default language of English, as well as the following languages. If you wish to submit a localization please send it to lifestream@fauxzen.com

* Chinese (Simplified)
* Japanese
* Polish
* Danish
* Italian
* Bulgarian
* French
* German
* Danish
* Spanish
* Swedish
* Belorussian
* Catalan

== Changelog ==

= 1.1.4 =
* Removed Amazon plugin as it was no longer valid
* Updated Google+ plugin so that it works again.

= 1.1.3 =
* Fixed delicious feed URL per this forum <http://wordpress.org/support/topic/plugin-wp-lifestream2-fix-for-delicious-feeds>post</a>
* Adjusted changelog to have newest changes first.

= 1.1.2 =
* Minor cleanup of various code

= 1.1.1 =
* Fixed Google+ extension
* Removed Google Reader extension
* Removed a Changelog/Forum link in Dashboard
* Removed Screenshot Tab as those no longer apply at this time

= 1.1 =
* Branched from the GitHub release on 09/20/2011
* Added Pict.Mobi extension
* Fixed Twitter extension
* Removed Hulu, iTunes as they no longer offer the feed

= 1.0 =
* This updated version containing a whole load of fixes and more plugins. This is the version available on GitHub as at 27/07/2011

= 0.99.9.8-BETA =
* The last release by David Cramer

== Credits ==

An [Enthropia Labs](http://www.enthropia.com/labs/) project.

Created by David Cramer ([mail](mailto:dcramer@gmail.com), [website](http://www.davidcramer.net)).

Maintained by Robert McGhee ([mail](mailto:robert@robertmcghee.co.uk), [website](http://wwww.robertmcghee.co.uk)).

Core concept inspired by [RSS Stream](http://rick.jinlabs.com/code/rss-stream).
