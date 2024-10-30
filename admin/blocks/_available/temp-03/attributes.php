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
			                          'url' => Plugin::get_cdn_url( 'logo--01.png' ),
		                          ] ),
	],
	'logoMaxWidth'  => [
		'type'    => 'number',
		'default' => 150,
	],
	'contentMaxWidth' => [
		'type' => 'number',
		'default' => 690,
	],
	'titleText' => [
		'type'    => 'string',
		'default' => 'Only those who attempt the absurd will achieve the IMPOSSIBLE.'
	],
	'subtitleText' => [
		'type'    => 'string',
		'default' => 'We will be online soon.'
	],
	'copyrightText' => [
		'type'    => 'string',
		'default' => '© 2019 PixelThrone<br>— All rights reserved.'
	],
	'textColor'     => [
		'type'    => 'string',
		'default' => '#fff'
	],
	'titleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"900","fontsize":50,"lineheight":120,"letterspacing":1},"mobile":{"fontweight":"700","fontsize":30,"lineheight":120,"letterspacing":0}}',
	],
	'subtitleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Vollkorn","variants":["regular","italic","600","600italic","700","700italic","900","900italic"],"desktop":{"fontweight":"italic","fontsize":25,"lineheight":170,"letterspacing":0},"mobile":{"fontweight":"italic","fontsize":20,"lineheight":170,"letterspacing":0}}',
	],
	'bodyTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"regular","fontsize":13,"lineheight":150,"letterspacing":0},"mobile":{"fontweight":"regular","fontsize":12,"lineheight":150,"letterspacing":0}}',
	],
	'networks'        => [
		'type'    => 'string',
		'default' => '[]',
	],
	'overlay'       => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'color'   => '#000000',
			                          'opacity' => 30,
		                          ] )
	],
	'background'    => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'type'    => 'image',
			                          'image'   => [
				                          'id' => '',
				                          'full' => Plugin::get_cdn_url('temp-03--bg.jpg'),
				                          'thumb' => '',
			                          ],
			                          'gallery' => [],
			                          'video'   => [],
			                          'color'   => '#0D1215'
		                          ] ),
	]
];
