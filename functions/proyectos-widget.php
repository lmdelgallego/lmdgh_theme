<?php 

/**
  * 
  * Widget de proyectos
  * 
  * Creamos un widget especifivo para los proyectos mas recientes
  *
  * @author Luis Miguel Del Gallego H.
  * @package LmdghTheme
  * @since 1.0.0
  */

/**
* 
*/
class lmdgh_recent_projects_widget extends WP_Widget
{

    /**
     * Iniciamos el widget
     */
    
    public function __construct()
    {
        # code...
        parent::__construct(
            'lmdgh_recent_projects',
            __('Proyectos recientes','lmdgh'),
            array(
                'description' => __('Muestra tus proyectos recientes en un widget.','lmdgh')
            )
        );
    }


    /**
     * Definimos el html
     */

    public function form($instance){
        # code...
        $defaults = array(
            'title' => __('Proyectos recientes','lmdgh') ,
            'project_to_display' => 4
         );

        $instance = wp_parse_args($instance, $defaults);
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Título', 'lmdgh' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" value="<?php echo esc_attr( $instance['title'] ); ?>" >
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('project_to_display'); ?>"><?php _e( 'Cuantos proyectos mostrar', 'lmdgh' ); ?></label>
            <input type="number" id="<?php echo $this->get_field_id('project_to_display'); ?>" name="<?php echo $this->get_field_name('project_to_display'); ?>" class="widefat" value="<?php echo esc_attr( $instance['project_to_display'] ); ?>" >
        </p>


<?php
    }


    /**
     * GUARDANDO INFO
     */
    public function update($new_instance,$old_instance){
        # code...
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['project_to_display'] = $new_instance['project_to_display'];

        return $instance;
    }


    /**
     * Widget
     */

    public function widget($args,$instance){
        # code...
        $title = apply_filters('widget_title', $instance['title'] );
        $project_to_display = $instance['project_to_display'] ;

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }


        echo $args['after_widget'];
    }

}


/**
* REGISTRAMOS EL WIDGET
*/
function lmdgh_register_recent_projects_widget()
{
    register_widget( 'lmdgh_recent_projects_widget' );
}

add_action( 'widgets_init', 'lmdgh_register_recent_projects_widget' );

?>