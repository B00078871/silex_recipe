<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 21/01/2017
 * Time: 15:52
 */

namespace Itb;

use Silex\Application;
use Silex\Provider;



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

        include('Controller/login.php'); // Includes Login Script

        if (isset($_SESSION['login_user'])) {
            header("location: profile.php");
        }

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
        $this['main.controller'] = function () {
            return new MainController($this);
        };
        $this['user.controller'] = function () {
            return new UserController($this);
        };
        $this['admin.controller'] = function () {
            return new AdminController($this);
        };

        //==============================
        // now define the routes
        //==============================

        // -- main --
        $this->get('/', 'main.controller:indexAction');
        $this->get('/list', 'main.controller:listAction');
        $this->get('/display/{id}', 'main.controller:displayAction');
        $this->get('/display', 'main.controller:showNoIdAction');


        // ------ login routes GET and POST ------------
        $this->get('/login', 'user.controller:loginAction');
        $this->post('/login', 'user.controller:processLoginAction');

        // ------ logout route GET ------------
        $this->get('/logout', 'user.controller:logoutAction');

        // ------ SECURE PAGES ----------
        $this->get('/admin', 'admin.controller:indexAction');
        $this->get('/admin/codes', 'admin.controller:codesAction');

    }
}
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Form in PHP with Session</title>
        <link href="../public/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div id="main">
        <h1>PHP Login Session Example</h1>
        <div id="login">
            <h2>Login Form</h2>
            <form action="" method="post">
                <label>UserName :</label>
                <input id="name" name="username" placeholder="username" type="text">
                <label>Password :</label>
                <input id="password" name="password" placeholder="**********" type="password">
                <input name="submit" type="submit" value=" Login ">
            </form>
        </div>
    </div>
    </body>
    </html>
