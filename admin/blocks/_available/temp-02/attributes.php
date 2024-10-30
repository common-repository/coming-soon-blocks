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
			                          'url' => Plugin::get_cdn_url( 'logo--02.png' ),
		                          ] ),
	],
	'logoMaxWidth'  => [
		'type'    => 'number',
		'default' => 200,
	],
	'additionalText' => [
		'type'    => 'string',
		'default' => ''
	],
	'copyrightText' => [
		'type'    => 'string',
		'default' => '© 2018<br>All Rights Reserved.'
	],
	'textColor'     => [
		'type'    => 'string',
		'default' => '#fff'
	],
	'bodyTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Montserrat","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"desktop":{"fontweight":"regular","fontsize":12,"lineheight":170,"letterspacing":0},"mobile":{"fontweight":"regular","fontsize":12,"lineheight":170,"letterspacing":0}}',
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
			                          'color'   => '#0D1215'
		                          ] ),
	]
];