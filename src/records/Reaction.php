<?php

namespace shornuk\reactions\records;

use craft\db\ActiveRecord;

/**
 * Reaction record.
 *
 * @property int $id
 * @property string $email
 * @property DateTime|string|null $dateCreated
 */
class Reaction extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%shornuk_reactions}}';
    }
}