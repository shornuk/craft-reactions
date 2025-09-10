<?php

namespace shornuk\reactions;

use Craft;
use craft\base\Plugin;
use shornuk\reactions\services\ReactionsService;
use shornuk\reactions\variables\ReactionsVariable;

use craft\web\twig\variables\CraftVariable;
use yii\base\Event;

/**
 * Reactions plugin
 *
 * @method static Reactions getInstance()
 * @property-read ReactionsService $reactions
 * @author Shorn <me@shorn.co.uk>
 * @copyright Shorn
 * @license MIT
 */
class Reactions extends Plugin
{
    public string $schemaVersion = '1.0.0';
    public static Reactions $plugin;

    public static function config(): array
    {
        return [
            'components' => [
                'reactions' => ReactionsService::class,
            ],
        ];
    }

    public function init(): void
    {
        parent::init();
        self::$plugin = $this;

        $this->attachEventHandlers();
        
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            static function (Event $event) {
                $variable = $event->sender;
                $variable->set('reactions', ReactionsVariable::class);
            }
        );

        // Any code that creates an element query or loads Twig should be deferred until
        // after Craft is fully initialized, to avoid conflicts with other plugins/modules
        Craft::$app->onInit(function() {
            // ...
        });
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/5.x/extend/events.html to get started)
    }
}
