<?php
/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id
 * @property string $titleam
 * @property string $titleen
 * @property integer $type
 * @property string $descam
 * @property string $descen
 * @property string $teaseram
 * @property string $teaseren
 * @property string $image
 * @property string $video
 * @property string $gallery
 */
class Projects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projects the static model class
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
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titleam,  timestamp, descam, teaseram', 'required'),
			array('folder', 'required', 'on'=>'create'),
			array('image, gallery', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('views', 'numerical', 'integerOnly'=>true),
			array('titleam, titleen', 'length', 'max'=>250),
			array('image', 'length', 'max'=>500),
			array('gallery', 'length', 'max'=>750),
			array('descen, teaseren, video', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titleam, titleen, views, descam, descen, teaseram, teaseren, image, video, gallery, timestamp', 'safe', 'on'=>'search'),
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
			'descam' => 'Description (armenian)',
			'descen' => 'Description (english)',
			'teaseram' => 'Teaser (armenian)',
			'teaseren' => 'Teaser (english)',
			'image' => 'Image',
			'video' => 'Video',
			'gallery' => 'Gallery',
			'views'=>'Views',
			'timestamp'=>'Imput Date',
			'folder'=>'Folder',
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
		$criteria->compare('descam',$this->descam,true);
		$criteria->compare('descen',$this->descen,true);
		$criteria->compare('teaseram',$this->teaseram,true);
		$criteria->compare('teaseren',$this->teaseren,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('gallery',$this->gallery,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('folder',$this->folder,true);
		$criteria->compare('views',$this->views,true);
		$criteria->order='id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}