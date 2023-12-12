<?php

//namespace App\Helpers;



if (! function_exists('m_asset')) {
    function m_asset($url)
    {
//        if($rest = substr($url, 0) != '/'){
//            $url = '/'.$url;
//        }
//        $host = request()->getHost();
//        $root = request()->root();
//        if($host == 'localhost'){
//            $hostname = gethostname();
//            if (strpos($hostname, 'sanaulla') !== FALSE) {
//                return 'http://localhost/php/test.pizzahutbd.com/public'.$url;
//            }else{
//                return 'http://localhost/test.pizzahutbd.com/public'.$url;
//            }
//            return  'http://localhost/php/test.pizzahutbd.com/public'.$url;
//        }else{
//            if(strpos($root,'m.pizzahutbd.com') !== false){
//                return 'https://pizzahutbd.com'.$url;
//            }else{
//                return asset($url);
//            }
//        }
//        return str_replace("m.pizzahutbd.com","pizzahutbd.com",asset($url));
        return str_replace("127.0.0.1:9000","127.0.0.1:8000",asset($url));

    }
}