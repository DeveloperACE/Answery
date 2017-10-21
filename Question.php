<?php

abstract class AnswerType
{
    const ShortAnswer = "shortanswer";
    const MultipleChoice = "multiplechoice";
    const Rating = "rating";
    // etc.
}

/**
 * Created by Zander Work on 8/25/2017 12:16 PM.
 */
class Question {
	public $question;
	public $supplementaryImagePath;
	public $answerType;
    public $choices;
    public $numberOfOptions;//desired number of choices

    /**
     * Question constructor.
     * @param $question
     * @param null $supplementaryImagePath
     * @param string $answerType
     * @param null $choices
     * @param int $numberOfOptions
     */
	public function __construct($question, $supplementaryImagePath = null, $answerType = AnswerType::ShortAnswer, $choices = null, $numberOfOptions = 0) {

		$this->question = $question;
        $this->supplementaryImagePath = $supplementaryImagePath;
		$this->answerType = $answerType;
        $this->choices = $choices;
        $this->numberOfOptions = $numberOfOptions;
    }


//    private function isThereAQuestion() {
//        if (strcmp($this->question, "") !== 0) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    private function validateMultipleChoice() {
//        if ($this->isThereAQuestion() && is_array($this->choices) && $this->numberOfOptions >= 1) {
//            return true;
//        } else {
//            return false;
//        }
//
//    }


//TODO: MOVE ME
    /**
     * @param $string
     * @return bool
     */
    public static function isImagePath($string) {
	    if (!is_string($string)) {return false;}
	    else {
	        return in_array(pathinfo($string, PATHINFO_EXTENSION), Array('jpg','png','jpeg', 'gif'));
	    }

    }

    public function hasSupplementaryImage() {return !is_null($this->supplementaryImagePath);}


    public function getSupplementaryImagePath() {
        $input = $this->supplementaryImagePath;//this can be an Api() object or a string

        //check if it is a valid image path string
        if (self::isImagePath($input)) {
            //return the path
            return $input;

            //if the image is from an API (is an API object and therefore has the isRawContent() method)
        } elseif (gettype($input) == "object") {
            return $input->getRawValue();

        } else {
            echo("Invalid Image Value Encountered");
        }
    }

//    public function validateAnswerType() {
//        switch ($this->answerType) {
//            case AnswerType::ShortAnswer:
//
//               return $this->isThereAQuestion();
//
//                    break;
//
//            case AnswerType::MultipleChoice:
//                if ($this->isThereAQuestion() && !is_null($this->choices) && $this->numberOfOptions >= 1)
//
//                break;
//
//            case AnswerType::Rating:
//                break;
//
//            default:
//                break;
//        }
//    }

    /**
     * @return int
     */
    public function getAnswerType(){return $this->answerType;}

    /**
     * @return string
     */
    public function getQuestion(){return $this->question;}

    /**
     * @return int
     */
    public function getNumberOfOptions(){return $this->numberOfOptions;}

    /**
     * @return array
     */
    //really shouldnt be used...
    public function getAllChoices(){return $this->choices;}


    /**
     * @return array
     * REDO MEEEEEE
     */
    public function getDesiredNumberOfChoices() //checkChoicesMatchDesiredNumberOfOptions
    {
        //$this->debug();
        if (count($this->choices) == 1) {

            while (count($this->choices) < $this->numberOfOptions) {


                $this->choices[] = $this->choices[0]->duplicate();

            }
            //$this->setChoices($options);
            return $this->choices;


        } elseif (count($this->choices) > $this->numberOfOptions) {

            for ($questionNumber=0; $questionNumber <= $this->numberOfOptions-1; $questionNumber++) {

                $choices[] = $this->choices[mt_rand(0, count($this->choices)-1)];
            }
            return $choices;

        } elseif (count($this->choices) == $this->numberOfOptions) {
            return $this->choices;
        }

    }


    //Depreceated
//    public static function getImagePathOptionsFromAPIOptions($APIOptions) {
//        $output = array();
//        for ($index = 0; $index < count($APIOptions); $index++) {
//            if ($APIOptions[$index]->getType() == OptionType::API) {
//                $output[] = new Option(
//                    OptionType::Image,
//                    Api::getValueFromAPI($APIOptions[$index]->getContent(), $APIOptions[$index]->getKey())
//                );
//            }
//        }
//        return $output;
//    }
//    //depreceated?
//    public static function getRawAPIContentOptionsFromLinkOptions($input) {
//        $output = array();
//        for ($index = 0; $index < count($input); $index++) {
//            if ($input[$index]->getType() == OptionType::TextContentsOfLink) {
//                $output[] = new Option(OptionType::Text, (string)file_get_contents($input[$index]->getContent()));
//            }
//        }
//        return $output;
//    }
//
//    //Depreceated?
//    public function getFirstChoice() {
//        return $this->getDesiredNumberOfChoices()[0];
//    }


    /*
    public static function var_dump_pre($mixed = null) {
        echo '<pre>';
        var_dump($mixed);
        echo '</pre>';
        return null;
    }
*/



}
