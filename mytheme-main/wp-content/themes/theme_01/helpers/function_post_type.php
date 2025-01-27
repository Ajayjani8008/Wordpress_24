<?php
function register_news_post_type()
{
    $labels = array(
        'name'                   => _x('News', 'Post Type  General Name'),
        'singular_name'          => _x('News', 'Post Type Singular Name'),
        'menu_name'              => _('News'),
        'name_admin_bar'         => _('News'),
        'archives'              => __('News Archives'),
        'parent_item_colon'     => __('Parent News'),
        'all_items'             => __('All News'),
        'add_new_item'          => __('Add New News'),
        'edit_item'             => __('Edit News'),
        'update_item'           => __('Update News'),
        'view_item'             => __('View News'),
        'search_items'          => __('Search News'),
        'not_found'             => __('Not found'),
        'not_found_in_trash'    => __('Not found in Trash'),
        'featured_image'        => __('Featured Image'),
        'set_featured_image'    => __('Set featured image'),
        'remove_featured_image' => __('Remove featured image'),
        'use_featured_image'    => __('Use as featured image'),
        'items_list'            => __('News list'),
        'items_list_navigation' => __('News list navigation'),
        'filter_items_list'     => __('Filter News list'),

    );
    $args = array(
        'label'                 => __('News'),
        'description'           => __('News Description'),
        'labels'                => $labels,
        'supports'              => array('title', 'author'),
        'public'                => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-megaphone',
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'news', 'with_front' => false),
    );

    register_post_type('news', $args);
}
add_action('init', 'register_news_post_type', 0);



function custom_search_form($form)
{
    $form = '
    <form role="search" method="get" class="search-form" action="' . home_url('/') . '">
        <label>
            <span class="screen-reader-text">' . _x('Search for:', 'label') . '</span>
            <input type="search" class="search-field" placeholder="' . esc_attr_x('Search …', 'placeholder') . '" value="' . get_search_query() . '" name="s" />
        </label>
        <input type="submit" class="search-submit" value="' . esc_attr_x('Search', 'submit button') . '" />
    </form>';

    return $form;
}
add_filter('get_search_form', 'custom_search_form');

function custom_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Custom Widget Area', 'monsoon-theme'),
        'id'            => 'custom-widget-area',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'custom_widgets_init');


class My_Custom_Widget  extends  WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'my_custom_widget',
            __('Custom widgets', 'monsoon-theme'),
            array('description' => __('A Custom Widget', 'monsoon-theme'))
        );
    }

    public function widget($args, $instance)
    {
        echo  $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo _("hellow word", "monsoon-theme");
        echo $args['after_widget'];
    }
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('New Title', 'monsoon-theme');
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
<?php
    }


    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}


function register_my_custom_widget()
{
    register_widget('My_Custom_Widget');
}
add_action('widgets_init', 'register_my_custom_widget');
