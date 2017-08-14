<?php
/*
 * Copyright (c) 2013-2014 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * This file is part of Stagehand_FSM.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace Stagehand\FSM\Event;

/**
 * @since Class available since Release 2.0.0
 */
class DoEvent implements EventInterface
{
    /**
     * @var callback
     */
    protected $action;

    /**
     * @since Method available since Release 2.1.0
     */
    public function __construct()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getEventId()
    {
        return EventInterface::EVENT_DO;
    }

    /**
     * @param callback $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * {@inheritDoc}
     */
    public function getAction()
    {
        return $this->action;
    }
}
