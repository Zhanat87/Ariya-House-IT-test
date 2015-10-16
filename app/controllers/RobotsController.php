<?php

/*
 * @todo:
 * authentication by token or base auth
 *
 * все просто:
 *
 * есть rest-сервис, который работает с моделью
 * он всегда возвращает экземпляр объекта Response,
 * может показаться оверинжинирингом, но это для удобства,
 * его еще можно наворотить
 * можно еще базовые вещи вынести в базовый контроллер, например метод afterExecuteRoute и
 * назвать класс RestController
 *
 * в общем если приложение будет расти, то конечно можно наворачивать,
 * добавлять composer.json с namespace'ми и т.д.,
 * но здесь пока так все просто)
 * забыл еще миграцию сделать, но добавил дамп бд)
 */
class RobotsController extends ControllerBase
{

    public function afterExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher)
    {
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setJsonContent($dispatcher->getReturnedValue());
        $this->response->send();
    }

    public function listAction()
    {
        return RobotsService::getAll();
    }

    public function searchAction($name)
    {
        return RobotsService::findByName($name);
    }

    public function findOneByIdAction($id)
    {
        return RobotsService::findOneById($id);
    }

    public function deleteAction($id)
    {
        return RobotsService::delete($id);
    }

    public function updateAction($id)
    {
        return RobotsService::update($id, $this->request->getRawBody());
    }

    public function createAction()
    {
        return RobotsService::create($this->request->getRawBody());
    }

}

