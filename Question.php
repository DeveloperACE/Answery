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
    public $numberOfOptions;

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

    public function hasSupplementaryImage() {

	    if (!is_null($this->supplementaryImagePath) && is_string($this->supplementaryImagePath)) {
	        return true;
        } else {
	        return false;
        }

    }

    /**
     * @return null
     */
    public function getSupplementaryImagePath()
    {
        return $this->getFirstImagePathFromAPI($this->supplementaryImagePath);
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
    public function getAnswerType()
    {
        return $this->answerType;
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return int
     */
    public function getNumberOfOptions()
    {
        return $this->numberOfOptions;
    }

    /**
     * @return array
     */
    public function getAllChoices()
    {
        return $this->choices;
    }


    /**
     * @return array
     * REDO MEEEEEE
     */
    public function getDesiredNumberOfChoices()
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

    public static function getImagePathOptionsFromAPIOptions($input) {
        $output = array();
            for ($index = 0; $index < count($input); $index++) {
                if ($input[$index]->getType() == OptionType::API) {
                $output[] = new Option(OptionType::Image, Question::getFirstImagePathFromAPI($input[$index]->getContent()));
            }
        }
        return $output;
    }


    public function getFirstChoice() {
        return $this->getDesiredNumberOfChoices()[0];
    }






    public static function var_dump_pre($mixed = null) {
        echo '<pre>';
        var_dump($mixed);
        echo '</pre>';
        return null;
    }


    public static function getFirstImagePathFromAPI($URL) {
        $APIObject = json_decode(file_get_contents($URL), true);
        foreach($APIObject as $key => $value) {

            if (!in_array(pathinfo($value, PATHINFO_EXTENSION), Array('jpg','png','jpeg'))) {
                return self::getFirstImagePathFromAPI($URL);
            }

            return $value;
        }

    }

}
