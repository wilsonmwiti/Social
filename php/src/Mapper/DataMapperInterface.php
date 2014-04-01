<?php

namespace Mapper;

interface DataMapperInterface
{
    public function remove($object);

    public function insert($object);

    public function update($object);

    public function persist($object);
}