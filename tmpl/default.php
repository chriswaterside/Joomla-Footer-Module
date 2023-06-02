<?php

// no direct access
/**
 * @module	MY Footer
 * @author	Chris Vaughan
 * @website	cevsystems.co.uk
 * @copyright	Copyright (C) 2023 Chris Vaughan <chris@cevsystems.co.uk>. All rights reserved.
 * @license	http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
$footer = new myfooter($params);
$footer->addTheme($params);

class myfooter {

    public function __construct($params) {
        $startyear = $params->get('startyear');
        $copyrighttext = $params->get('copyrighttext');

        $customcssfile = $params->get('custom_css_file');
        $alternativecssfile = $params->get('alternative_css_file');

// add in style sheets
        if ($alternativecssfile !== null) {
            $this->addStyleSheet($alternativecssfile);
        } else {
            $this->addStyleSheet('modules/mod_myfooter/css/stylesheet.css');
            if ($customcssfile !== null) {
                $this->addStyleSheet($customcssfile);
            }
        }
// Copyright symbol
        $copyright_symbol = '&copy;';
// Copyright year
        $current_year = date('Y');
        $footer = '<div class="my footer" >';

        $footer .= 'Copyright ' . $copyright_symbol . ' ' . $startyear . '-' . $current_year . ' ' . $copyrighttext . '<br />';

        $footer .= '</div>';

        echo $footer;
    }

    private function addStyleSheet($path, $type = "text/css") {
        $filemtime = filemtime($path);
        $document = JFactory::getDocument();
        $document->addStyleSheet($path . "?rev=" . $filemtime, array('type' => $type));
    }

    public function addTheme($params) {
        $document = JFactory::getDocument();
        $colour1 = $params->get('color1');
        $colour2 = $params->get('color2');
        $colour3 = $params->get('color3');
        $colour4 = $params->get('color4');
        $colour5 = $params->get('color5');
        $colour6 = $params->get('color6');
        $colour7 = $params->get('color7');
        $text = ":root { "
                . " --colour1: " . $colour1 . ";"
                . " --colour2:" . $colour2 . ";"
                . " --colour3: " . $colour3 . ";"
                . " --colour4: " . $colour4 . ";"
                . " --colour5: " . $colour5 . ";"
                . " --colours: " . $colour6 . ";"
                . " --colour7: " . $colour7 . ";}";
        $document->addStyleDeclaration($text);
    }

}
