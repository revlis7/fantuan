<?php

class GroupPeer extends BaseGroupPeer
{
  public static function getGroupByName($name)
  {
    $criteria = new Criteria();
    $criteria->add(self::NAME, $name);
    return self::doSelectOne($criteria);
  }
}
