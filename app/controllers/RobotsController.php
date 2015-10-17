<?php

/*
 * все просто:
 *
 * есть rest-сервис, который работает с моделью
 * он всегда возвращает экземпляр объекта Response,
 * может показаться оверинжинирингом, но это для удобства,
 * его еще можно наворотить
 * так же сделал один сервис и все его методы статическими,
 * т.к. экземпляр этого сервиса нет смысла пока создавать, т.к.
 * каждый его метод самодостаточен и он отвечает
 * принципу единой ответственности (вся работа с rest api для модели Robots)
 *
 * в общем если приложение будет расти, то конечно можно наворачивать,
 * добавлять composer.json с namespace'ми и т.д.,
 * сделать модульность приложения, например создать модуль 'robots',
 * но здесь пока так все просто)
 */
class RobotsController extends RestController
{

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

