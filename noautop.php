<?php
/*
Plugin Name: NoAutoP
Plugin URI: http://hinerdesigns.com/noautop
Description: Adds function "the_content_noautop" which doesn't include a paragraph tag automatically with the post content. Use the_content_noautop(); instead of the_content(); in the loop when you don't want an automatic paragraph tag in your blog.
Author: Drew Gourley
Version: 1.0
Author URI: http://www.leopard-inc.com
*/

/*  Copyright 2009  Drew Gourley  (email : dgourley@leopard-inc.com)

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

add_filter('the_content_noautop', 'wptexturize');
add_filter('the_content_noautop', 'convert_smilies');
add_filter('the_content_noautop', 'convert_chars');
add_filter('the_content_noautop', 'prepend_attachment');

/*
Display the post content without autoP.

@since Drew had to make it

@param string $more_link_text Optional. Content for when there is more text.
@param string $stripteaser Optional. Teaser content before the more text.
@param string $more_file Optional. Not used.
*/

function the_content_noautop($more_link_text = null, $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content_noautop', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
}