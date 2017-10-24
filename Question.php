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

    /** checks to see if the extension for the provided path ends in .jpg, .png, .jpeg, or .gif
     * @param $path
     * @return bool
     */
    public static function isImagePath($path) {
	    if (!is_string($path)) {return false;}
	    else {
	        return in_array(pathinfo($path, PATHINFO_EXTENSION), Array('jpg','png','jpeg', 'gif'));
	    }
    }

    /** returns true if the supplementary image path has been set (is not null)
     * @return bool
     */
    public function hasSupplementaryImage() {return !is_null($this->supplementaryImagePath);}


    /** Returns the path to the supplementary image for the question
     * @return string
     */
    public function getSupplementaryImagePath() {
        $input = $this->supplementaryImagePath;//this can be an Api() object or a string

        //check if it is a valid image path string
        if (self::isImagePath($input)) {return $input;}
        //if the image is from an API (is an API object and therefore has the getUnwrappedContent() method)
        elseif (gettype($input) == "object") {return $input->getUnwrappedValue();}
    }

    /** Returns the answer type set during construction
     * @return int
     */
    public function getAnswerType(){return $this->answerType;}

    /** Returns the question text set during construction
     * @return string
     */
    public function getQuestion(){return $this->question;}

    /** Returns the number of options set during construction
     * @return int
     */
    public function getNumberOfOptions(){return $this->numberOfOptions;}

    /** Returns the set of options given during construction (currently only used for unit testing???)
     * @return array
     */
    public function getAllChoices(){return $this->choices;}


    /** Returns an array of options with its length equal to the numberOfOptions provided in the constructor
     * if there are less choices than the number of options, the provided choice is copied as many times as needed
     * if there are more choices than the number of options, random choices are picked and the rest are ignored
     * @return array of unprocessed option objects
     */
    public function getDesiredNumberOfChoices()
    {
        $outputChoices = array();

        if (count($this->choices) == $this->numberOfOptions) {return $this->choices;}
        else if (count($this->choices) != $this->numberOfOptions) {
            while (count($outputChoices) != $this->numberOfOptions) {
                if (count($this->choices) == 1) {
                    $outputChoices[] = $this->choices[0]->duplicate();
                } else {
                    $outputChoices[] = $this->choices[mt_rand(0, count($this->choices)-1)];
                }
            }
            return $outputChoices;
        }

    }
}
