<?php

namespace Duck;

use Duck\State\State;
use Duck\State\UnprocessedState;
use Duck\State\StateHelper;
use Rhumsaa\Uuid\Uuid;
use Serializable;


class Duck implements Serializable
{
    /**
     * @var State
     */
    private $state;

    public function __construct()
    {
        $this->state = new UnprocessedState();
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function signIn()
    {
        $this->state->signIn($this);
        return $this;
    }

    public function beWashed()
    {
        $this->state->beWashed($this);
        return $this;
    }

    public function beSucked()
    {
        $this->state->beSucked($this);
        return $this;
    }

    public function beSuckled()
    {
        $this->state->beSuckled($this);
        return $this;
    }

    public function goForASwim()
    {
        $this->state->goForASwim($this);
        return $this;
    }

    public function signOut()
    {
        $this->state->signOut($this);
        return $this;
    }

    public function serialize()
    {
        $data = [
            'uuid' => $this->uuid,
            'state' => get_class($this->state)
        ];

        return serialize($data);
    }


    public function unserialize($unserialized)
    {
        $data = unserialize($unserialized);
        $this->uuid = $data['uuid'];
        $this->state = StateHelper::getState($data['state']);
    }

}
