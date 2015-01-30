<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook;

interface TrelloConstants 
{
    const HEADER_X_TRELLO_WEBHOOK = 'X-Trello-Webhook';

    const PARAM_MODEL  = 'model';
    const PARAM_ACTION = 'action';
    const PARAM_DATA   = 'data';
    const PARAM_TYPE   = 'type';

    const DTO_CHECK_ITEM = 'checkItem';
    const DTO_CHECKLIST  = 'checklist';
    const DTO_LIST       = 'list';
    const DTO_BOARD      = 'board';
    const DTO_CARD       = 'card';
    const DTO_TEXT       = 'text';
    const DTO_OLD        = 'old';
    const DTO_ACTION     = 'action';

}
