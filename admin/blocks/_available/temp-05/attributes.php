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
			                          'url' => Plugin::get_cdn_url( 'logo--04.png' ),
		                          ] ),
	],
	'logoMaxWidth'  => [
		'type'    => 'number',
		'default' => 150,
	],
	'contentMaxWidth' => [
		'type' => 'number',
		'default' => 845,
	],
	'titleText' => [
		'type'    => 'string',
		'default' => 'Get Ready... <br>Our new website is Coming Very Soon!'
	],
	'subtitleText' => [
		'type'    => 'string',
		'default' => 'Coming Soon'
	],
	'contactsText' => [
		'type'    => 'string',
		'default' => 'hello@yourwebsite.com<br>+00 (000) 000-0000'
	],
	'copyrightText' => [
		'type'    => 'string',
		'default' => '<strong>© 2019 PixelThrone<br></strong>— All rights reserved.'
	],
	'titleColor'     => [
		'type'    => 'string',
		'default' => '#FFC300'
	],
	'textColor'     => [
		'type'    => 'string',
		'default' => '#FFFFFF'
	],
	'titleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"900","fontsize":80,"lineheight":120,"letterspacing":1},"mobile":{"fontweight":"900","fontsize":37,"lineheight":110,"letterspacing":1}}',
	],
	'subtitleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Vollkorn","variants":["regular","italic","600","600italic","700","700italic","900","900italic"],"desktop":{"fontweight":"italic","fontsize":20,"lineheight":100,"letterspacing":1},"mobile":{"fontweight":"italic","fontsize":20,"lineheight":100,"letterspacing":1}}',
	],
	'bodyTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"regular","fontsize":12,"lineheight":150,"letterspacing":1},"mobile":{"fontweight":"regular","fontsize":12,"lineheight":150,"letterspacing":1}}',
	],
	'networks'        => [
		'type'    => 'string',
		'default' => '[]',
	],
	'overlay'       => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'color'   => '#000000',
			                          'opacity' => 10,
		                          ] )
	],
	'background'    => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'type'    => 'image',
			                          'image'   => [
				                          'id' => '',
				                          'full' => Plugin::get_cdn_url('temp-05--bg.jpg'),
				                          'thumb' => '',
			                          ],
			                          'gallery' => [],
			                          'video'   => [],
			                          'color'   => '#000000'
		                          ] ),
	]
];
