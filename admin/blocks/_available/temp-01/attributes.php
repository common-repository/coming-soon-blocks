<?php

use Pixelthrone\ComingSoon_Blocks\Plugin;

return [
	'titleText'       => [
		'type'    => 'string',
		'default' => 'If you do it right, it will last forever.'
	],
	'subTitleText'    => [
		'type'    => 'string',
		'default' => 'WE ARE WORKING ON OUR WEBSITE'
	],
	'descriptionText' => [
		'type'    => 'string',
		'default' => 'Curabitur blandit tempus porttitor. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Maecenas sed diam eget risus varius blandit sit amet non magna risus, porta ac consectetur ac.'
	],
	'copyrightText'   => [
		'type'    => 'string',
		'default' => '© 2018 — Made with ♥︎ by <a href="#">Pixelthrone</a>"'
	],
	'align'           => [
		'type'    => 'string',
		'default' => 'full'
	],
	'logoID'          => [
		'type' => 'number',
		'default' => '',
	],
	'logoAlign' => [
		'type' => 'string',
		'default' => 'center',
	],
	'logoMaxWidth' => [
		'type' => 'number',
		'default' => 150,
	],
	'logoURL'         => [
		'type'    => 'string',
		'default' => Plugin::get_cdn_url('logo--01.png'),
	],
	'overlayColor'    => [
		'type'    => 'string',
		'default' => '#000000'
	],
	'overlayOpacity'  => [
		'type'    => 'number',
		'default' => 40
	],
	'textColor'       => [
		'type'    => 'string',
		'default' => '#fff'
	],
	'networks'        => [
		'type'    => 'string',
		'default' => '[]',
	],
	'titleTypo'       => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Vollkorn","variants":["regular","italic","600","600italic","700","700italic","900","900italic"],"desktop":{"fontweight":"italic","fontsize":30,"lineheight":130,"letterspacing":0},"mobile":{"fontweight":"italic","fontsize":30,"lineheight":130,"letterspacing":0}}',
	],
	'subtitleTypo'    => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Montserrat","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"desktop":{"fontweight":"600","fontsize":13,"lineheight":150,"letterspacing":0},"mobile":{"fontweight":"600","fontsize":13,"lineheight":150,"letterspacing":0}}',
	],
	'bodyTypo'        => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Montserrat","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"desktop":{"fontweight":"300","fontsize":14,"lineheight":145,"letterspacing":0},"mobile":{"fontweight":"300","fontsize":14,"lineheight":145,"letterspacing":0}}',
	],
	'background'      => [
		'type'    => 'string',
		'default' => json_encode( [
			                          'type'    => 'image',
			                          'image'   => [
				                          'id' => '',
				                          'full' => Plugin::get_cdn_url('temp-01--bg.jpg'),
				                          'thumb' => '',
			                          ],
			                          'gallery' => [],
			                          'video'   => [],
			                          'color'   => '#0D1215'
		                          ] ),
	]
];