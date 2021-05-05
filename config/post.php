<?php
/**
 * Description:
 * file name: post.php
 * author: vanwhebin
 * create time: 2021-04-02
 */
return [
	'name' => '在线教程',
	'title' => '在线教程',
	'subtitle' => '测试在线教程',
	'description' => '',
	'author' => 'Fogg Philips',
	'page_image' => 'home-bg.jpg',
	'per_page' => 5,
	'rss_size' => 25,
	'uploads' => [
		'storage' => 'public',
		'webpath' => '/storage',
	],
	'contact_email'=> env('MAIL_FROM_ADDRESS'),
];