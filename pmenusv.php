<?php

/**
 * @license http://www.gnu.org/licenses GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.plugin.plugin');

class plgSystemPmenusv extends JPlugin
{

        var $plugin = null;
        var $plgParams = null;
        var $time = 0;
        protected $autoloadLanguage = true;

        function onContentPrepareForm($form, $data)
        {
                if ($form->getName() == 'com_menus.item')
                {
                        $xmlFile = dirname(__FILE__) . '/params';
                        JForm::addFormPath($xmlFile);
                        $form->loadFile('params', false);
                }
        }

}
