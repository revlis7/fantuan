<?php

class teamActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $team = TeamPeer::getTeamByName($request->getParameter('name'));
    $this->team    = $team;
    $this->members = $team->getMembers();
    $this->fund    = $team->getFund();
  }
}