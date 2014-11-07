<?php

namespace Wordpress\Themes\Tradesman;

class Utility
{

    public static function proper_possessive($word)
    {
        return $word[strlen($word) - 1] == 's' ? $word . "'" : $word . "'s";
    }

    public static function adjust_brightness($hex, $steps)
    {
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max(-255, min(255, $steps));

        // Format the hex color string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
        }

        // Get decimal values
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));

        // Adjust number of steps and keep it inside 0 to 255
        $r = max(0,min(255,$r + $steps));
        $g = max(0,min(255,$g + $steps));
        $b = max(0,min(255,$b + $steps));

        $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
        $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
        $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

        return '#'.$r_hex.$g_hex.$b_hex;
    }

    // Numeric Page Navi (built into the theme by default)
    public function get_page_navi()
    {
        global $wp_query;
        $bignum = 999999999;
        if ($wp_query->max_num_pages <= 1)
            return;
        echo '<nav class="pagination">';
        echo paginate_links(array(
            'base' => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
            'format' => '',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_text' => '&larr;',
            'next_text' => '&rarr;',
            'type' => 'list',
            'end_size' => 3,
            'mid_size' => 3
        ));
        echo '</nav>';
    }
}
