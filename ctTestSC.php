<?php

/**
 * Create shortcode Test
 */
class ctTestSC
{
    protected $active = true;


    public function __construct()
    {

        add_shortcode('test', array($this, 'shortcodeTest'));
    }


    public function shortcodeTest($atts, $content = null)
    {


        extract(shortcode_atts(array(

                'id',

            ), $atts)
        );


        // $id = ['id']
        if (isset($atts['id']) && !empty ($atts['id'])) {
            $id = $atts['id'];
        } else {
            $id = 1;
        }



        if($id == 1){


            $html = '';

        }

        return $html;
    }

}

new ctTestSC();