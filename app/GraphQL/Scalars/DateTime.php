<?php

namespace App\GraphQL\Scalars;

use GraphQL\Type\Definition\ScalarType;
use GraphQL\Language\AST\StringValueNode;

class DateTime extends ScalarType
{
    public function name(): string
    {
        return 'DateTime';
    }

    public function serialize($value)
    {
        return $value instanceof \DateTimeInterface
            ? $value->format(\DateTime::ATOM)
            : null;
    }

    public function parseValue($value)
    {
        return new \DateTime($value);
    }

    public function parseLiteral($valueNode, ?array $variables = null)
    {
        if (!$valueNode instanceof StringValueNode) {
            return null;
        }

        return new \DateTime($valueNode->value);
    }
}
