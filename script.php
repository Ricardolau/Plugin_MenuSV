<?php

/**
 * 
 * @license http://www.gnu.org/licenses GNU General Public License version 2 or later; see LICENSE.txt
 * 
 */
// Deny direct access

defined('_JEXEC') or die();

/**
 * Script file of Pmenusv plugin
 */
class plgsystemPmenusvInstallerScript
{

        /**
         * Method to install the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function install($parent)
        {
                //echo '<p>The module has been installed</p>';
        }

        /**
         * Method to uninstall the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function uninstall($parent)
        {
                //echo '<p>The module has been uninstalled</p>';
        }

        /**
         * Method to update the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function update($parent)
        {
                // $parent is the class calling this method
                $version = $parent->get('manifest')->version;
                echo '<p>Version ' . $version . '</p>';

                $this->_deleteDeprecatedFile($version);
        }

        /**
         * Method to run before an install/update/uninstall method
         * $parent is the class calling this method
         * $type is the type of change (install, update or discover_install)
         *
         * @return void
         */
        function preflight($type, $parent)
        {
                //echo '<p>Anything here happens before the installation/update/uninstallation of the module</p>';
        }

        /**
         * Method to run after an install/update/uninstall method
         * $parent is the class calling this method
         * $type is the type of change (install, update or discover_install)
         *
         * @return void
         */
        function postflight($type, $parent)
        {
                //echo '<p>Anything here happens after the installation/update/uninstallation of the module</p>';
        }

        /**
         * Delete all deprecated file
         * @since 2.0.0
         * @return void
         */
        protected function _deleteDeprecatedFile($version)
        {
                $deletelist = array();
                $plugin_path = JPATH_PLUGINS . '/system/pmenusv';
                $admin_lang_path = JPATH_ADMINISTRATOR . '/language';
                $site_lang_path = JPATH_SITE . '/language';


                if (version_compare('1.3.0', $version, '<='))
                {
                        $delete = [
                                $admin_lang_path . '/en-GB/en-GB.plg_system_pmenusv.sys.ini',
                                $admin_lang_path . '/en-GB/en-GB.plg_system_pmenusv.ini',
                                $site_lang_path . '/en-GB/en-GB.plg_system_pmenusv.ini',
                        ];

                        $deletelist = array_merge($deletelist, $delete);
                }

                foreach ($deletelist as $file)
                {
                        if (JFile::exists($file))
                        {
                                if (JFile::delete($file))
                                {
                                        echo $file . ' has been removed!<br />';
                                } else
                                {
                                        echo $file . ' has NOT been removed! Please do it manually.<br />';
                                }
                        } elseif (JFolder::exists($file))
                        {
                                if (JFolder::delete($file))
                                {
                                        echo $file . ' has been removed!<br />';
                                } else
                                {
                                        echo $file . ' has NOT been removed! Please do it manually.<br />';
                                }
                        }
                }
        }

}
