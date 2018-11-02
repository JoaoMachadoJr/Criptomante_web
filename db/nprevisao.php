<?php
	include("../utils/config.php");
	
	class nprevisao{
		public $data;
		public $confianca;
		public $label;
		public $valor;
		
		public static function listar($confianca){
			$saida = array();
			//throw new Exception(Config::con_str());
			
			pg_connect(Config::con_str())  or die('Could not connect: ' . pg_last_error());
			$query = "select data, confianca, label, valor from temp.nprevisao where confianca=".$confianca." order by data;";
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		    	$prev = new nprevisao();
				$prev->data = $line['data'];
				$prev->confianca = $line['confianca'];
				$prev->label = $line['label'];
				$prev->valor = $line['valor'];
				array_push($saida,$prev);
			}
			return $saida;
		}
		
		public static function datas($lista){
			$saida = "";
			for ($i = 1; $i < count($lista); $i++) {
			    $saida = $saida . $lista[$i]->data;
				if ($i<>count($lista)-1){
					$saida = $saida.",";
				}
			}
			return $saida;
		}
		
		public static function valores($lista){
			$saida = "";
			for ($i = 1; $i < count($lista); $i++) {
			    $saida = $saida . $lista[$i]->valor;
				if ($i<>count($lista)-1){
					$saida = $saida.",";
				}
			}
			return $saida;
		}
				
		public static function labels($lista){
			$saida = "";
			for ($i = 1; $i < count($lista); $i++) {
			    $saida = $saida . "'".$lista[$i]->label."'";
				if ($i<>count($lista)-1){
					$saida = $saida.",";
				}
			}
			return $saida;
		}
		
		public static function limite_inferior($lista){
			$saida = 99999999999;
			$divisor = 1;
			
			for ($i = 1; $i < count($lista); $i++) {
			    if ($lista[$i]->valor < $saida){
			    	$saida = $lista[$i]->valor;
			    }
			}
			$saida = $saida*0.9;
			while (intdiv($saida,100)>=10){
				$divisor = $divisor*10;
				$saida = intdiv($saida,10);
			};
			return $saida * $divisor;
		}
	}
	
	
?>