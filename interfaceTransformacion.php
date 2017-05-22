<?php

    class servicesExposed
    {
        /**
         * SW: Indica si un usuario esta aurotizado o no
         * @param <Object> $in
         * @return /stdClass
         */
        public function getTransformacion($in)
        {
            $model = new business_transformacion();
            return $model->getTransformacion($in);
        }
    }
