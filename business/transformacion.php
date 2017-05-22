<?php
	class business_transformacion
	{
		/*
		* Valida si un usuario es autorizado o no
		* @param $in->user string Usuario que intenta ingresar
		* @param $in->password string password de ingreso
		* return $out
		* $out->status boolean indica si el usuario es autorizado
		*/
		public function getTransformacion($in) {
			$out = new stdClass();
			try {
				if (empty($in->user) || empty($in->password)) {
					$out->status = false;
				} else {
					$out->status = true;
				}
			} catch(Exception $e) {
				$out->status = false;
			}

			return $out;
		}
	}