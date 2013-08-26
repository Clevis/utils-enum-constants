<?php

namespace Clevis\Utils;

require_once __DIR__ . '/../src/EnumConstants.php';

/**
 * @covers Clevis\Utils\EnumConstants
 */
class EnumConstants_Test extends \PHPUnit_Framework_TestCase
{

	public function testConstantValuesAreUsedAsKeysAndValues()
	{
		$foo = EnumConstants::getEnumValues('Clevis\Utils\EnumConstants_Test_Fixture', 'FOO_');
		$bar = EnumConstants::getEnumValues('Clevis\Utils\EnumConstants_Test_Fixture', 'BAR_');

		$this->assertSame(array(
			'something' => 'something',
			'st else' => 'st else',
		), $foo);
		$this->assertSame(array(
			'one' => 'one',
			'two' => 'two',
			'three' => 'three',
		), $bar);
	}

	public function testNonexistentPrefixResultsInEmptyArray()
	{
		$emptyEnum = EnumConstants::getEnumValues('Clevis\Utils\EnumConstants_Test_Fixture', 'HORSESHIT_');
		$this->assertSame(array(), $emptyEnum);
	}

	public function testNonexistentClassRaisesException()
	{
		$this->setExpectedException('ReflectionException', 'Class WeaponsOfMassDestruction does not exist');
		EnumConstants::getEnumValues('WeaponsOfMassDestruction', 'FOO_');
	}

}

class EnumConstants_Test_Fixture
{

	const
		FOO_SOMETHING = 'something',
		FOO_SOMETHING_ELSE = 'st else',
		BAR_1 = 'one',
		BAR_2 = 'two',
		BAR_3 = 'three';
}
