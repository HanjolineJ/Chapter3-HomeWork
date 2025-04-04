<?php
	class DataHandler { 
		// Properties  
		private $db_conn; 
		
		// Methods
		public function __construct() { 
			//Create the database connection
			$this->db_conn = MySQLi_connect(
   				"localhost", //Server Name
   				"root",      //Username
   				"root",      //Password
   				"healthcareDB" //Database Name
			);  
			//Test the connection
			if (MySQLi_connect_errno()) {
				die("Connection failed: " . MySQLi_connect_error());
			}
		}

		public function sp_get_service_by_id($service_id) {
			$query = "CALL sp_get_service_by_id('".$service_id."')";
			$exec_query = MySQLi_query($this->db_conn, $query);
			$q_results = MySQLi_fetch_array($exec_query);
			return $q_results;
		}

		public function get_students($last_name) {
			$my_arr = array();
			$query = "CALL sp_get_students('".$last_name."')";
			$exec_query = MySQLi_query($this->db_conn, $query);
			$q_results = MySQLi_fetch_array($exec_query);
			return $q_results;

			// Uncomment below if needed
			/*
			while($row = MySQLi_fetch_array($exec_query)) {
				$my_arr[] = $row;
			}
			return $my_arr;
			*/
		}

		public function sp_get_treatment_by_id($treatment_id) {
			$query = "CALL sp_get_treatment_by_id('".$treatment_id."')";
			$exec_query = MySQLi_query($this->db_conn, $query);
			$q_results = MySQLi_fetch_array($exec_query);
			return $q_results;
		}

		public function add_student($first_name, $mi, $last_name, $photo_id){
			$message = "";
			$query = "CALL sp_add_student('".$first_name."', '".$mi."', '".$last_name."', '".$photo_id."')";
			$exec_query = MySQLi_query($this->db_conn, $query);
			if($exec_query == '1'){
				$message = "Success";
			}else{
				$message = "Error";	
			}
			return $message;
		}

		public function sp_get_all_services() {
			$query = "CALL sp_get_all_services()";
			$exec_query = mysqli_query($this->db_conn, $query);
		
			$results = array();
			while ($row = mysqli_fetch_assoc($exec_query)) {
				$results[] = $row;
			}
			return $results;
		}
		
	}
?>
