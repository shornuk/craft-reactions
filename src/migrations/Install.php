<?php

namespace shornuk\reactions\migrations;

use craft\db\Migration;

/**
 * Install migration.
 */
class Install extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        $this->createTable('{{%shornuk_reactions}}', [
            'id' => $this->primaryKey(),
            'userId'    => $this->integer()->notNull(),
            'siteId'    => $this->integer()->notNull(),
            'elementId' => $this->integer()->notNull(),
            'reactionType' => $this->string(255)->notNull(),
            'dateCreated' => $this->dateTime()->notNull(),
            'dateUpdated' => $this->dateTime()->notNull(),
            'uid' => $this->uid(),
        ]);

        // Add foreign key constraints
        $this->addForeignKey(null, '{{%shornuk_reactions}}', 'userId', '{{%users}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey(null, '{{%shornuk_reactions}}', 'siteId', '{{%sites}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey(null, '{{%shornuk_reactions}}', 'elementId', '{{%elements}}', 'id', 'CASCADE', 'CASCADE');
        

        // Add indexes for better performance
        $this->createIndex(null, '{{%shornuk_reactions}}', 'userId');
        $this->createIndex(null, '{{%shornuk_reactions}}', 'siteId');
        $this->createIndex(null, '{{%shornuk_reactions}}', 'elementId');
        $this->createIndex(null, '{{%shornuk_reactions}}', 'reactionType');
        
        
        // Ensure unique constraint so users can't react multiple times with the same reaction type to the same element
        $this->createIndex(null, '{{%shornuk_reactions}}', ['userId', 'siteId', 'elementId', 'reactionType'], true);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        $this->dropTableIfExists('{{%shornuk_reactions}}');
        return true;
    }
}
