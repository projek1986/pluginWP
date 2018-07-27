<?php

/**
 * Plugin Name: TestPlugin
 * Description: Test Plugin
 * Version: 1.0
 * Author: Rojek
 */
class ctTestPlugin
{

    public function __construct()
    {
        $this->setupConst();
        $this->loadFiles();


        add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));

        add_action('wp_enqueue_scripts', array($this, 'mytheme_enqueue_style'));
    }


    /**
     * loadFiles
     */
    public function loadFiles()
    {

        require_once dirname(__FILE__) . '/ctTestSC.php';


    }

    /**
     * Static register
     */

    public function setupConst()
    {

        if (!defined('CT_TEST_DIR')) {
            define('CT_TEST_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

        }
        if (!defined('CT_TEST_URI')) {

            define('CT_TEST_URI', WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)));

        }
        if (!defined('CT_TEST_ASSETS')) {
            define('CT_TEST_ASSETS', CT_TEST_URI . '/assets');
        }
    }

    /**
     * ADD Scripts
     */

    public function enqueueScripts()
    {

        wp_enqueue_script('ct.sg.admin.js', CT_TEST_ASSETS . '/js/jquery11.js', array(
            'jquery',
        ));

        wp_enqueue_script('ct.sg.admin.js', CT_TEST_ASSETS . '/js/bootstrap.min.js', array(
            'jquery',
        ));

        wp_enqueue_script('pluginscript', CT_TEST_ASSETS . '/js/pluginscript.js', array(
            'jquery',
        ));

        wp_enqueue_script('jqueryui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(
                'jquery',
            )
        );

    }


    function mytheme_enqueue_style()
    {
        wp_enqueue_style('mystyle', CT_TEST_ASSETS . '/css/bootstrap.min.css');
        wp_enqueue_style('pluginstyle', CT_TEST_ASSETS . '/css/pluginstyle.css');
        wp_enqueue_style('pluginstylefontawesome', 'https://use.fontawesome.com/releases/v5.1.1/css/all.css');
        wp_enqueue_style('jquery_ui-style', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    }


}

new ctTestPlugin();

