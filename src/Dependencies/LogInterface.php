<?php

namespace PHPUnitBasic\Dependencies;

interface LogInterface
{
    public function info(string $message): void;

    public function error(string $message): void;
}
