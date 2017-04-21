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
    public function errorAction(Application $app, string $errorMessage)
    {
        // render template for error
        $templateName = 'error/error';

        // store error message in args array
        $argsArray = array(
            'message' => $errorMessage
        );

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
