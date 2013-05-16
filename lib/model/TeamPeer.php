<?php

class TeamPeer extends BaseTeamPeer
{
  public static function getTeamByName($name)
  {
    $criteria = new Criteria();
    $criteria->add(self::NAME, $name);
    return self::doSelectOne($criteria);
  }
}
