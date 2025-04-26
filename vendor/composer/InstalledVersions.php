<?php

namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => 'f6c5a043074848136d84e5435ba382958ec60a8e',
    'name' => 'helidalto/laravel6-full-calendar',
  ),
  'versions' => 
  array (
    'carbonphp/carbon-doctrine-types' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3c430083d0b41ceed84ecccf9dac613241d7305d',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '2.0.10',
      'version' => '2.0.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '5817d0659c5b50c9b950feb9af7b9668e2c436bc',
    ),
    'helidalto/laravel6-full-calendar' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => 'f6c5a043074848136d84e5435ba382958ec60a8e',
    ),
    'illuminate/container' => 
    array (
      'pretty_version' => 'v6.20.44',
      'version' => '6.20.44.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a3bf42e3cd9956774d5f8b0b7bbb612ed289e910',
    ),
    'illuminate/contracts' => 
    array (
      'pretty_version' => 'v6.20.44',
      'version' => '6.20.44.0',
      'aliases' => 
      array (
      ),
      'reference' => '2aeb1ea8985f7a79abaf7186234c94b543a04165',
    ),
    'illuminate/database' => 
    array (
      'pretty_version' => 'v6.20.44',
      'version' => '6.20.44.0',
      'aliases' => 
      array (
      ),
      'reference' => '8eb6281d4109cebc993e0d541b671c4cdb5b3f2e',
    ),
    'illuminate/support' => 
    array (
      'pretty_version' => 'v6.20.44',
      'version' => '6.20.44.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c625fd884620c41ea6c5d84ccdb6a39fe555282d',
    ),
    'laravel/helpers' => 
    array (
      'pretty_version' => 'v1.7.2',
      'version' => '1.7.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '672d79d5b5f65dc821e57783fa11f22c4d762d70',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.73.0',
      'version' => '2.73.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9228ce90e1035ff2f0db84b40ec2e023ed802075',
    ),
    'psr/clock' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
    ),
    'psr/clock-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8622567409010282b7aeebe4bb841fe98b58dcaf',
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'v2.5.4',
      'version' => '2.5.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '605389f2a7e5625f273b53960dc46aeaf9c62918',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.31.0',
      'version' => '1.31.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '85181ba99b2345b0ef10ce42ecac37612d9fd341',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.31.0',
      'version' => '1.31.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '60328e362d4c2c802a54fcbf04f9d3fb892b4cf8',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v5.4.45',
      'version' => '5.4.45.0',
      'aliases' => 
      array (
      ),
      'reference' => '98f26acc99341ca4bab345fb14d7b1d7cb825bed',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v2.5.4',
      'version' => '2.5.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '450d4172653f38818657022252f9d81be89ee9a8',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.3',
      ),
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}
