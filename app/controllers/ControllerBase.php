<?php

use Phalcon\Mvc\Controller;

class RestController extends Controller
{

    public function afterExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher)
    {
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setJsonContent($dispatcher->getReturnedValue());
        $this->response->send();
    }

}
