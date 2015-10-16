<?php
/**
 * Created by PhpStorm.
 * User: zhanat
 * Date: 10/15/15
 * Time: 10:48 PM
 */

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\InclusionIn;

class Robots extends Model
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var integer
     */
    protected $year;

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param integer $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    public function validation()
    {
        // Тип робота должен быть: droid, mechanical или virtual
        $this->validate(
            new InclusionIn(
                array(
                    "field"  => "type",
                    "domain" => array(
                        "droid",
                        "mechanical",
                        "virtual",
                        "humanoid",
                    )
                )
            )
        );

        // Имя робота должно быть уникально
        $this->validate(
            new Uniqueness(
                array(
                    "field"   => "name",
                    "message" => "The robot name must be unique"
                )
            )
        );

        // Год не может быть меньше нулевого
        if ($this->year < 0) {
            $this->appendMessage(new Message("The year cannot be less than zero"));
        }

        // Проверяет, были ли получены какие-либо сообщения при валидации
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    public function setAttributes($attributes)
    {
        foreach ($attributes as $k => $v) {
            $this->$k = $v;
        }
    }

}