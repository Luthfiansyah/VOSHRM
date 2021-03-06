<?php

/**
 * CandidateHistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    orangehrm
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CandidateHistory extends PluginCandidateHistory {

    public function getVacancyName() {
	$vacancyName = ($this->getJobCandidateVacancy() == null) ? "" : $this->getJobCandidateVacancy()->getVacancyName();
        return $vacancyName;
    }

    public function getStatus() {
        return ucwords(strtolower($this->getJobCandidateVacancy()->getStatus()));
    }

    public function getActionName() {
        $stateMachine = new WorkflowStateMachine();
        return $stateMachine->getRecruitmentActionName($this->getAction());
    }

    public function getPerformerName() {
        $performerName = ($this->getPerformedBy() == null) ? "Admin" : $this->getEmployee()->getFirstAndLastNames();
        return $performerName;
    }
    public function getLinkLabel() {
        return __('View');
    }

}
