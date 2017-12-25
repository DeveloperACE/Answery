<?php
/**
 * Created by PhpStorm.
 * User: ace
 * Date: 9/17/17
 * Time: 12:52 PM
 */

use PHPUnit\Framework\TestCase;

require_once("./Question.php");
require_once("./Option.php");
require_once("./OtherApi.php");



class Tests extends TestCase
{

    public function testBasicQuestionConstruct()
    {
        $questionText = "Is this a test?";
        $suppImgPath = "example.png";
        $answerType = AnswerType::MultipleChoice;
        $choices = array(new Option(OptionType::Text, "test"));
        $numberOfOptions = 1;

        $question = new Question($questionText, $suppImgPath, $answerType, $choices, $numberOfOptions);

        $this->assertEquals($questionText, $question->getQuestion());
        $this->assertEquals($suppImgPath, $question->getSupplementaryImagePath());
        $this->assertTrue($question->hasSupplementaryImage());
        $this->assertEquals($answerType, $question->getAnswerType());
        $this->assertEquals($choices, $question->getAllChoices());
        $this->assertEquals($numberOfOptions, $question->getNumberOfOptions());
        $this->assertEquals($numberOfOptions, count($question->getDesiredNumberOfChoices()));

    }

    public function testQuestionDuplication()
    {
        $questionText = "Is this a test?";
        $suppImgPath = "example.png";
        $answerType = AnswerType::MultipleChoice;
        $choices = array(new Option(OptionType::Text, "test"));
        $expectedChoices = array(
            new Option(OptionType::Text, "test"),
            new Option(OptionType::Text, "test"),
            new Option(OptionType::Text, "test"),
            new Option(OptionType::Text, "test")
        );
        $numberOfOptions = 4;

        $question = new Question($questionText, $suppImgPath, $answerType, $choices, $numberOfOptions);

        $this->assertEquals($questionText, $question->getQuestion());
        $this->assertEquals($suppImgPath, $question->getSupplementaryImagePath());
        $this->assertTrue($question->hasSupplementaryImage());
        $this->assertEquals($answerType, $question->getAnswerType());
        $this->assertEquals($expectedChoices, $question->getDesiredNumberOfChoices());
        $this->assertEquals($numberOfOptions, $question->getNumberOfOptions());
        $this->assertEquals($numberOfOptions, count($question->getDesiredNumberOfChoices()));
    }

    public function testImagePathLogic() {
        $jpg = "example.jpg";
        $jpeg = "example.jpeg";
        $png = "example.png";
        $gif = "example.gif";
        $mp4 = "example.mp4";
        $mov = "example.mov";

        $this->assertTrue(Question::isImagePath($jpg));
        $this->assertTrue(Question::isImagePath($jpeg));
        $this->assertTrue(Question::isImagePath($png));
        $this->assertTrue(Question::isImagePath($gif));
        $this->assertFalse(Question::isImagePath($mp4));
        $this->assertFalse(Question::isImagePath($mov));


    }


    public function testBasicOptionConstruct()
    {
        $optionType = OptionType::Text;
        $content = "This is a Test Option";

        $option = new Option($optionType, $content);

        $this->assertEquals($optionType, $option->getType());
        $this->assertEquals($content, $option->getContent());

       // $this->assertFalse($option->isCorrect());//not yet implemented feature
    }

    public function testBasicApiConstruct()
    {
        $path = "http://random.cat/meow";
        $key = "file";

        $api = new OtherApi($path, $key);

        $this->assertEquals($path, $api->getPath());
        $this->assertEquals($key, $api->getKey());
        $this->assertFalse($api->isRawContent());

        $api = new OtherApi($path);//let $key default to none

        $this->assertTrue($api->isRawContent());
    }

    public function testReturningOptionFromAPIValues() {
        $path = "http://random.cat/meow";
        $key = "file";

        $api = new OtherApi($path, $key);//raw content = false


        //checkin these three because it returns results as an Option().
        $this->assertObjectHasAttribute('type', $api->getValueAsOption());
        $this->assertObjectHasAttribute('content', $api->getValueAsOption());
        $this->assertObjectHasAttribute('correct', $api->getValueAsOption());

    }

    public function testGettingValues() {
        $path = "http://random.cat/meow";
        $key = "file";

        $manual = json_decode(file_get_contents($path), true)[$key];

        $this->assertTrue(Question::isImagePath($manual));
        $this->assertTrue(Question::isImagePath(OtherApi::getValueFromAPI($path, $key)));


    }

    public function testGetTextOptionListFromArrayValue() {

        $arrayInput = array("test", "test1", "test2");
        $input = ["test", "test1", "test2"];

        $expected = array(
            new Option(OptionType::Text, "test"),
            new Option(OptionType::Text, "test1"),
            new Option(OptionType::Text, "test2")
        );


        $this->assertEquals($expected, OtherApi::getTextOptionListFromArray($arrayInput));
        $this->assertEquals($expected, OtherApi::getTextOptionListFromArray($input));


    }
}
