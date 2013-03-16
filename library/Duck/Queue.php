<?php

namespace Duck;

use IronMQ;

/**
 * IronMQ queue
 */
class Queue
{

    /**
     * @var IronMQ
     */
    private $queue;

    /**
     * @var string
     */
    private $queueName;

    /**
     * @var int
     */
    private $timeout;

    public function __construct($token, $projectId, $queueName)
    {
        $this->queue = new IronMQ(
            array(
                'token' => $token,
                'project_id' => $projectId
            )
        );
        $this->queueName = $queueName;
        $this->queue->updateQueue($this->queueName, array());
    }

    /**
     * @param int $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Enqueues Duck
     *
     */
    public function enqueue(Duck $duck)
    {
        $msg = serialize($duck);
        $this->queue->postMessage($this->queueName, $msg, array('timeout' => $this->timeout));
    }

    /**
     * Dequeues message
     *
     * @return Message
     */
    public function dequeue()
    {
        $msg = $this->queue->getMessage($this->queueName, $this->timeout);

        if (!$msg) {
            return false;
        }

        $duck = unserialize($msg->body);
        return array(
            $duck,
            $msg->id
        );
    }

    /**
     * Purges the queue
     */
    public function purge()
    {
        $this->queue->clearQueue($this->queueName);
    }

    /**
     * Acknowledges message
     *
     * @param Message $message
     */
    public function ack($id)
    {
        $this->queue->deleteMessage($this->queueName, $id);
    }
}
