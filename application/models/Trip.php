<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Model {
     // function check_user_login($username)
     // {
     //     return $this->db->query(
     //     	"SELECT * FROM users WHERE username = ?", 
     //     	array($username))->row_array();
     // }
    function get_started_trips($id)
    {
         return $this->db->query(
            "SELECT *
            FROM trips
            WHERE user_startedby_id = $id
            ORDER BY startdate ASC"
            )->result_array();
    }
    function get_joined_trips($userid)
     {
         return $this->db->query(
             "SELECT tripjoins.user_id AS userid, tripjoins.trip_id AS tripid, trips.destination AS destination, trips.description AS description, trips.startdate AS startdate, trips.enddate AS enddate
             FROM tripjoins
             LEFT JOIN trips
                 ON tripjoins.trip_id = trips.id
             WHERE tripjoins.user_id = $userid
             ORDER BY trips.startdate ASC"
             )->result_array();
     }
    function get_one_trip($id)
    {
     {
         return $this->db->query(
            "SELECT trips.id AS tripid, trips.destination AS destination, trips.description AS description, trips.user_startedby_id AS startedbyid, trips.startdate AS startdate, trips.enddate AS enddate, users.id AS userid, users.name AS startedbyname, tripjoins.trip_id AS joinedtrip, tripjoins.user_id AS joinedusers
            FROM trips
            LEFT JOIN tripjoins ON trips.id = tripjoins.trip_id
            LEFT JOIN users
                ON trips.user_startedby_id = users.id
            WHERE trips.id = ?", 
            array($id))->row_array();
     }   
    }
    function get_all_trips()
    {
        $currentuser = $this->session->userdata("user_id");
        $query = "SELECT 
                trips.id AS tripid, 
                trips.destination AS destination, 
                trips.user_startedby_id AS startedbyid, 
                trips.startdate AS startdate, 
                trips.enddate AS enddate, 
                users.id AS userid, 
                users.name AS startedbyname,
                tripjoins.user_id AS joinedusers,
                tripjoins.trip_id AS joinedtrips
            FROM trips
            LEFT JOIN tripjoins ON trips.id = tripjoins.trip_id
            LEFT JOIN users ON trips.user_startedby_id = users.id
            WHERE trips.user_startedby_id <> $currentuser 
            AND trips.id NOT IN (SELECT trip_id FROM tripjoins WHERE user_id = $currentuser)
            ORDER BY trips.startdate ASC
            ";
        return $this->db->query($query)->result_array();
    }
     function add_trip($post)
     {
        $query = "INSERT INTO trips (destination, user_startedby_id, description, startdate, enddate, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
         $values = array($post['destination'],$post['user_startedby_id'],$post['description'], $post['startdate'],$post['enddate'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s')); 
         return $this->db->query($query, $values);
     }
     function join_trip($post)
     {
        $query = "INSERT INTO tripjoins (user_id, trip_id, created_at, updated_at) VALUES (?,?,?,?)";
         $values = array($post['user_id'],$post['trip_id'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s')); 
         return $this->db->query($query, $values);
     }
     function get_all_joins($id)
     {
         return $this->db->query(
             "SELECT tripjoins.user_id AS userid, tripjoins.trip_id AS tripid, users.username AS username
             FROM tripjoins
             LEFT JOIN users
                 ON tripjoins.user_id = users.id
             WHERE tripjoins.trip_id = $id"
             )->result_array();
     }
}

?>