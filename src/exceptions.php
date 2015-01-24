<?php

namespace Carrooi\Helpers;

class RuntimeException extends \RuntimeException {}

class IOException extends RuntimeException {}

class PathNotFoundException extends IOException {}

class DirectoryNotFoundException extends PathNotFoundException {}

class InvalidStateException extends RuntimeException {}

class InvalidArgumentException extends \InvalidArgumentException {}
