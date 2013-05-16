<?php

class ActivityPeer extends BaseActivityPeer
{
  public static function getByName($name)
  {
    $criteria = new Criteria();
    $criteria->add(self::NAME, $name);
    return self::doSelectOne($criteria);
  }
}
