<?php
abstract class OptionType
{
    const API = "API";
    const Image = "image";
    const ContentsOfLink = "contents";
    const Text = "text";
    // etc.
}

/**
 * Created by Adrian Edwards on 8/25/2017 12:47 PM.
 */
class Option {
	public $type;
	public $content;
    public $correct;

	/**
	 * Question constructor.
	 * @param $type
	 * @param $content
     * @param $correct
	 */
	public function __construct($type, $content, $correct = null) {
		$this->type = $type;
		$this->content = $content;
		$this->correct = $correct;
	}

    /**
     * @return string
     */
    public function getContent()
    {
//        switch ($this->type){
//            case OptionType::API:
//                return Question::getFirstImagePathFromAPI($this->content);
//
//                break;
//
//            case OptionType::ContentsOfLink:
//                return file_get_contents($this->content);
//                break;
//
//            case OptionType::Text:
//                break;
      //  }
        return $this->content;
    }


    public function duplicate() {
        return new Option($this->type, $this->content, $this->correct);
    }





    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

//    /**
//     * @return string
//     */
//    public function processContent()
//    {
//        return $this->type;
//    }

    /**
     * @return boolean
     */
    public function isCorrect()
    {
        if (is_null($this->correct)) {
            return false;
        } else {
            return $this->correct;
        }
    }

}
