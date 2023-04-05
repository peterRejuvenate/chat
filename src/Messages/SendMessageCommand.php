<?php

namespace Musonza\Chat\Messages;

use Illuminate\Database\Eloquent\Model;
use Musonza\Chat\Models\Conversation;
use Musonza\Chat\Models\Message;

class SendMessageCommand
{
    public $body;
    public $conversation;
    public $type;
    public $data;
    public $participant;
    public $response_to;

    /**
     * @param Conversation $conversation The conversation
     * @param string       $body         The message body
     * @param Model        $sender       The sender identifier
     * @param string       $type         The message type
     * @param string       $type         The message being replied to
     */
    public function __construct(Conversation $conversation, $body, Model $sender, $type = 'text', $data, Message $responseTo)
    {
        $this->conversation = $conversation;
        $this->body = $body;
        $this->type = $type;
        $this->data = $data;
        $this->participant = $this->conversation->participantFromSender($sender);
        $this->response_to = $responseTo;
    }
}
