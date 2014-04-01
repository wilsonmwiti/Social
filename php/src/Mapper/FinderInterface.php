<?php

namespace Mapper;

interface FinderInterface
{
    public function findAll($criterias = null);

    public function findOneById($id);
}
