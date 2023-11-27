<?php

class M_Users {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($data) {
        $this->db->query("INSERT INTO users(fname, lname, email, dob, city, country , password) VALUES (:fname, :lname, :email, :dob, :city, :country, :password)");
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()) return true; else return false;
    }

    public function findUserByEmail($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0) return true; else return false;
    }

    public function login($email, $password) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

}