<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('Aswin_Photo_Gallery')){

    class Aswin_Photo_Gallery {

        static protected $instance = null;

        public $classes = [];


        public static function autoload( $class_name ){

            $class_name = str_replace( 'apg','includes', $class_name );
            $class_name = str_replace( '\\','/', $class_name );
            $array = explode( '/', strtolower( $class_name ) );
            $class_file_name = 'class-'. end( $array ).'.php';
            $array[ count( $array ) - 1 ] = strtolower($class_file_name);
            $class_name = implode('/',$array);

            if( file_exists( APG_PATH.$class_name ) ){
                require APG_PATH.$class_name;
            }

        }


        public static function instance(){

            if( is_null( self::$instance ) ){
                self::$instance = new self();
            }

            return self::$instance;

        }


        function __construct(){
            $this->includes();
        }


        function includes(){

            $this->enqueue();
            $this->shortcode();
            $this->action();
            $this->ajax();
            $this->helper();
            $this->post_type();

	        $this->admin();
            $this->metabox();
            $this->admin_column();

        }


        function enqueue(){
            if( empty($this->classes['enqueue'])){
                $this->classes['enqueue'] = new apg\Enqueue();
            }

            return $this->classes['enqueue'];
        }

        function shortcode(){
            if( empty($this->classes['shortcode'])){
                $this->classes['shortcode'] = new apg\Shortcode();
            }

            return $this->classes['shortcode'];
        }

        function helper(){
                if( empty($this->classes['helper'])){
                    $this->classes['helper'] = new apg\Helper();
                }

                return $this->classes['action'];
        }

        function ajax(){
                if( empty($this->classes['ajax'])){
                    $this->classes['ajax'] = new apg\Ajax();
                }

                return $this->classes['action'];
        }

        function post_type(){
                if( empty($this->classes['post_type'])){
                    $this->classes['post_type'] = new apg\Posttype();
                }

                return $this->classes['action'];
        }

        function action(){
                if( empty($this->classes['action'])){
                    $this->classes['action'] = new apg\Action();
                }

                return $this->classes['action'];
        }


        /* Admin */

        function admin(){
            if( empty($this->classes['admin'])){
                $this->classes['admin'] = new apg\admin\Admin();
            }

            return $this->classes['admin'];
        }

        function metabox(){
            if( empty($this->classes['metabox'])){
                $this->classes['metabox'] = new apg\admin\Metabox();
            }

            return $this->classes['metabox'];
        }

        function admin_column(){
            if( empty($this->classes['admin_column'])){
                $this->classes['admin_column'] = new apg\admin\Admincolumn();
            }

            return $this->classes['admin_column'];
        }



        function get_template_part( $template , $args = [] ){


            if( ! empty( $args ) ){

                extract( $args );
            }

            $path = APG_PATH.'templates/'.$template.'.php';

            $path = apply_filters( 'APG_template',$path, $template );

            include $path;

        }




    }

}

spl_autoload_register( array( 'Aswin_Photo_Gallery','autoload' ) );

if( ! function_exists('aswin_photo_gallery')){

    function aswin_photo_gallery(){
        return Aswin_Photo_Gallery::instance();
    }

}

aswin_photo_gallery();