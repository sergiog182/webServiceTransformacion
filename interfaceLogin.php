<?php

    class servicesExposed
    {
        /**
         * SW: Indica si un usuario esta aurotizado o no
         * @param <Object> $in
         * @return /stdClass
         */
        public function login($in)
        {
            $model = new business_login();
            return $model->login($in);
        }
    }
