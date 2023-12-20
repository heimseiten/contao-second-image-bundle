<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

$GLOBALS['TL_DCA']['tl_content']['fields']['addImage_2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['addImage_2'],
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true),
    'sql'                     => array('type' => 'boolean', 'default' => false)
];
$GLOBALS['TL_DCA']['tl_content']['fields']['singleSRC_2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['singleSRC_2'],
    'inputType'               => 'fileTree',
    'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'clr'),
    'load_callback' => array
    (
        array('tl_content', 'setSingleSrcFlags')
    ),
    'sql'                     => "binary(16) NULL"
];
$GLOBALS['TL_DCA']['tl_content']['fields']['alt_2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['alt_2'],
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_content']['fields']['imageTitle_2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['imageTitle_2'],
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_content']['fields']['size_2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['size_2'],
    'exclude'                 => true,
	'inputType'               => 'imageSize',
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
	'options_callback' => static function ()
	{
		return Contao\System::getContainer()->get('contao.image.sizes')->getOptionsForUser(Contao\BackendUser::getInstance());
	},
	'sql'                     => "varchar(255) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_content']['fields']['imageUrl_2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['imageUrl_2'],
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>2048, 'dcaPicker'=>true, 'tl_class'=>'w50'),
    'sql'                     => "text NULL"
];
$GLOBALS['TL_DCA']['tl_content']['fields']['fullsize_2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fullsize_2'],
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50'),
    'sql'                     => array('type' => 'boolean', 'default' => false)
];
$GLOBALS['TL_DCA']['tl_content']['fields']['caption_2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['caption_2'],
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>255, 'allowHtml'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'addImage_2';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addImage_2'] = 'singleSRC_2, size_2, fullsize_2, alt_2, imageTitle_2, caption_2';

PaletteManipulator::create()
    ->addLegend('image2_legend', 'image_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('addImage_2', 'image2_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('text', 'tl_content');

PaletteManipulator::create()
    ->addLegend('image2_legend', 'image_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('addImage_2', 'image2_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('image', 'tl_content');
