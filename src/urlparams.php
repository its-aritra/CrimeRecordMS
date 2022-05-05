<?php
         $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         $parameters = parse_url($actual_link);
         parse_str($parameters['query'], $params);
?>