# clevis/utils-enum-constants

Utility to get values of constants of given prefix.

Example usage:

	class Foo
	{
		const PREFIX_FOO = 'foo';
		const PREFIX_BAR = 'bar';
		const SOME_UNRELATED_CONSTANT = 'whatever';
	}

	var_export(Clevis\Utils\EnumConstants::getEnumValues('Foo', 'PREFIX_'));

Prints out:

	array(
		'foo' => 'foo',
		'bar' => 'bar'
	)
