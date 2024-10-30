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
		'default' => 690,
	],
	'titleText' => [
		'type'    => 'string',
		'default' => 'Coming Soon'
	],
	'additionalText' => [
		'type'    => 'string',
		'default' => ''
	],
	'subtitleText' => [
		'type'    => 'string',
		'default' => esc_html__( 'IF YOU DO IT RIGHT, IT WILL LAST FOREVER.', 'coming-soon-blocks' )
	],
	'networksText' => [
		'type'    => 'string',
		'default' => esc_html__( 'STAY IN TOUCH', 'coming-soon-blocks' )
	],
	'copyrightText' => [
		'type'    => 'string',
		'default' => '© 2018<br>All rights reserved.'
	],
	'textColor'     => [
		'type'    => 'string',
		'default' => '#fff'
	],
	'titleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"desktop":{"fontweight":"900","fontsize":80,"lineheight":120,"letterspacing":1},"mobile":{"fontweight":"900","fontsize":45,"lineheight":100,"letterspacing":1}}',
	],
	'subtitleTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Montserrat","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"desktop":{"fontweight":"500","fontsize":12,"lineheight":150,"letterspacing":1},"mobile":{"fontweight":"500","fontsize":12,"lineheight":150,"letterspacing":1}}',
	],
	'bodyTypo'      => [
		'type'    => 'string',
		'default' => '{"fontfamily":"Montserrat","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"desktop":{"fontweight":"300","fontsize":12,"lineheight":150,"letterspacing":0},"mobile":{"fontweight":"300","fontsize":12,"lineheight":150,"letterspacing":0}}',
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
				                          'full' => Plugin::get_cdn_url('temp-04--bg.jpg'),
				                          'thumb' => '',
			                          ],
			                          'gallery' => [],
			                          'video'   => [],
			                          'color'   => '#0D1215'
		                          ] ),
	]
];