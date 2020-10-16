<?php
/**
 * Spacing Example
 *
 * @since   Unknown
 * @package None
 *
 * @purpose To ensure that errors show when spacing isn't done properly.
 */

/**
 * Invalid spacing in function declaration.
 *
 * This docblock should show an error because there should not be a space in
 * my_func ().
 *
 * @author Aubrey Portwood <aubrey@webdevstudios.com>
 * @since  Unknown
 * @return bool
 */
function my_func () {
	return true;
}

/**
 * Valid spacing in function declaration.
 *
 * This dockblock should NOT show an error because of proper function perens
 * spacing.
 *
 * @author Aubrey Portwood <aubrey@webdevstudios.com>
 * @since  Unknown
 * @return bool
 */
function my_func2() {
	return true;
}
