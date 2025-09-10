<?php

namespace shornuk\reactions\services;
use Craft;
use shornuk\reactions\records\Reaction as ReactionRecord;
use shornuk\reactions\models\Reaction as ReactionModel;
use craft\base\Component;

/**
 * Service to manage user reactions on elements.
 */
class ReactionsService extends Component
{
    public function reactTo(int $elementId, int $userId, string $reactionType = 'like') {
        
        $siteId = Craft::$app->getSites()->currentSite->id;
        
        $record = new ReactionRecord;
        $record->userId = $userId;
        $record->siteId = $siteId;
        $record->elementId = $elementId;
        $record->reactionType = $reactionType;
        return $record->save();
    }
}
