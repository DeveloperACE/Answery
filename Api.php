<?php
class Api {
    public $path;
    public $key;
    public $rawContent;

    /**
     * Api constructor.
     * @param $path
     * @param null $key
     */
    public function __construct($path, $key = null) {
        $this->path = $path;
        $this->key = $key;

        if (is_null($key)) {$this->rawContent = true;}
        else {$this->rawContent = false;}
    }

    /** returns the path that was set in the constructor
     * @return string
     */
    public function getPath(){ return (string)$this->path;}

    /** returns the key that was set in the constructor
     * @return string
     */
    public function getKey(){ return $this->key;}

    /** returns true if the object is set to return a raw value (i.e. an image path), false if it is set to  wrap output in an Option() object
     * @return bool
     */
    public function isRawContent(){return $this->rawContent;}

    /** Returns the value of the
     * @return Option
     */
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

    /** returns the "raw" value of the API call stored in this object (aka the path and key fields) without being wrapped in Option()
     * @return mixed
     */
    public function getUnwrappedValue() {return self::getValueFromAPI($this->path, $this->key);}

    /** Queries the given path and returns the value at the given $valueFinder
     * @param $path
     * @param $valueFinder - can be a key (integer) or a string that is used to locate the value at the given path
     * @return mixed
     */
    public static function getValueFromAPI($path, $valueFinder){
        //valueFinder can be a key or an index
        $apiResult = json_decode(file_get_contents($path), true);

        return $apiResult[$valueFinder];
    }

    /** Takes an array (assumed to contain strings) and wraps each string in an Option() object with the type set to OptionType::Text
     * @param $array
     * @return array
     */
    public static function getTextOptionListFromArray($array) {

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

}