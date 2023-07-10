<?php

    class Config {
        private $HOST = "127.0.0.1";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DB_NAME = "parking";


        public $conn;

        public function connect() {
            $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

            return $this->conn;
        }



        // Parking Leval



        public function insert_parking($name, $capacity) {
            $this->connect();

            $query = "INSERT INTO parking_levels (name, capacity) VALUES ('$name', $capacity)";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function fetch_parking(){
            $this->connect();

            $query = "SELECT * FROM parking_levels;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_single_parking($id){
            $this->connect();

            $query = "SELECT * FROM parking_levels WHERE id = $id";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

       

        public function update_parking($name, $capacity, $id) {
            $this->connect();

            $fetched_parking_res = $this->fetch_single_parking($id);

            $fetched_record = mysqli_fetch_assoc($fetched_parking_res);

            if($fetched_record){
                $query = "UPDATE parking_levels SET name = '$name', capacity = $capacity WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;
            } else {
                return false;
            }
        }

        public function delete_parking($id){
            $this->connect();

            $fetched_parking_res = $this->fetch_single_parking($id);

            $fetched_record = mysqli_fetch_assoc($fetched_parking_res);

            if($fetched_record){
                $query = "DELETE FROM parking_levels WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;

            } else {
                return false;
            }
           
        }



        // Parking Space



        public function insert_parking_space($levelId, $spaceNumber, $status) {
            $this->connect();

            $query = "INSERT INTO parking_spaces (level_id, space_number, status) VALUES ($levelId, $spaceNumber, '$status')";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_parking_space(){
            $this->connect();

            $query = "SELECT * FROM parking_spaces;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_single_parking_space($id){
            $this->connect();

            $query = "SELECT * FROM parking_spaces WHERE id = $id";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


       

        public function update_parking_space($levelId, $spaceNumber, $status, $id) {
            $this->connect();

            $fetched_parking_space_res = $this->fetch_single_parking_space($id);

            $fetched_record = mysqli_fetch_assoc($fetched_parking_space_res);

            if($fetched_record){

                $query = "UPDATE parking_spaces SET level_id = $levelId, space_number = $spaceNumber, status = '$status' WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;
            } else {
                return false;
            }
        }

        public function delete_parking_space($id){
            $this->connect();

            $fetched_parking_space_res = $this->fetch_single_parking_space($id);

            $fetched_record = mysqli_fetch_assoc($fetched_parking_space_res);

            if($fetched_record){
                $query = "DELETE FROM parking_spaces WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;

            } else {
                return false;
            }
           
        }



        // Parking Tickets



        public function insert_parking_tickets($customerId, $vehicleId, $startTime, $endTime) {
            $this->connect();

            $query = "INSERT INTO parking_tickets (customer_id, vehicle_id, start_time, end_time) VALUES ($customerId, $vehicleId, '$startTime', '$endTime')";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_parking_tickets(){
            $this->connect();

            $query = "SELECT * FROM parking_tickets;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_single_parking_tickets($id){
            $this->connect();

            $query = "SELECT * FROM parking_tickets WHERE id = $id";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

       

        public function update_parking_tickets($id, $customerId, $vehicleId, $startTime, $endTime) {
            $this->connect();

            $fetched_parking_res = $this->fetch_single_parking_tickets($id);

            $fetched_record = mysqli_fetch_assoc($fetched_parking_res);

            if($fetched_record){
                $query ="UPDATE parking_tickets SET customer_id = $customerId, vehicle_id = $vehicleId, start_time = '$startTime', end_time = '$endTime' WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;
            } else {
                return false;
            }
        }

        public function delete_parking_tickets($id){
            $this->connect();

            $fetched_parking_ticket_res = $this->fetch_single_parking_space($id);

            $fetched_record = mysqli_fetch_assoc($fetched_parking_ticket_res);

            if($fetched_record){
                $query = "DELETE FROM parking_tickets WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;

            } else {
                return false;
            }
           
        }


        // Customers


        public function insert_customers($name, $email, $phone) {
            $this->connect();

            $query = "INSERT INTO customers (name, email, phone) VALUES ('$name', '$email', '$phone')";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function fetch_customers(){
            $this->connect();

            $query = "SELECT * FROM customers;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_single_customers($id){
            $this->connect();

            $sql = "SELECT * FROM customers WHERE id = $id";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

       

        public function update_customers($id, $name, $email, $phone){
            $this->connect();

            $sql = "UPDATE customers SET name = '$name', email = '$email', phone = '$phone' WHERE id = $id";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function delete_customers($id){
            $this->connect();

            $fetched_customer_res = $this->fetch_single_customers($id);

            $fetched_record = mysqli_fetch_assoc($fetched_customer_res);

            if($fetched_record){
                $query = "DELETE FROM customers WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;

            } else {
                return false;
            }
           
        }


        // Vehicles


        public function insert_vehicles($customerId, $licensePlate, $model) {
            $this->connect();

            $query = "INSERT INTO vehicles (customer_id, license_plate, model) VALUES ($customerId, '$licensePlate', '$model')";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_vehicles(){
            $this->connect();

            $query = "SELECT * FROM vehicles;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_single_vehicles($id){
            $this->connect();

            $query = "SELECT * FROM vehicles WHERE id = $id";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

       

        public function update_vehicles($id, $customerId, $licensePlate, $model) {
            $this->connect();

            $fetched_vehicle_res = $this->fetch_single_vehicles($id);

            $fetched_record = mysqli_fetch_assoc($fetched_vehicle_res);

            if($fetched_record){
                $query = "UPDATE vehicles SET customer_id = $customerId, license_plate = '$licensePlate', model = '$model' WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;
            } else {
                return false;
            }
        }

        public function delete_vehicles($id){
            $this->connect();

            $fetched_single_vehicles_res = $this->fetch_single_vehicles($id);

            $fetched_record = mysqli_fetch_assoc($fetched_single_vehicles_res);

            if($fetched_record){

                $query = "DELETE FROM vehicles WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;

            } else {
                return false;
            }
           
        }


        // Payment


        public function insert_payment($customerId, $amount, $paymentDate){
            $this->connect();

            $query = "INSERT INTO payments (customer_id, amount, payment_date) VALUES ($customerId, $amount, '$paymentDate')";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_payment(){
            $this->connect();

            $query = "SELECT * FROM payments;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function fetch_single_payment($id){
            $this->connect();

            $query = "SELECT * FROM payments WHERE id = $id";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

       

        public function update_payment($id, $customerId, $amount, $paymentDate) {
            $this->connect();

            $fetched_payment_res = $this->fetch_single_payment($id);

            $fetched_record = mysqli_fetch_assoc($fetched_payment_res);

            if($fetched_record){
                $query = "UPDATE payments SET customer_id = $customerId, amount = $amount, payment_date = '$paymentDate' WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;
            } else {
                return false;
            }
        }

        public function delete_payment($id){
            $this->connect();

            $fetched_payment_res = $this->fetch_single_payment($id);

            $fetched_record = mysqli_fetch_assoc($fetched_payment_res);

            if($fetched_record){

                $query = "DELETE FROM payments WHERE id = $id";

                $res = mysqli_query($this->conn, $query);

                return $res;

            } else {
                return false;
            }
           
        }
        
    }

?>

