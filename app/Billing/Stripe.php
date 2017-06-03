<?php

    namespace App\Billing;

    class Stripe {
        private $key;

        public function __construct( $key ){

            $this->key = $key;
        }
    }