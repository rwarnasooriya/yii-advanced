<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $itemname
 * @property integer $categoryID
 *
 * @property Category $category
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemname', 'categoryID'], 'required'],
            [['categoryID'], 'integer'],
            [['itemname'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'itemname' => 'Itemname',
            'categoryID' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryID']);
    }
}
