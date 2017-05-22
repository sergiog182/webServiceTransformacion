<?php
    /**
     * Autoload de clases para los servicios
     * @package services
     * @author Luis Castillo <luis.castillo@decameron.com>
     * @date 11 de Enero de 2017
     */

    spl_autoload_register("loadClasses");

    /**
     * Carga de clases del modulo de servicios
     * @param <String> $className
     */
    function loadClasses($className = "")
    {
        $fullpath = classTofile($className);
        if (file_exists($fullpath)) {
            require_once($fullpath);
        }
    }

    /**
     * Convierte el nombre de la clase en un archivo
     * @param <String> $className
     * @return <String> $fileName
     */
    function classTofile($className = "")
    {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        
        return $fileName;
    }
