<?php



final class ClassEmployeeList
{


    private $version;

    public function __construct()
    {

        add_action('init', [$this, 'ex_employee_default_init']);
        add_action( 'add_meta_boxes', [$this, 'add_meta_box_for_employee_info' ]);
        add_action('admin_enqueue_scripts', [$this, 'add_style_and_script_file_for_employee_metabox']);

        if( ! function_exists('get_plugin_data') ){
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        $plugin_data = get_plugin_data( PLUGIN_FILE );
        $this->version = $plugin_data['Version'];
        
    }


    public function ex_employee_default_init(){

        // Post type: Employees
        $labels = array(
            'name' => _x('Employees', 'Post Type General Name', 'ex-employee-list'),
            'singular_name' => _x('Employees', 'Post Type Singular Name', 'ex-employee-list'),
            'menu_name' => _x('Employees', 'Admin Menu text', 'ex-employee-list'),
            'name_admin_bar' => _x('Employees', 'Add New on Toolbar', 'ex-employee-list'),
            'archives' => __('Employees', 'ex-employee-list'),
            'attributes' => __('Employees', 'ex-employee-list'),
            'parent_item_colon' => __('Employees', 'ex-employee-list'),
            'all_items' => __('All Employees', 'ex-employee-list'),
            'add_new_item' => __('Add New Employees', 'ex-employee-list'),
            'add_new' => __('Add New', 'ex-employee-list'),
            'new_item' => __('New Employees', 'ex-employee-list'),
            'edit_item' => __('Edit Employees', 'ex-employee-list'),
            'update_item' => __('Update Employees', 'ex-employee-list'),
            'view_item' => __('View Employees', 'ex-employee-list'),
            'view_items' => __('View Employees', 'ex-employee-list'),
            'search_items' => __('Search Employees', 'ex-employee-list'),
            'not_found' => __('Not found', 'ex-employee-list'),
            'not_found_in_trash' => __('Not found in Trash', 'ex-employee-list'),
            'featured_image' => __('Featured Image', 'ex-employee-list'),
            'set_featured_image' => __('Set featured image', 'ex-employee-list'),
            'remove_featured_image' => __('Remove featured image', 'ex-employee-list'),
            'use_featured_image' => __('Use as featured image', 'ex-employee-list'),
            'insert_into_item' => __('Insert into Employees', 'ex-employee-list'),
            'uploaded_to_this_item' => __('Uploaded to this Employees', 'ex-employee-list'),
            'items_list' => __('Employees list', 'ex-employee-list'),
            'items_list_navigation' => __('Employees list navigation', 'ex-employee-list'),
            'filter_items_list' => __('Filter Employees list', 'ex-employee-list'),
        );

        $args = array(
            'label' => __('Employees', 'ex-employee-list'),
            'description' => __('Usefull employee plugin', 'ex-employee-list'),
            'labels' => $labels,
            'menu_icon' => 'dashicons-universal-access-alt',
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category', 'post_tag'),
            'hierarchical' => false,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'has_archive' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'can_export' => true,
            'show_in_nav_menus' => true,
            'menu_position' => 5,
            'capability_type' => 'post',
            'show_in_rest' => true,
            'rewrite' => true,
        );
        register_post_type('ex_employee', $args);


        $labels = array(
            'name'                       => _x('Types', 'taxonomy general name', 'ex-employee-list'),
            'singular_name'              => _x('Type', 'taxonomy singular name', 'ex-employee-list'),
            'search_items'               => __('Search Types', 'ex-employee-list'),
            'popular_items'              => __('Popular Types', 'ex-employee-list'),
            'all_items'                  => __('All Types', 'ex-employee-list'),
            'edit_item'                  => __('Edit Type', 'ex-employee-list'),
            'update_item'                => __('Update Type', 'ex-employee-list'),
            'add_new_item'               => __('Add New Type', 'ex-employee-list'),
            'new_item_name'              => __('New Type Name', 'ex-employee-list'),
            'separate_items_with_commas' => __('Separate Types with commas', 'ex-employee-list'),
            'add_or_remove_items'        => __('Add or remove Types', 'ex-employee-list'),
            'choose_from_most_used'      => __('Choose from the most used Types', 'ex-employee-list'),
            'not_found'                  => __('No Types found.', 'ex-employee-list'),
            'menu_name'                  => __('Type', 'ex-employee-list'),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
            'rewrite'               => array('slug' => 'custom-taxonomy'),
        );

        // Register the Type
        register_taxonomy('ex_employee_type', array('ex_employee'), $args);

    }


    public function add_meta_box_for_employee_info(){
        add_meta_box( 'ex_employee_info', __( "Employee Info", 'ex-employee-list' ), [$this, 'employee_metabox_admin_html_output'], 'ex_employee', 'advanced', 'high' );
    }

    public function employee_metabox_admin_html_output(){?>

        
<div class="container" id="employee_meta_box_fields">
    <div class="row">
        <div class="col-md-6">
            <div class="vertical-tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Section 1</a></li>
                    <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Section 2</a></li>
                    <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Section 3</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        <h3>Section 1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius, mi eros viverra massa.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <h3>Section 2</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius, mi eros viverra massa.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section3">
                        <h3>Section 3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius, mi eros viverra massa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <?php }


    public function add_style_and_script_file_for_employee_metabox(){
        wp_enqueue_script( 'ex_employee_bootstra_file', PLUGIN_URL."assets/js/bootstrap.min.js", ['jquery'],  $this->version , true );
        wp_enqueue_style( 'ex_employee_style_file', PLUGIN_URL.'assets/css/style.css', [], $this->version, 'all' );
    }


}
