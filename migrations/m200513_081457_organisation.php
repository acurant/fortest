<?php

use yii\db\Migration;

/**
 * Class m200513_081457_organisation
 */
class m200513_081457_organisation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('organisation', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'user_id' => $this->string(),
            'name' => $this->string(),
            'inn' => $this->string(),
            'data' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200513_081457_organisations cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200513_081457_organisation cannot be reverted.\n";

        return false;
    }
    */
}
