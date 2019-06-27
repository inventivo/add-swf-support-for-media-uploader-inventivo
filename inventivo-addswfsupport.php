<?php /*
Contributors: inventivogermany
Plugin Name:  Add SWF Support for Media Uploader | inventivo
Plugin URI:   https://www.inventivo.de/wordpress-agentur/wordpress-plugins
Description:  Add SWF Support for Media Uploader
Version:      0.0.3
Author:       Nils Harder
Author URI:   https://www.inventivo.de
Tags: swf, swf media uploader, upload swf
Requires at least: 3.0
Tested up to: 5.2.2
Stable tag: 0.0.3
Text Domain: iventivo-addswfsupport
Domain Path: /languages
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (! defined('ABSPATH')) {
    exit;
}

class InventivoAddSwfSupport
{
    public function __construct()
    {
        add_filter('upload_mimes', array($this, 'inv_allow_swf'));
    }

    public function inv_allow_swf($mimes)
    {
        if (function_exists('current_user_can')) {
            $unfiltered = $user ? user_can($user, 'unfiltered_html') : current_user_can('unfiltered_html');
        }

        if (!empty($unfiltered)) {
            $mimes['swf'] = 'application/x-shockwave-flash';
        }

        return $mimes;
    }
}

if (is_admin()) {
    $inventivoAddSwfSupport = new InventivoAddSwfSupport();
}
