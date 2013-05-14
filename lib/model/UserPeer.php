<?php

class UserPeer extends BaseUserPeer
{
  const DELETED  = 0;
  const NORMAL   = 1;

  const INIT_BAL = 0;

  public static function getByName($name)
  {
    $criteria = new Criteria();
    $criteria->add(self::NAME, $name);
    return self::doSelectOne($criteria);
  }

  public static function getByEmail($email)
  {
    $criteria = new Criteria();
    $criteria->add(self::EMAIL, $email);
    return self::doSelectOne($criteria);
  }

  public static function verifyUser($email, $password)
  {
    $criteria = new Criteria();
    $criteria->add(self::EMAIL, $email);
    $criteria->add(self::PASSWORD, md5($password));
    return self::doSelectOne($criteria);
  }
}