<?php
abstract class OptionType
{
    const OtherAPI = "otherAPI";
    const Image = "image";
    const Text = "text";
    const Color = "color";
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

    /** Returns the stored content set in the constructor
     * @return string
     */
    public function getContent(){return $this->content;}


    /** Returns a new Option() object that holds the same data as the current one. {@see getDesiredNumberOfChoices}
     * @return Option
     */
    public function duplicate() {return new Option($this->type, $this->content, $this->correct);}

    /** Returns the option type
     * @return string
     */
    public function getType(){return $this->type;}

    /** Sets the Option type in the few cases where it needs changing (if it even does, I dont remember if this is used)
     * @param mixed $type
     */
    public function setType($type){$this->type = $type;}

    /** Returns true if this option was set as the correct one, false otherwise. (this is for an unimplemented feature)
     * @return boolean
     */
    public function isCorrect()
    {
        if (is_null($this->correct)) {return false;}
        else {return $this->correct;}
    }

    public function getNonObjectDataStructure() {
        $resultArray = array(
            "optionType" => $this->getType(),
            "optionContent" => $this->getContent()//,
            //comment out correct because it is unimplemented.
           // "correct" => $this->isCorrect()
        );

        return $resultArray;//json_encode($resultArray);
    }

}
