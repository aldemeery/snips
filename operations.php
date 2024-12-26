<?php

// Operators
$plus = fn (float $left, float $right): Closure => fn (): float => $left + $right;
$minus = fn (float $left, float $right): Closure => fn (): float => $left - $right;

// Operand
$operand = fn (float $value): Closure => fn (): float => $value;

// Operation
$operation = fn (Closure $left, Closure $operator, Closure $right): Closure => $operator($left(), $right());

$result = $operation(
    $operation($operand(1), $plus, $operand(2)),
    $plus,
    $operation($operand(1), $minus, $operand(5)),
);