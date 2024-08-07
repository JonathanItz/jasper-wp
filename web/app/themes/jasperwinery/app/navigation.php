<?php
/**
 * Custom WordPress navwalker class.
 *
 * @package Your_Theme
 */

/**
 * WP_Bootstrap_Navwalker class.
 */
class DesktopNavWalker extends Walker_Nav_Menu {

    /**
     * Start level.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of menu item. Used for padding.
     * @param array $args An array of arguments.
     */
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "<div class=\"hidden group-hover:block pt-10\"><ul class=\"dropdown-menu rounded bg-white text-gray-800 p-2 shadow-xl\" x-anchor.offset.10=\"\$refs.button\">";
    }

    /**
     * Start element.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args An array of arguments.
     * @param int $id Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $isParent = $args?->walker?->has_children;

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-container group menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $hasXdata = '';
        if($isParent) {
            $hasXdata = 'x-data';
        }

        $output .= $indent . '<li' . $id . $class_names .' '.$hasXdata.'>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        $navTag = 'a';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                if($value !== '#') {
                    $value = 'href' === $attr ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                } else {
                    $navTag = 'div';
                }
            }
        }

        $parentRef = '';
        if($isParent) {
            $parentRef = 'x-ref="button"';
        }

        $item_output = $args->before;
        $item_output .= '<'.$navTag.''. $attributes .' class="inline-flex items-center gap-1 cursor-pointer no-underline" '.$parentRef.'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

        if($isParent) {
            $item_output .= '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>';
        }

        $item_output .= '</'.$navTag.'>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * End element.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Page data object. Not used.
     * @param int $depth Depth of page. Not Used.
     * @param array $args An array of arguments.
     */
    public function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }

    /**
     * End level.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of menu item. Used for padding.
     * @param array $args An array of arguments.
     */
    public function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "</ul></div>";
    }
}
