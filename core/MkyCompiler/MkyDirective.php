<?php

namespace Core\MkyCompiler;

use Core\Interfaces\MkyDirectiveInterface;
use Core\MkyCompiler\MkyDirectives\BaseDirective;
use Core\MkyCompiler\MkyDirectives\ScriptDirective;
use Core\MkyCompiler\MkyDirectives\StyleDirective;

class MkyDirective
{
    /**
     * @var MkyDirectiveInterface[]
     */
    private static array $directives = [];

    public function __construct()
    {
        self::$directives[] = new BaseDirective();
        self::$directives[] = new StyleDirective();
        self::$directives[] = new ScriptDirective();
    }

    public static function addDirective(MkyDirectiveInterface $directive)
    {
        self::$directives[] = $directive;
    }

    /**
     * @return MkyDirectiveInterface[]
     */
    public static function getDirectives(): array
    {
        return self::$directives;
    }

    public function callFunction(string $function, $expression = null, bool $open = true)
    {
        foreach (self::$directives as $directive) {
            if(array_key_exists($function, $directive->getFunctions())){
                $methodDirective = $directive->getFunctions()[$function][(int)!$open];
                $expression = (array)$expression;
                $ref = new \ReflectionClass($methodDirective[0]);
                $parameters = [];
                foreach ($ref->getMethod($methodDirective[1])->getParameters() as $reflectionParameter) {
                    if(isset($expression[$reflectionParameter->getName()])){
                        $parameters[$reflectionParameter->name] = $expression[$reflectionParameter->getName()];
                    } else if($reflectionParameter->isDefaultValueAvailable()){
                        $parameters[$reflectionParameter->name] = $reflectionParameter->getDefaultValue();
                    } else {
                        $parameters[$reflectionParameter->name] = null;
                    }
                }
                return $refMethod = $ref->getMethod($methodDirective[1])->invokeArgs($ref->newInstance(), $parameters);
            }
        }
        return $expression;
    }
}