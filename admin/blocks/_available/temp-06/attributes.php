<?php

use Pixelthrone\ComingSoon_Blocks\Plugin;

return [
	'align'         => [
		'type'    => 'string',
		'default' => 'full'
	],
	'logo'          => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'id'  => '',
			                          'url' => Plugin::get_cdn_url( 'avatar--01.jpg' ),
		                          ] ),
	],
	'logoMaxWidth'  => [
		'type'    => 'number',
		'default' => 110,
	],
	'logoWithMask'  => [
		'type'    => 'boolean',
		'default' => true,
	],
	'contentMaxWidth' => [
		'type' => 'number',
		'default' => 800,
	],
	'titleText' => [
		'type'    => 'string',
		'default' => 'Hi! I\'m Ana and I’m a travel blogger trying to make the world a better place.'
	],
	'subtitleText' => [
		'type'    => 'string',
		'default' => 'Our website is under construction.<br>Meantime you can follow me on:'
	],
	'copyrightText' => [
		'type'    => 'string',
		'default' => '<strong>© 2019 PixelThrone</strong>— All rights reserved.'
	],
	'titleTextColor'     => [
		'type'    => 'string',
		'default' => '#FC596A'
	],
	'bodyTextColor'     => [
		'type'    => 'string',
		'default' => '#181723'
	],
	'titleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"900","fontsize":48,"lineheight":120,"letterspacing":0.9},"mobile":{"fontweight":"900","fontsize":33,"lineheight":120,"letterspacing":1}}',
	],
	'bodyTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Montserrat","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"desktop":{"fontweight":"300","fontsize":15,"lineheight":150,"letterspacing":0.2},"mobile":{"fontweight":"regular","fontsize":13,"lineheight":150,"letterspacing":1}}',
	],
	'networks'        => [
		'type'    => 'string',
		'default' => '[]',
	],
	'overlay'       => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'color'   => '#000000',
			                          'opacity' => 0,
		                          ] )
	],
	'background'    => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'type'    => 'color',
			                          'image'   => [],
			                          'gallery' => [],
			                          'video'   => [],
			                          'color'   => '#FFFFFF'
		                          ] ),
	]
];
