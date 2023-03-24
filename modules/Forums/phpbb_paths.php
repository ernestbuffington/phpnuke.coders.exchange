<?php
# add 3rd party backward version comapatibility defines
# Inspired by phoenix-cms at website-portals.net
# Absolute Nuke directory
defined('PHPBB_BASE_DIR') or define('PHPBB_BASE_DIR', __DIR__ . '/');
defined('PHPBB_ADMIN_DIR') or define('PHPBB_ADMIN_DIR', PHPBB_BASE_DIR . 'admin/');
defined('PHPBB_INCLUDES_DIR') or define('PHPBB_INCLUDES_DIR', PHPBB_BASE_DIR . 'includes/');
# Absolute Nuke directory + includes

# define the INCLUDE PATH
defined('') or define('PHPBB_INCLUDE_PATH', PHPBB_BASE_DIR);
