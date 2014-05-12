<?php
/**
 * This is the model class for table "solution".
 *
 * The followings are the available columns in table 'solution':
 * @property integer $id
 * @property string $titleam
 * @property string $titleen
 * @property string $whatam
 * @property string $whyam
 * @property string $howam
 * @property string $whaten
 * @property string $whyen
 * @property string $howen
 * @property string $gallery
 */
class Solution extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Solution the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solution';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titleam, views, folder', 'required'),
			array('titleam, titleen, folder', 'length', 'max'=>250),
			array('gallery', 'length', 'max'=>750),
			array('whatam, whyam, howam, whaten, whyen, howen, video', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titleam, titleen, whatam, whyam, howam, whaten, whyen, howen, gallery, video, views', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titleam' => 'Title (armenian)',
			'titleen' => 'Title (english)',
			'whatam' => 'What is it (armenian)',
			'whyam' => 'Why  it (armenian)',
			'howam' => 'How it  works (armenian)',
			'whaten' => 'What is it (english)',
			'whyen' => 'Why  it (english)',
			'howen' => 'How it  works (english)',
			'gallery' => 'Gallery',
			'video'=>'Video',
			'views'=>'Views',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titleam',$this->titleam,true);
		$criteria->compare('titleen',$this->titleen,true);
		$criteria->compare('whatam',$this->whatam,true);
		$criteria->compare('whyam',$this->whyam,true);
		$criteria->compare('howam',$this->howam,true);
		$criteria->compare('whaten',$this->whaten,true);
		$criteria->compare('whyen',$this->whyen,true);
		$criteria->compare('howen',$this->howen,true);
		$criteria->compare('gallery',$this->gallery,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('views',$this->views,true);
		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}