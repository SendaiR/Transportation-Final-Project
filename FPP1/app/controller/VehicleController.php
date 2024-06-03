<?php

require_once '../app/Model/Vehicle.php';

class VehicleController extends Controller {
    public function index() {
        $vehicles = Vehicle::getAll();
        $this->view('vehicles/index', ['vehicles' => $vehicles]);
    }

    public function create() {
        $this->view('vehicles/create');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vehicle = new Vehicle(null, $_POST['name'], $_POST['type'], $_POST['registration_number'], $_POST['owner']);
            $vehicle->save();
            header('Location: /vehicles');
        }
    }

    public function edit($id) {
        $vehicle = Vehicle::getById($id);
        $this->view('vehicles/edit', ['vehicle' => $vehicle]);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vehicle = Vehicle::getById($id);
            $vehicle->name = $_POST['name'];
            $vehicle->type = $_POST['type'];
            $vehicle->registration_number = $_POST['registration_number'];
            $vehicle->owner = $_POST['owner'];
            $vehicle->update();
            header('Location: /vehicles');
        }
    }

    public function delete($id) {
        Vehicle::delete($id);
        header('Location: /vehicles');
    }
}
