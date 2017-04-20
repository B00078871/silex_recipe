<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 21/01/2017
 * Time: 15:52
 */

namespace Itb;

use Silex\Application;
use Silex\Controller;
use Silex\Provider;

use Itb\Controller\MainController;
use Itb\Controller\UserController;
use Itb\Controller\AdminController;

class WebApplication extends Application
{
    // location of Twig templates
    private $myTemplatesPath = __DIR__ . '/../templates';

    public function __construct()
    {
        parent::__construct();

        // setup Session and Service controller provider
        $this->register(new Provider\SessionServiceProvider());
        $this->register(new Provider\ServiceControllerServiceProvider());

        $this['debug'] = true;
        $this->setupTwig();
        $this->addRoutes();
    }

    public function setupTwig()
    {
        // register Twig with Silex
        // ------------
        $this->register(new \Silex\Provider\TwigServiceProvider(),
            [
                'twig.path' => $this->myTemplatesPath
            ]
        );
    }

    public function addRoutes()
    {
        // map routes to controller class/method
        //-------------------------------------------

        //==============================
        // controllers as a service
        //==============================
        $this['main.controller'] = function() {
            return new MainController($this);
        };
        $this['user.controller'] = function() {
            return new UserController($this);
        };
        $this['admin.controller'] = function() {
            return new AdminController($this);
        };

        /**
         * Defining all the routes:
         **/

        // MAIN
        $this->get('/', 'main.controller:indexAction');
        $this->get('/list','main.controller:listAction');
        $this->get('/display/{id}','main.controller:displayAction');

        // LOGIN (GET and POST)
        $this->get('/login', 'user.controller:loginAction');
        $this->post('/login', 'user.controller:processLoginAction');

        // LOGOUT route (GET)
        $this->get('/logout', 'user.controller:logoutAction');

        // SECURE PAGES
        $this->get('/admin',  'admin.controller:indexAction');
        $this->get('/admin/codes',  'admin.controller:codesAction');
    }
}