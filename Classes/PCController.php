<?php
/**
 * PureChat (PC)
 *
 * @file ~./Classes/PCController.php
 * @author The PureChat Team
 * @copyright 2012-2014 PureChat.org <http://www.purechat.org>
 * @license GPL <http://www.gnu.org/licenses/>
 *
 * @version 0.0.1 (Alpha)
 * @file version 0.0.1 (Alpha)
 */
/**
 * This file is part of PureChat.

 * PureChat is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * PureChat is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with PureChat.  If not, see <http://www.gnu.org/licenses/>.
 */

define('PC_VERSION', 'v0.0.1 r1');
define('PC_COPYRIGHT', '&copy; 2012-2014 <a href="http://purechat.org/" target="_blank">PureChat</a>');

class Classes_PCController {

	//-- PureChat Modules
	public $pc_utilities;

	//-- Utility Modules
	public $pc_buffer;

	public $pc_template;

	public function __construct() {

		$this->pc_utilities = new Classes_PCUtilities();

		$this->pc_buffer = $this->pc_utilities->loadModule('PCBuffer');
		$this->pc_buffer->sanitizeUserMethods();

		$this->pc_template = new Themes_Modern_ModernBase();

	}

	public function initialize() {
		$template = $this->pc_template;
		echo '
<DOCTYPE html>
<html>
	<head>
		<title>', $template->titleUrl(), '</title>
		<link rel="stylesheet" type="text/css" href="Assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="Assets/css/global.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- ', $template->theme_settings['safe_name'], ' Start Head -->', $template->head(), '
	</head>
	<body class="theme_', $template->theme_settings['css_id'], '">
		<!-- ', $template->theme_settings['safe_name'], ' Start Prepend -->', $template->prepend(), '
		<div id="header">
			<!-- ', $template->theme_settings['safe_name'], ' Start Header -->', $template->header(), '
		</div>
		<div id="page_', $template->getWrapperId(), '">
			<!-- ', $template->theme_settings['safe_name'], ' Start Content -->', $template->content(), '
		</div>
		<div id="footer">
			<!-- ', $template->theme_settings['safe_name'], ' Start Footer -->', $template->footer(), '
		</div>
		<!-- ', $template->theme_settings['safe_name'], ' Start Append -->', $template->append(), '
	</body>
</html>
';
	}
}