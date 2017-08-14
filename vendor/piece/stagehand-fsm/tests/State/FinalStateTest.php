<?php
/*
 * Copyright (c) 2013 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * This file is part of Stagehand_FSM.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace Stagehand\FSM\State;

/**
 * @since Class available since Release 2.1.0
 */
class FinalStateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isNotAnEndState()
    {
        $state = new FinalState();
        $result = $state->isEndState();

        $this->assertThat($result, $this->isFalse());
    }
}
