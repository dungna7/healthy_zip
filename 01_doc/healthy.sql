-- Project Name : noname
-- Date/Time    : 2023/07/30 20:20:10
-- Author       : dungna
-- RDBMS Type   : MySQL
-- Application  : A5:SQL Mk-2

/*
  << CAUTION !! >>
  BackupToTempTable, RestoreFromTempTable directive is attached.
 This preserve data after drop table and create table.
 This function temporarily creates temporary table like $$TableName.
  This feature is only available in A5:SQL Mk-2.
*/

-- * RestoreFromTempTable
create table healthy.body_record (
  id int(11) auto_increment not null comment 'id'
  , weight float not null comment '体重'
  , body_fat float not null comment '体脂肪:体脂肪
体脂肪
体脂肪'
  , created date not null comment 'created'
  , updated datetime comment 'updated'
  , deleted datetime comment 'deleted'
  , is_delete tinyint(1) default 0 comment 'is_delete'
  , user_id int(11) not null comment 'user_id'
  , constraint body_record_PKC primary key (id)
) comment 'healthy.body_record' ;

-- * RestoreFromTempTable
create table healthy.challenge (
  id int(11) auto_increment not null comment 'id'
  , title varchar(100) comment 'title'
  , complete_rate int(11) comment 'complete_rate'
  , user_id int(11) not null comment 'user_id'
  , constraint challenge_PKC primary key (id)
) comment 'healthy.challenge' ;

-- * RestoreFromTempTable
create table healthy.diary (
  id int(11) auto_increment not null comment 'id'
  , title varchar(255) comment 'title'
  , content text not null comment 'content'
  , created datetime default current_timestamp() not null comment 'created'
  , id_delete tinyint(1) default 0 comment 'id_delete'
  , udpated datetime comment 'udpated'
  , user_id int(11)  not null comment 'user_id'
  , constraint diary_PKC primary key (id)
) comment 'healthy.diary' ;

-- * RestoreFromTempTable
create table healthy.eat_history (
  id int(11) auto_increment not null comment 'id'
  , type int(11) not null comment 'type :
 1 : Morning
 2: Lunch
 3: Dinner
 4: Snack'
  , image_path varchar(255) not null comment '食事画像'
  , remark text comment '備考'
  , created datetime comment 'created'
  , updated datetime comment 'updated'
  , deleted datetime comment 'deleted'
  , user_id int(11)  not null comment 'user_id'
  , constraint eat_history_PKC primary key (id)
) comment 'healthy.eat_history' ;

-- * RestoreFromTempTable
create table healthy.exercise (
  id int(11) auto_increment not null comment 'id'
  , name varchar(255) not null comment 'exercire name:
1. 家事全般（立位・軽い）
2. ....
3. ....'
  , kcal int(11) not null comment '消費カロリー'
  , time int(11) not null comment '実行時間(分)'
  , created date comment '施行日'
  , is_delete tinyint(1) default 0 comment 'is_delete'
  , updated datetime comment 'updated'
  , deleted datetime comment 'deleted'
  , user_id int(11) not null comment 'user_id'
  , constraint exercise_PKC primary key (id)
) comment 'healthy.exercise' ;

-- * RestoreFromTempTable
create table healthy.m_hashtag (
  id int(11) auto_increment not null comment 'id'
  , tag_name varchar(100) not null comment 'hashtag name'
  , created datetime default current_timestamp() comment 'created'
  , is_deleted tinyint(1) default 0 not null comment 'is_deleted'
  , updated datetime comment 'updated'
  , deleted datetime comment 'deleted'
  , constraint m_hashtag_PKC primary key (id)
) comment 'healthy.m_hashtag' ;

-- * RestoreFromTempTable
create table healthy.recommended (
  id int(10) unsigned auto_increment not null comment 'id'
  , type int(11) not null comment 'recommended type :
1 : オススメ
2: ダイエット
3: 美容
4: 健康'
  , title varchar(255) not null comment '文書の概要'
  , image_path varchar(255) comment 'image_path'
  , content text comment 'content'
  , created datetime default current_timestamp() not null comment 'created'
  , is_delete tinyint(1) default 0 not null comment 'is_delete'
  , updated datetime comment 'updated'
  , deleted datetime comment 'deleted'
  , constraint recommended_PKC primary key (id)
) comment 'healthy.コラムページ' ;

-- * RestoreFromTempTable
create table healthy.recommended_tag (
  recommended_id int(11) not null comment 'recommended_id'
  , tag_id int(11) not null comment 'tag_id'
  , constraint recommended_tag_PKC primary key (recommended_id,tag_id)
) comment 'healthy.recommended_tag' ;

-- * RestoreFromTempTable
create table healthy.users (
  id int(11) auto_increment not null comment 'id'
  , name varchar(100) not null comment 'name'
  , email varchar(255) not null comment 'email'
  , password varchar(255) not null comment 'password'
  , created datetime comment 'created'
  , updated datetime comment 'updated'
  , permision int(11) default 2 comment 'permision:
2. generer user'
  , constraint users_PKC primary key (id)
) comment 'healthy.users' ;

alter table healthy.users add unique users_UN (email) ;

