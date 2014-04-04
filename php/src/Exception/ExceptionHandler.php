<?php

namespace Exception;

class ExceptionHandler
{
    private $templateEngine;

    public function __construct($templateEngine){
        $this->templateEngine = $templateEngine;
    }

    public function handle(\Exception $exception){
        if ($exception instanceof HttpException)
            http_response_code($exception->getStatusCode());
        else
            http_response_code(500);

        if (null !== $exception->getPrevious()) {
            $exception = $exception->getPrevious();
        }

        $trace   = $exception->getTrace();
		
        $this->templateEngine->assign('error', $exception);
        $this->templateEngine->assign('trace', $trace);
        $this->templateEngine->display('general/errors.tpl');
    }

    public function handleError($error_level, $error_message, $error_file, $error_line, $error_context){
        $error = new \ErrorException($error_message, $error_level, 1, $error_file, $error_line);

        throw new HttpException(500, $error->getMessage(), $error);
    }
}
