<?php

use Pixelthrone\ComingSoon_Blocks\Plugin;

return [
	'align'         => [
		'type'    => 'string',
		'default' => 'full'
	],

	// Brand
	'addLogo'           => [
		'type'    => 'boolean',
		'default' => false,
	],
	'logo'          => [
		'type'    => 'string',
		'default' => json_encode( [ 'id'  => '', 'url' => Plugin::get_cdn_url( 'logo--01.png' ) ] ),
	],
	'logoMaxWidth'  => [
		'type'    => 'number',
		'default' => 150,
	],

	// Content
	'contentMaxWidth' => [
		'type' => 'number',
		'default' => 600,
	],
	'titleText' => [
		'type'    => 'string',
		'default' => 'Sorry, we’re doing some work on the website.'
	],
	'descriptionText' => [
		'type'    => 'string',
		'default' => 'Thank you for being patient, we hope to be brief.'
	],
	'copyrightText' => [
		'type'    => 'string',
		'default' => '© 2019 PixelThrone'
	],

	// Colors
	'titleTextColor'     => [
		'type'    => 'string',
		'default' => '#FD8369'
	],
	'bodyTextColor'     => [
		'type'    => 'string',
		'default' => '#181723'
	],

	// Typo
	'titleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"900","fontsize":45,"lineheight":120,"letterspacing":1},"mobile":{"fontweight":"700","fontsize":23,"lineheight":130,"letterspacing":1}}',
	],
	'bodyTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"500","fontsize":16,"lineheight":130,"letterspacing":1},"mobile":{"fontweight":"regular","fontsize":13,"lineheight":150,"letterspacing":1}}',
	],
	'copyrightTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"500","fontsize":13,"lineheight":130,"letterspacing":1},"mobile":{"fontweight":"regular","fontsize":13,"lineheight":150,"letterspacing":1}}',
	],

	// Networks
	'networks'        => [
		'type'    => 'string',
		'default' => '[]',
	],

	// Background
	'blockBgColor'     => [
		'type'    => 'string',
		'default' => '#FFFFFF'
	],
	'overlay'       => [
		'type'    => 'string',
		'default' => json_encode( ['color'   => '#FFFFFF', 'opacity' => 0 ] )
	],
	'background'    => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'type'    => 'image',
			                          'image'   => [
				                          'id' => '',
				                          'full' => Plugin::get_cdn_url('temp-09--bg.jpg'),
				                          'thumb' => '',
			                          ],
			                          'gallery' => [],
			                          'video'   => [],
			                          'color'   => '#FFFFFF'
		                          ] ),
	]
];
