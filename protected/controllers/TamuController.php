<?php

class TamuController extends Controller
{
	public function actionIndex()
	{
		// Load dulu model dan ambil dari record
		$isianTamu = PesanTamu::model()->findAll(array(
			'order'=>'id DESC' // sortingnya desc
			));
		$this->render('index', array(
			'isianTamu'=>$isianTamu
			));
	}

	public function actionIsi()
	{
		// Load dulu modelnya agar bisa dihubungkan dengan view
		$model = new PesanTamu;
		// Pastikan ada inputan dari user
		if(isset($_POST['PesanTamu'])){
			$model->attributes=$_POST['PesanTamu'];
			// Jika tidak ada error dan tersimpan
			if($model->save()){
				// Maka kembali ke index
				$this->redirect(array('/tamu/index'));
			}
		}
		$this->render('isi', array('model' => $model ));
	}

	public function actions(){
		return array(
			// ada keluar gambarnya ntar
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				),
			);
	}
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}