<?php

/**
 * Created by Zander Work on 8/25/2017 12:16 PM.
 */
class Question {
	public $question;
	public $type;
	public $source;

	public $options;

	/**
	 * Question constructor.
	 * @param $question
	 * @param $type
	 * @param $source
	 * @param $options
	 */
	public function __construct($question, $type, $source, $options) {
		$this->question = $question;
		$this->type = $type;
		$this->source = $source;
		$this->options = $options;
	}
}