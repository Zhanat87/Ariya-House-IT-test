<?php
/**
 * Created by PhpStorm.
 * User: zhanat
 * Date: 10/16/15
 * Time: 12:28 PM
 */
class RobotsService
{

    public static function getAll()
    {
        $response = new Response;
        try {
            $response->data = Robots::find()->toArray();
        } catch (Exception $e) {
            $response->setException($e);
        } finally {
            return $response->toArray();
        }
    }

    public static function findByName($name)
    {
        $response = new Response;
        if (!$name) {
            $response->status = $response::STATUS_BAD_REQUEST;
            $response->addError('параметр "name" не может быть пустым');
            return $response->toArray();
        }
        try {
            $response->data = Robots::find([
                'conditions' => 'name LIKE :name:',
                'bind' => ['name' => '%' . $name . '%'],
            ])->toArray();
        } catch (Exception $e) {
            $response->setException($e);
        } finally {
            return $response->toArray();
        }
    }

    public static function findOneById($id)
    {
        $response = new Response;
        try {
            $response->data = Robots::findFirst($id)->toArray();
        } catch (Exception $e) {
            $response->setException($e);
        } finally {
            return $response->toArray();
        }
    }

    public static function delete($id)
    {
        $response = new Response;
        try {
            $response->data = Robots::findFirst($id)->delete();
        } catch (Exception $e) {
            $response->setException($e);
        } finally {
            return $response->toArray();
        }
    }

    public static function update($id, $data)
    {
        $response = new Response;
        try {
            $data = json_decode($data, true);
            /** @var Robots $robot */
            $robot = Robots::findFirst($id);
            $robot->setAttributes($data);
            $response->data = $robot->update();
        } catch (Exception $e) {
            $response->setException($e);
        } finally {
            return $response->toArray();
        }
    }

    public static function create($data)
    {
        $response = new Response;
        try {
            $data = json_decode($data, true);
            /** @var Robots $robot */
            $robot = new Robots;
            $robot->setAttributes($data);
            $response->data = $robot->create();
            $response->status = $response::STATUS_CREATED;
        } catch (Exception $e) {
            $response->setException($e);
        } finally {
            return $response->toArray();
        }
    }

}