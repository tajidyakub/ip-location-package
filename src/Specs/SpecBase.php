<?php

namespace Tjx\IpLoc\Specs;

use ReflectionClass;
use ReflectionProperty;

abstract class SpecBase
{
    public function inArray(): array
    {
        $r = new ReflectionClass($this);
        $d = [];
        $props = $r->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            if ($prop->getValue($this) != null ||
            $prop->getValue($this) != '') {
                $value = $prop->getValue($this);
                if ($value instanceof SpecInterface) {
                    $value = $value->inArray();
                }
                $d[$prop->getName()] = $value;
            }
        }

        return $d;
    }
}
