<?php
/* @var $this TamuController */

$this->breadcrumbs=array(
	'Tamu',
);
?>
<h1>Index Buku Tamu</h1>
<?php if($isianTamu==null): ?>
	<h2>Tidak ada isian</h2>
<?php else: ?>
	<?php foreach ($isianTamu as $item): ?>
		<h4>Nama Tamu: <?=$item['nama']?></h4>
		Email: <?=CHtml::encode($item['email'])?>
		<br />
		Alamat: <?=CHtml::encode($item['alamat'])?>
		<br />
		Pesan: <?=CHtml::encode($item['pesan'])?>
		<br />
		IP User: <?=CHtml::encode($item['user_IP'])?>
		<hr>
	<?php endforeach;?>
<?php endif; ?>
