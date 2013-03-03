<?php

	class DB {

		public static $options;

		public static function mysqli(){

			if (!App::$config->database){
				throw new Exception('Database connection details must be specified to use the database object');
				die();
			}

			self::$options = App::$config->database;

			return new mysqli(
				self::$options->host,
				self::$options->user,
				self::$options->pass,
				self::$options->db
			);

		}

		public static function getAll($query){

			$db = self::mysqli();
			$result = $db->query($query);
			while ($row = $result->fetch_object()){
				$results[] = $row;
			}

			return $results; 

		}

		public static function getRow($query){

			$db = self::mysqli();
			$result = $db->query($query);
			$result = $result->fetch_object();

			if (!$result){
				$result = false;
			}

			return $result; 

		}

	}

?>