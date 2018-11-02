<?php
	class config{
		static $servidor = 'localhost';
		static $porta = '5432';
		static $banco = 'principal';
		static $usuario = 'postgres';
		static $senha = '160031';
		
		public static function con_str(){
			return "host=". Config::$servidor." dbname=".Config::$banco." user=".config::$usuario." port=".Config::$porta."  password=".Config::$senha;
		}
	}
	
	
?>