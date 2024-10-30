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
			                          'url' => Plugin::get_cdn_url( 'logo--03.png' ),
		                          ] ),
	],
	'logoMaxWidth'  => [
		'type'    => 'number',
		'default' => 150,
	],
	'contentMaxWidth' => [
		'type' => 'number',
		'default' => 470,
	],
	'titleText' => [
		'type'    => 'string',
		'default' => 'We are preparing something amazing and exciting for you.'
	],
	'subtitleText' => [
		'type'    => 'string',
		'default' => 'We’re Coming Soon!'
	],
	'descriptionText' => [
		'type'    => 'string',
		'default' => 'Our website is under construction, <br>meantime you can follow me on:'
	],
	'copyrightText' => [
		'type'    => 'string',
		'default' => '<strong>© 2019 PixelThrone</strong> — All rights reserved.'
	],
	'titleTextColor'     => [
		'type'    => 'string',
		'default' => '#CF3C86'
	],
	'bodyTextColor'     => [
		'type'    => 'string',
		'default' => '#0F1336'
	],
	'titleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"900","fontsize":40,"lineheight":120,"letterspacing":1},"mobile":{"fontweight":"700","fontsize":30,"lineheight":110,"letterspacing":1}}',
	],
	'subtitleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Vollkorn","variants":["regular","italic","600","600italic","700","700italic","900","900italic"],"desktop":{"fontweight":"italic","fontsize":25,"lineheight":100,"letterspacing":1},"mobile":{"fontweight":"italic","fontsize":25,"lineheight":100,"letterspacing":1}}',
	],
	'bodyTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"regular","fontsize":16,"lineheight":130,"letterspacing":1},"mobile":{"fontweight":"regular","fontsize":13,"lineheight":150,"letterspacing":1}}',
	],
	'networks'        => [
		'type'    => 'string',
		'default' => '[]',
	],
	'blockBgColor'     => [
		'type'    => 'string',
		'default' => '#FFFFFF'
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
			                          'type'    => 'image',
			                          'image'   => [
				                          'id' => '',
				                          'full' => Plugin::get_cdn_url('temp-07--bg.jpg'),
				                          'thumb' => '',
			                          ],
			                          'gallery' => [],
			                          'video'   => [],
			                          'color'   => '#000000'
		                          ] ),
	]
];
