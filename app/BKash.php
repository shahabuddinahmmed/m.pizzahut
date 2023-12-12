<?php

namespace App;

use App\Helpers\HelperClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class BKash extends Model
{
    private $base_URL;
    private $tokenize_app_key;
    private $tokenize_app_secret;
    private $tokenize_username;
    private $tokenize_pass;

    /**
     * BKash constructor.
     * @param string $base_URL
     */
    public function __construct()
    {

        // $this->base_URL = 'https://tokenized.pay.bka.sh/v1.2.0-beta';
        // $this->tokenize_app_key = '2dcp3toh0sirka1unid4oesl4j';
        // $this->tokenize_app_secret = 'euc8kfdpusjhk4nefn53h1pmjeq9ilra3b3msmqjj077trvmh7c';
        // $this->tokenize_username = 'PIZZAHUT';
        // $this->tokenize_pass = 'Tra@9nsC1fLmKt';
        
        $this->base_URL = 'https://tokenized.pay.bka.sh/v1.2.0-beta';
        $this->tokenize_app_key = 'UbIyYgBrvpJ44qHrKenBF9N8tc';
        $this->tokenize_app_secret = '6Og8Wz5ZOhb3Xz0VuawUi2XMn5GdnatbvsqAQ1XKi49tpSfiWTNn';
        $this->tokenize_username = '01704160726';
        $this->tokenize_pass = '6^)hpnCwdA@';

    }


    /**
     * @return string
     */
    public function getBaseURL(): string
    {
        return $this->base_URL;
    }

    /**
     * @return string
     */
    public function getTokenizeAppKey(): string
    {
        return $this->tokenize_app_key;
    }

    /**
     * @return string
     */
    public function getTokenizeAppSecret(): string
    {
        return $this->tokenize_app_secret;
    }

    /**
     * @return string
     */
    public function getTokenizeUsername(): string
    {
        return $this->tokenize_username;
    }

    /**
     * @return string
     */
    public function getTokenizePass(): string
    {
        return $this->tokenize_pass;
    }

    public static function setPartnerServices(){
        parse_str(parse_url(url()->full(), PHP_URL_QUERY),$output);
        if(!Session::has('PartnerServices')){
            if(array_key_exists('ref',$output))
                Session::put('PartnerServices',$output['ref']);
        }
    }

    public static function isPartnerServices(){
        self::setPartnerServices();
        if(Session::get('PartnerServices') === 'bKash'){
            return true;
        }else{
            return false;
        }
    }

}
