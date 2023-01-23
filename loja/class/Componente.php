<?php

    class Componente{

        
        public static function carregarNav(){
            include('./component/nav.php');
        }

        public static function carregarSlide(){
            include('./component/slide.php');
        }

        public static function carregarServicos(){
            include('./component/card-servicos.php');
        }

        public static function carregarTrabalhos(){
            include('./component/card-trabalhos.php');
        }

    }

?>
