<?php

namespace LooplineSystems\IssueManager\Library\Github\WebHook;

interface GithubConstants
{

    const PARAM_ACTION = 'action';
    const PARAM_ISSUE = 'issue';
    const PARAM_REPOSITORY = 'repository';
    const PARAM_SENDER = 'sender';
    const PARAM_COMMENT = 'comment';

    const EVENT_ISSUES = 'issues';
    const EVENT_ISSUE_COMMENT = 'issue_comment';

    // @see: https://developer.github.com/v3/activity/events/types/
    const ACTION_OPENED = 'opened';
    const ACTION_REOPENED = 'reopened';
    const ACTION_CLOSED = 'closed';
    const ACTION_ASSIGNED = 'assigned';
    const ACTION_UNASSIGNED = 'unassigned';
    const ACTION_LABELED = 'labeled';
    const ACTION_UNLABELED = 'unlabeled';
    const ACTION_CREATED = 'created';



}
