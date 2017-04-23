<?php

namespace Itb\Controller;

use Silex\Application;
/*
 * Error Controller Class
 */
class ErrorController
{
    /**
     * @param Application $app
     * @param string $errorMessage
     * @return mixed twig template
     */
    public function errorAction(Application $app)
    {
        // render template for error
        $templateName = 'error/error';
        $errorMessage = 'Error encountered!';
        // store error message in args array
        $argsArray = array(
            'Error encountered!' => $errorMessage
        );

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
