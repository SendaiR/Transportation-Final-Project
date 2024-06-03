<?php

require_once '../config/database.php';
require_once '../core/Model.php';

class Vehicle extends Model {
    public $id;
    public $name;
    public $type;
    public $registration_number;
    public $owner;

    public function __construct($id = null, $name = null, $type = null, $registration_number = null, $owner = null) {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->registration_number = $registration_number;
        $this->owner = $owner;
    }

    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM vehicles");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Vehicle');
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM vehicles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('Vehicle');
    }

    public function save() {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO vehicles (name, type, registration_number, owner) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->name, $this->type, $this->registration_number, $this->owner]);
        $this->id = $db->lastInsertId();
    }

    public function update() {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE vehicles SET name = ?, type = ?, registration_number = ?, owner = ? WHERE id = ?");
        $stmt->execute([$this->name, $this->type, $this->registration_number, $this->owner, $this->id]);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM vehicles WHERE id = ?");
        $stmt->execute([$id]);
    }
}
