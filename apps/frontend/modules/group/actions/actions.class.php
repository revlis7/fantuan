<?php

class groupActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $group = GroupPeer::getGroupByName($request->getParameter('name'));
    $this->group   = $group;
    $this->captain = $group->getCaptainProfile();
    $this->members = $group->getMembers();
  }
}