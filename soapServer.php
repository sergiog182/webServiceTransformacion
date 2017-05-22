<?php

    class soapServer extends SoapServer
    {

        const URI = 'urn:pc_SOAP_return_time';
        const ENCODING = 'ISO-8859-1';

        /**
         * Constructor de la clase
         * @param type $wsdl
         * @param type $options
         * @return type
         */
        public function __construct($wsdl, $options = array())
        {
            if (is_array($options)) {
                if (!array_key_exists('uri', $options)) {
                    $options['uri'] = self::URI;
                }

                if (!array_key_exists('encoding', $options)) {
                    $options['encoding'] = self::ENCODING;
                }
            }
            return parent::__construct($wsdl, $options);
        }

        /**
         * Metodo extendido de la clase SoapServer
         * Permite desencriptar el request si viene encriptado 
         * Permite encriptar el response si el request venia encriptado
         * @return type
         */
        public function handle()
        {
            $wsdl = file_get_contents('php://input');
            return parent::handle($wsdl);
        }
        
    }
