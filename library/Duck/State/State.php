<?php

namespace Duck\State;

use Duck\Duck;

interface State
{
    public function signIn(Duck $duck);

    public function beWashed(Duck $duck);

    public function beSucked(Duck $duck);

    public function beSuckled(Duck $duck);

    public function goForASwim(Duck $duck);

    public function signOut(Duck $duck);
}
