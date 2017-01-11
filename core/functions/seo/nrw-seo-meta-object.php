<?php
class NrwSeoMetaObject {

    private $type;

    private $name;

    private $id;

    private $meta_id;

    private $label;

    public function __construct() {
    }

    public function getType() { return $this->type; }
    public function setType($type) { $this->type = $type; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }


}