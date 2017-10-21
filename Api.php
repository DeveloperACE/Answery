<?php



class Api {
    public $path;
    public $key;
    public $rawContent;


    public function __construct($path, $key = null) {
        $this->path = $path;
        $this->key = $key;

        if (is_null($key)) {
            $this->rawContent = true;
        } else {
            $this->rawContent = false;
        }

    }

//TODO: validate path
    /**
     * @return mixed
     */
    public function getPath(){ return $this->path;}

    /**
     * @return mixed
     */
    public function getKey(){ return $this->key;}

    /** can be used to see if API object is for image path ($rawContent = false) or not
     * @return bool
     */
    public function isRawContent(){return $this->rawContent;}

    public function getValueAsOption() {
        if ($this->rawContent) {
            return new Option(
                OptionType::Text,
                file_get_contents($this->path)
            );
        } else  {
            return new Option(
                OptionType::Image,
                self::getValueFromAPI($this->path, $this->key)
            );
        }
    }

    //gets standalone value (aka doesnt wrap it in an Option()). This method is used for getting a supplementary image
    public function getRawValue() {
        return self::getValueFromAPI($this->path, $this->key);
    }


    public static function getValueFromAPI($apiLink, $valueFinder){
        //valueFinder can be a key or an index
        $apiResult = json_decode(file_get_contents($apiLink), true);

        return $apiResult[$valueFinder];
    }


    //assumes that the content at index $valueFinder is an array
    public static function getTextOptionListFromArrayValue($array) {

        $arrayValue = $array;
        $output = array();

        if (!is_array($arrayValue)){
            $arrayValue = json_decode($arrayValue, true);
        }

        foreach ($arrayValue as $thing) {
            $output[] = new Option(OptionType::Text, $thing);
        }
        return $output;
    }



//
//    public static function getFirstImagePathFromAPI($URL) {
//        $APIObject = json_decode(file_get_contents($URL), true);
//        foreach($APIObject as $key => $value) {
//
//            if (!in_array(pathinfo($value, PATHINFO_EXTENSION), Array('jpg','png','jpeg'))) {
//                return self::getFirstImagePathFromAPI($URL);
//            }
//
//            return $value;
//        }
//
//    }

}