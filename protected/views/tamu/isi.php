<?php
/* @var $this TamuController */

$this->breadcrumbs=array(
	'Tamu'=>array('/tamu'),
	'Isi',
);
?>
<h1>Mengisi Buku Tamu</h1>

<?php
	// Render form
	echo $this->renderPartial('_formIsi', array('model'=>$model));
?>
