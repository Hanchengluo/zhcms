<?php if(!defined('ZHPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`validatecode`,`regtime`,`logintime`,`regip`,`lastip`,`user_state`,`lock_end_time`,`qq`,`sex`,`favicon`,`credits`,`rid`,`allow_user_set_credits`,`signature`,`domain`,`spec_num`,`icon`) VALUES('1','superadmin','admin','bd6b748ae34eee2be6751425065e4d5a','b39cd56304','hong@metaphase.co.jp','','1401177433','1408413779','127.0.0.1','127.0.0.1','1','0','','1','','49','4','1','个性签名11','admin','11','')");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`validatecode`,`regtime`,`logintime`,`regip`,`lastip`,`user_state`,`lock_end_time`,`qq`,`sex`,`favicon`,`credits`,`rid`,`allow_user_set_credits`,`signature`,`domain`,`spec_num`,`icon`) VALUES('11','test1','test1','1c886400d15eb2252f0657010cdaf1e1','90b62088d1','136871204@qq.com','b89460ee','1405044555','1408335092','127.0.0.1','127.0.0.1','1','0','','1','','106','4','1','','zhcms11','11','')");
