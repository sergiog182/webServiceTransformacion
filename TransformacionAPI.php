<?php
	class TransformacionAPI {    
	    public function getTransformacion(){
	        header('Content-Type: application/JSON');                
	        $method = $_SERVER['REQUEST_METHOD'];
	        $respuesta = array();
	        if ($_GET['metodo'] != "" && $_GET['servicio'] != "" && $_GET['factura'] != "") {
	        	$metodo = $_GET['metodo'];
	        	$servicio = $_GET['servicio'];
	        	$factura = $_GET['factura'];
	        	$valor = $_GET['valor'];
	        	$respuesta = $this->transformacion($medoto, $servicio, $factura);
	        } else {
	        	$respuesta["error"] = "No se encontro transformacion";
	        }
	        echo json_encode($respuesta);
	    }    

	    public function transformacion($metodo, $servicio, $factura, $valor = 0)
	    {
	    	$retorno = array();
	    	switch ($servicio) {
	    		case 'luz':
	    			$retorno['url'] = "/servicios/pagos/v1/payments/" . $factura;
	    			switch ($metodo) {
	    				case 'consultar':
	    					$retorno["method"] = "GET";
	    					$retorno["error"] = "";
	    					break;
	    				case 'pagar':
	    					$retorno["method"] = "POST";
	    					$retorno["error"] = "";
	    					break;
    					case 'compensar':
    						$retorno["method"] = "DELETE";
	    					$retorno["error"] = "";
	    					break;
	    				default:
	    					$retorno['url'] = "";
	    					$retorno["method"] = "";
	    					$retorno["error"] = "No se encontro transformacion";
	    					break;
	    			}
	    			$retorno["payload"] = "";
	    			break;
	    		case 'agua':
	    			$retorno["url"] = "";
	    			switch ($metodo) {
	    				case 'consultar':
	    					$retorno["payload"] = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sch="http://www.servicios.co/pagos/schemas">
													   	<soapenv:Header/>
													   	<soapenv:Body>
													      	<sch:ReferenciaFactura>
													         	<sch:referenciaFactura>' . $factura . '</sch:referenciaFactura>
													      	</sch:ReferenciaFactura>
													   	</soapenv:Body>
													</soapenv:Envelope>';
							$retorno["error"] = "";
	    					break;
	    				case 'pagar':
	    					$retorno["payload"] = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sch="http://www.servicios.co/pagos/schemas">
													   	<soapenv:Header/>
													   	<soapenv:Body>
													      	<sch:Pago>
													         	<sch:referenciaFactura>
													            	<sch:referenciaFactura>' . $factura . '</sch:referenciaFactura>
													         	</sch:referenciaFactura>
													         	<sch:totalPagar>' . $valor . '</sch:totalPagar>
													      	</sch:Pago>
													   	</soapenv:Body>
													</soapenv:Envelope>';
							$retorno["error"] = "";
	    					break;
    					case 'compensar':
	    					$retorno["payload"] = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sch="http://www.servicios.co/pagos/schemas">
													   	<soapenv:Header/>
													   	<soapenv:Body>
													      	<sch:Pago>
													         	<sch:referenciaFactura>
													            	<sch:referenciaFactura>' . $factura . '</sch:referenciaFactura>
													         	</sch:referenciaFactura>
													         	<sch:totalPagar>' . $valor . '</sch:totalPagar>
													      	</sch:Pago>
													   	</soapenv:Body>
													</soapenv:Envelope>';
							$retorno["error"] = "";
	    					break;
	    				default:
	    					$retorno["payload"] = "";
	    					$retorno["error"] = "No se encontro transformacion";
	    					break;
	    			}
	    			$retorno["method"] = "";
	    			break;
	    		default:
	    			$retorno["method"] = "";
	    			$retorno["payload"] = "";
	    			$retorno["url"] = "";
	    			$retorno["error"] = "No se encontro transformacion";
	    			break;
	    	}
	    	return $retorno;
	    }
	}