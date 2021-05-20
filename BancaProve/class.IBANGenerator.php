<?php
    class IBANgenerator{
        protected $bankCode;
        protected $locale = 'DE';
        protected $accountNr;
        function __construct($bankCode, $accountNr, $locale)
        {
            $this->locale = $locale;
            $this->bankCode = $bankCode;
            $this->accountNr = $accountNr;
        }
        public function generate($bankCode='', $accountNr='',$locale = ''){
            if(empty($locale)){
                $locale = $this->locale;
            }
            if(empty($bankCode)){
                $bankCode = $this->bankCode;
            }
            if(empty($accountNr)){
                $accountNr = $this->accountNr;
            }
            $BBAN = $this->getBBAN($bankCode, $accountNr);
            $checksum = $this->getChecksum($bankCode,$accountNr,$locale);
            $checkcipher = $this->getCheckcipher($checksum);
            return $locale.$checkcipher.$BBAN;  

            }
            
        public function getCheckcipher($checksum=''){
            return str_pad(98-bcmod($checksum,97), 2, "0", STR_PAD_LEFT);
        }
        public function getChecksum($bankCode='',$accountNr='',$locale=''){
            if(empty($locale)) $locale=$this->locale;
            if(empty($bankCode)) $bankCode=$this->bankCode;
            if(empty($accountNr)) $accountNr=$this->accountNr;

            return $this->getBBAN($bankCode,$accountNr).$this->getNumericLanguageCode($locale);
        }
        public function getBBAN($bankCode='', $accountNr=''){
            if(empty($bankCode)) $bankCode = $this->bankCode;
            if(empty($accountNr)) $accountNr = $this->accountNr;
            return $bankCode.str_pad($accountNr,10,"0", STR_PAD_LEFT);
        }
        public function getNumericLanguageCode($locale=''){
            if(empty($locale)) $locale = $this -> locale;
            $alphabet = array(
                1 => 'A', 2 => 'B', 3=>'C', 4=>'D', 5 => 'E', 6 => 'F', 7 =>'G', 8 => 'H',
                9 => 'I', 10 => 'L', 11 => 'M', 12 => 'N', 13 => 'O', 14 => 'p', 15 => 'Q',
                16 => 'R', 17 => 'S', 18 => 'T', 19 => 'U', 20 => 'V', 21 =>'Z');
            $numericLanguageCode ="";
            foreach(str_split($locale) as $char){       
                $numericLanguageCode .=array_search($char, $alphabet) + 9;
            }
            return$numericLanguageCode."00";
        }
}




?>