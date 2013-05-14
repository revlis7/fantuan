<?php

class Group extends BaseGroup
{
  public function __toString()
  {
    return $this->getName();
  }
}
