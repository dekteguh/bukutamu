bukutamu
========

A Simple Yii Application about guest book

To use this app: 
- Download Yii Framework from <a href="http://www.yiiframework.com">Yii Framework site</a>
- Extract to \www\  and rename folder to yii
- Clone this app using git or download zip file
- Extract to \www\ and rename folder to bukutamu
- Create database MySQL bukutamu, dbname=bukutamu, user=root, password=
- Don't forget to activate open_short_tag
- To fill the form: http://localhost/bukutamu/index.php?r=tamu/isi
- To show the data: http://localhost/bukutamu/index.php?r=tamu/index


Here SQL Database to create table:

CREATE TABLE IF NOT EXISTS `pesan_tamu` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nama` varchar(50) NOT NULL,
`email` varchar(50) NOT NULL,
`alamat` varchar(100) DEFAULT NULL,
`pesan` text NOT NULL,
`create_time` datetime DEFAULT NULL,
`update_time` datetime DEFAULT NULL,
`user_IP` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
);
