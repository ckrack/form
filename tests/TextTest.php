<?php

use AdamWathan\Form\Elements\Text;

class TextTest extends PHPUnit_Framework_TestCase
{
	public function testTextCanBeCreated()
	{
		$text = new Text('email');
	}

	public function testCanRenderBasicText()
	{
		$text = new Text('email');

		$expected = '<input type="text" name="email">';
		$result = $text->render();
		$this->assertEquals($expected, $result);

		$text = new Text('first_name');

		$expected = '<input type="text" name="first_name">';
		$result = $text->render();
		$this->assertEquals($expected, $result);
	}

	public function testCanRenderWithId()
	{
		$text = new Text('email');
		$text = $text->id('email_field');

		$expected = '<input type="text" name="email" id="email_field">';
		$result = $text->render();
		$this->assertEquals($expected, $result);

		$text = new Text('first_name');
		$text = $text->id('name_field');

		$expected = '<input type="text" name="first_name" id="name_field">';
		$result = $text->render();
		$this->assertEquals($expected, $result);
	}

	public function testCanRenderWithValue()
	{
		$text = new Text('email');
		$text = $text->value('example@example.com');

		$expected = '<input type="text" name="email" value="example@example.com">';
		$result = $text->render();
		$this->assertEquals($expected, $result);

		$text = new Text('first_name');
		$text = $text->value('test@test.com');

		$expected = '<input type="text" name="first_name" value="test@test.com">';
		$result = $text->render();
		$this->assertEquals($expected, $result);
	}

	public function testCanRenderWithClass()
	{
		$text = new Text('email');
		$text = $text->addClass('error');

		$expected = '<input type="text" name="email" class="error">';
		$result = $text->render();
		$this->assertEquals($expected, $result);

		$text = new Text('email');
		$text = $text->addClass('success');

		$expected = '<input type="text" name="email" class="success">';
		$result = $text->render();
		$this->assertEquals($expected, $result);
	}

	public function testCanRenderWithPlaceholder()
	{
		$text = new Text('email');
		$text = $text->placeholder('error');

		$expected = '<input type="text" name="email" placeholder="error">';
		$result = $text->render();
		$this->assertEquals($expected, $result);

		$text = new Text('email');
		$text = $text->placeholder('success');

		$expected = '<input type="text" name="email" placeholder="success">';
		$result = $text->render();
		$this->assertEquals($expected, $result);
	}

	public function testCanBeCastToString()
	{
		$text = new Text('email');

		$expected = $text->render();
		$result = (string)$text;
		$this->assertEquals($expected, $result);
	}

	public function testRequired()
	{
		$text = new Text('email');

		$expected = '<input type="text" name="email" required="required">';
		$result = $text->required()->render();
		$this->assertEquals($expected, $result);
	}

	public function testOptional()
	{
		$text = new Text('email');

		$expected = '<input type="text" name="email">';
		$result = $text->optional()->render();
		$this->assertEquals($expected, $result);

		$text = new Text('email');

		$expected = '<input type="text" name="email">';
		$result = $text->required()->optional()->render();
		$this->assertEquals($expected, $result);
	}

	public function testDisable()
	{
		$text = new Text('email');

		$expected = '<input type="text" name="email" disabled="disabled">';
		$result = $text->disable()->render();
		$this->assertEquals($expected, $result);
	}

	public function testEnable()
	{
		$text = new Text('email');

		$expected = '<input type="text" name="email">';
		$result = $text->enable()->render();
		$this->assertEquals($expected, $result);

		$text = new Text('email');

		$expected = '<input type="text" name="email">';
		$result = $text->disable()->enable()->render();
		$this->assertEquals($expected, $result);
	}
}