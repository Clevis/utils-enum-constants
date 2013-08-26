<?php

namespace Clevis\Utils;

/**
 * Class for work with prefixed class constants.
 */
class EnumConstants
{

	/**
	 * Get values of all constants with given prefix, use these values also as keys.
	 *
	 * @see EnumConstants_Test
	 * @param string|object $className
	 * @param string $prefix
	 * @return array
	 */
	public static function getEnumValues($className, $prefix)
	{
		$classReflection = new \ReflectionClass($className);
		$enumValues = array();
		$prefixLength = strlen($prefix);
		foreach ($classReflection->getConstants() as $constantName => $constantValue)
		{
			if (substr($constantName, 0, $prefixLength) === $prefix)
			{
				$enumValues[$constantValue] = $constantValue;
			}
		}
		return $enumValues;
	}

}
