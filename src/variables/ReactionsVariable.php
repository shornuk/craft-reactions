<?php

namespace shornuk\reactions\variables;

use shornuk\reactions\Reactions;

class ReactionsVariable
{
    
    public function reactTo(int $userId, int $elementId, string $reactionType)
    {
        return Reactions::$plugin->reactions->reactTo($userId, $elementId, $reactionType);
    }
}