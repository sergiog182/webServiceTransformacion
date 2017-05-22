<?php
	/**
	 * server Clase encargada de exponer la funcionalidad
	 *
	 * @date    21 de Mayo 2017
	 * @author  Sergio Gutierrez
	 */

	ini_set("soap.wsdl_cache_enabled", 0);
	ini_set('memory_limit','256M');
	require_once 'autoload.php';
	require_once 'interfaceLogin.php';

	try {
	    $server = new soapServer('contracts/wsdl/login.wsdl',array('compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP));
	    $server->setClass('servicesExposed');
	    $server->handle();
	} catch (SOAPFault $f) {
	    print $f->faultstrings;
	}