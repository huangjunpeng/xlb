SQLite format 3   @    �   �   �   �   W                                                i -��   �    ����                                                                                                                                                                                                                                                       i	}W indexsqlite_autoindex_sqlitebrowser_rename_column_new_table_1sqlitebrowser_rename_column_new_table       P++Ytablesqlite_sequencesqlite_sequenceCREATE TABLE sqlite_sequence(name,seq)�\�tableuseruserCREATE TABLE `user` (
	`uid`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`username`	TEXT,
	`groupid`	INTEGER DEFAULT 2,
	`name`	TEXT,
	`avatar`	TEXT,
	`avatar_small`	TEXT,
	`email`	TEXT,
	`password`	TEXT,
	`cookie_token`	BLOB,
	`cookie_token_expire`	TEXT DEFAULT 0,
	`reg_time`	INTEGER DEFAULT 0,
	`last_login_time`	INTEGER DEFAULT 0
)k�1table<?php <?php CREATE TABLE "<?php " (
	`防止sqlite的数据库文件被直   	/   1   ,   (                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 � ������d                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              )Wsqlitebrowser_rename_column_new_table� page_historyusercatalog   ,item_me%page_historypagecatalog	itemuser   � ����                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          j !    MM!sfd454dvfdb3ec2ef78a331ba99b289ef3fe5062364dd0b92a8165633e826677852560101b1471249214W:�7W:�>   �#    M tdhtd5e65td92420151b927360e78fb39e50ec35d000W:�(   �!    MM!ertgtd4fv4218b86c99b78bb909345a96d2b8     M admin0ffd93090fc323c3ec8c3c2d16446c170Zw��:     M showdoca89da13684490eb9ec9e613f91d24d000W���� G �G           �Q��  7�                             k �                             ]�                             [�    l�    4�    7�    �     c                       �/                          
                                                                                      	�            x/    	�            /                          	�            @/                                                                    	�            �/    	�            �/                          	�            /                                                                    	�            �/    	�  	          H/                         	�            �/                                                                    	�           > M)2725858b7e40cb679e5100e4f8e74254[R�115.183.29.142Z���> M)9fd6f08521fed048b3bb3eeb97f6940fZ�{115.183.29.142Zw�   9	Ma7e0ee20ed029504fd6f76fe96ae218aXf�10.0.2.2W���      �??           Q��  � �     (�*                    ��xsqli��*                    V �renam��*    �A?    �A?    6 Lrowse�A?           Q��  h ��   0�*    �A?    �A?    �W in                        tebrowser_rename_column_n   �]1!!�tableuser_tokenuser_tokenCREATE TABLE `user_token` (
        `id`  INTEGER PRIMARY KEY ,
        `uid` int(10) NOT NULL DEFAULT '0',
        `token` CHAR(200) NOT NULL DEFAULT '',
        `token_expire` int(11) NOT NULL DEFAULT '0' ,
        `ip` CHAR(200) NOT NULL DEFAULT '',
        `addtime` int(11) NOT NULL DEFAULT '0'
        )'.; indexsqlite_autoindex_page_1page�>/%%�?tablepa�f2�tabletemplatetemplateCREATE TABLE `template` (
        `id`  INTEGER PRIMARY KEY ,
        `uid` int(10) NOT NULL DEFAULT '0',
        `username` CHAR(200) NOT NULL DEFAULT '',
        `template_title` CHAR(200) NOT NULL DEFAULT '' ,
        `template_content` text NOT NULL DEFAULT '',
        `addtime` int(11) NOT NULL DEFAULT '0'
        )    � �A? �                                                                                                                                                                        �K(�ytableitemitemCREATE TABLE "item" (
	`item_id`	INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
	`item_name`	TEXT,
	`item_description`	TEXT,
	`uid`	INTEGER,
	`username`	TEXT,
	`password`	TEXT,
	`addtime`	INTEGER,
	`last_update_time`	INTEGER DEFAULT 0
, item_domain text NOT NULL DEFAULT '', item_type INT( 1 ) NOT NULL DEFAULT '1')5!I# indexsqlite_autoindex_item_member_1item_member� ##�Etableitem_memberitem_member
CREATE TABLE "item_member" (
	`item_member_id`	INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
	`item_id`	INTEGER,
	`uid`	INTEGER,
	`username`	TEXT,
	`addtime`	INTEGER DEFAULT 0
, member_group_id INT( 1 ) NOT NULL DEFAULT '1')P++Ytablesqlite_sequencesqlite_sequenceCREATE TABLE sqlite_sequence(name,seq)k�1table<?php <?php CREATE TABLE "<?php " (
	`防止sqlite的数据库文件被直接下载`	INTEGER
)   & &O��J                     � +�\*�tableuseruserCREATE TABLE "user" (
	`uid`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`username`	TEXT,
	`groupid`	INTEGER DEFAULT 2,
	`name`	TEXT,
	`avatar`	TEXT,
	`avatar_small`	TEXT,
	`email`	TEXT,
	`password`	TEXT,
	`cookie_token`	BLOB,
	`cook'); indexsqlite_autoindex_item_1item�\*�tableuseruserCREATE TABLE "user" (
	`uid`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`username`	TEXT,
	`groupid`	INTEGER DEFAULT 2,
	`name`	TEXT,
	`avatar`	TEXT,
	`avatar_small`	TEXT,
	`email`	TEXT,
	`password`	TEXT,
	`cookie_token`	BLOB,
	`cookie_token_expire`	TEXT DEFAULT 0,
	`reg_time`	INTEGER DEFAULT 0,
	`last_login_time`	INTEGER DEFAULT 0
)� +�tablecatalogcatalogCREATE TABLE "catalog" (
	`cat_id`	INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
	`cat_name`	TEXT,
	`item_id`	INTEGER,
	`s_number`	INTEGER DEFAULT 99,
	`addtime`	INTEGER DEFAULT 0
, parent_cat_id INT( 10 ) NOT NULL DEFAULT '0', level INT( 10 ) NOT NULL DEFAULT '2')-,A indexsqlite_autoindex_catalog_1catalog   $ ��$                                                                                                                                                                                                                                                                                      �f/%%�tablepage_historypage_historyCREATE TABLE "page_history" (
	`page_history_id`	INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
	`page_id`	INTEGER,
	`author_uid`	INTEGER,
	`author_username`	TEXT,
	`item_id`	INTEGER,
	`cat_id`	INTEGER,
	`page_title`	TEXT,
	`page_content`	TEXT,
	`s_number`	INTEGER,
	`addtime`	INTEGER
, page_comments text NOT NULL DEFAULT '')'.; indexsqlite_autoindex_page_1page�G-�qtablepagepageCREATE TABLE "page" (
	`page_id`	INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
	`author_uid`	INTEGER,
	`author_username`	TEXT,
	`item_id`	INTEGER,
	`cat_id`	INTEGER,
	`page_title`	TEXT,
	`page_content`	TEXT,
	`s_number`	INTEGER DEFAULT 99,
	`addtime`	INTEGER DEFAULT 0
, page_comments text NOT NULL DEFAULT '')                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
         
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       �    d�����������������������4data
    
**简要描述：** 

- 用户注册接口

**请汓7 			%�/saedfedfc默认页面### ShowDoc介绍
关于ShowDoc的介绍，请访问：[http://blog.star7th.com/2015/11/� 	)�Madmin3.删除孩子eNp1U8tu2kAUXWe+YrrpAtUBqrYL+guVWvWxx2ArWAG7xUZQ1ZEgaloCSaESJTyihKqGNKpSB5WQFlvhZ5gZe8UvdPDYVhql3szcM+eeufceD4QQgkiE/Cw7owpuNJz5+dLuRSIQAA6i6sDtGujsFJ01AWU55iUeb796/sSncDAJM5r2OhGNFovFdakk8Uq2oKSU9bSSi5ayqWhBFfPRdEbKCnlR5gQxC5PAu5BJ4fYfZDc8NSr27OmLl3B1D2ps4y9hHToLUXNfR/Mdt7yrk7GFjuq6Y05w55MO9ARHP9oI9HYs5KDO+TBlyFJ6U+ZzItRxx6SIquUleQPqrDfcuSAn54yZyktaRuDf3s4krWN8MLwfiz/gYg+52COWo4qlgC7JWqhaPkHVH4whCRRtjgICvrRQbUB67/HBFJW7i98zcjpb2nvEbjtXn0PcPVy5srAHaGdIFTwlTdkU5ZvFka7ldj8sLIPs7nk0AOmI5y3UPyLGbHFVp/MFyWQSgndg7e6bgqI9TiuCyHYJGL8XoDlRVfmN8ICtvlfVJqod32FQmCDwGh+wqbaPSsK/CnG2gLUtsLWq41p9zFxm5U27b/WZ822mRgcG/++jKas22dBpSGpTXK6QQYWOOk5/L9bS0u7HaICMsTMZekn+FML5UtBtdR3TxNMqrpjBgJHxEf/67r   y   i   
   %	   �   H   I   �   �   p      g g�                    �=.    @�*                                         �=.    ��*                                         �=.    p�*                                        �=.                                                   �=.    8C?    I                                    �=.                                                   �=.            f                    S               �=.                                                   �=.    �:?                                           �=.    �D?                           �      �;�    0d�            �f�   70K% indexsqlite_autoindex_page_history_1page_history�]1!!�tableuser_tokenuser_tokenCREATE TABLE `user_token` (
        `id`  INTEGER PRIMARY KEY ,
        `uid` int(10) NOT NULL DEFAULT '0',
        `token` CHAR(200) NOT NULL DEFAULT '',
        `token_expire` int(11) NOT NULL DEFAULT '0' ,
        `ip` CHAR(200) NOT NULL DEFAULT '',
        `addtime` int(11) NOT NULL DEFAULT '0'
        )    E  � E     �@            ��@    �(A    ��@    0�@         �j 	5�	admin1.获取孩子列表    
**简要描述：** 

- 获取孩子列表

**请求URL：** 
- `    ��C 	)�I	admin1.公司信息    
**简要描述：** 

- 登陆

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/index/gci `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |


 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;tel&quot;: &quot;010-27277281&quot;,
		&quot;qq&quot;: &quot;822771882&quot;,
		&quot;email&quot;: &quot;jdja@126.com&quot;,
		&quot;wechat&quot;: &quot;xiaoluobohuiben&quot;
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Zw��   � �                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            :	 !!!!ertgtd4fv4ertgtd4fv4ertgtd4fv4ertgtd4fv4W:�)W<6	 !!!!sfd454dvfdsfd454dvfdsfd454dvfdsfd454dvfdW:�D   �!!!!ertgtd4fv4ertgtd4fv4ertgtd4fv4ertgtd4fv4W:�)0	 %%	 示例文档示例文档showdocVU¸W<�   F3?	ShowDoc数据字典Show" 	小萝卜adminZw�Z�B   � ��� � �E   7                             i#}W indexsqlite_autoindex_sqlitebrowser_rename_column_new_table_1sqlitebrowser_rename_column_new_table�     5!I# indexsqlite_i0}W indexsqlite_autoindex_sqlitebrowser_rename_column_n   �]1!!�tableuser_tokenuser_tokenCREATE TABLE `user_token` (
        `id`  INTEGER PRIMARY KEY ,
        `uid` int(10) NOT NULL DEFAULT '0',
        `token` CHAR(200) NOT NULL DEFAULT '',
        `token_expire` int(11) NOT NULL DEFAULT '0' ,
        `ip` CHAR(200) NOT NULL DEFAULT '',
        `addtime` int(11) NOT NULL DEFAULT '0'
        )'.; indexsqlite_autoindex_page_1page�>/%%�?tablepa�f2�tabletemplatetemplateCREATE TABLE `template` (
        `id`  INTEGER PRIMARY KEY ,
        `uid` int(10) NOT NULL DEFAULT '0',
        `username` CHAR(200) NOT NULL DEFAULT '',
        `template_title` CHAR(200) NOT NULL DEFAULT '' ,
        `template_content` text NOT NULL DEFAULT '',
        `addtime` int(11) NOT NULL DEFAULT '0'
        )   �    c������������������                                    � !#�}ertgtd4fv4data-副本
    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:-----�3 	/�#	admin1.获取验证码    
**简要描述：** 

- 获取短信验证码

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/index/sendsms `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|userMobile |是  |string |用手机号   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;发送成功&quot;
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误�   x   w   �   �   h   �   J   [   �   �   �   �
   �	   �   �      �   
   f ���������������������~xrlf                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          

				   J J      .   E�f                    @���            .   =0�a     @���                          .   j�f                      ���           .   =��c      ���    0�G    ����            .   HPa             X�G                    /   E�f                      ���            /   =0d     ЂG     ��3 	/�#	admin1.获取验证码    
**简要描述：** 

- 获取短信验证码

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/index/sendsms `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|userMobile |是  |string |用手机号   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;发送成功&quot;
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Zw�
   � ����                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
		L � �����{b�6 
�                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     '		绘本-柜子Zw� 		小萝卜Zw�� 		交易
Zw�^
 		用户	Zw�G	 		评论Zw�   		绘本Zw� 		心愿单Zw�� 		搜索Zw�� 		分类ZwԴ 		首页Zwԝ %		孩子信息Zwԃ 			登陆Zw�@ 		APPZw�/
   � ������������                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          

				
   � �������������RRRRRRRRRRRRRRRRRRRRRRRRRRRR�������� 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
   �33   �22   �11   �00   �//   �..   �--   �,,   |]]� B\\� <[[� 6ZZ� 0YY� *XX� $WW� VV� UU� TT� SS� RRff   �ee   �dd   �cc   �bb   �aa   �``   �__   ~HH   rGG   lFF   fEE   `DD   ZCC   TBB   NAA  

				    �  �            `                                                                                                                                                                                                                             � 	)�Madmin3.删除孩子eNp1U8tu2kAUXWe+YrrpAtUBqrYL+guVWvWxx2ArWAG7xUZQ1ZEgaloCSaESJTyihKqGNKpSB5WQFlvhZ5gZe8UvdPDYVhql3szcM+eeufceD4QQgkiE/Cw7owpuNJz5+dLuRSIQAA6i6sDtGujsFJ01AWU55iUeb796/sSncDAJM5r2OhGNFovFdakk8Uq2oKSU9bSSi5ayqWhBFfPRdEbKCnlR5gQxC5PAu5BJ4fYfZDc8NSr27OmLl3B1D2ps4y9hHToLUXNfR/Mdt7yrk7GFjuq6Y05w55MO9ARHP9oI9HYs5KDO+TBlyFJ6U+ZzItRxx6SIquUleQPqrDfcuSAn54yZyktaRuDf3s4krWN8MLwfiz/gYg+52COWo4qlgC7JWqhaPkHVH4whCRRtjgICvrRQbUB67/HBFJW7i98zcjpb2nvEbjtXn0PcPVy5srAHaGdIFTwlTdkU5ZvFka7ldj8sLIPs7nk0AOmI5y3UPyLGbHFVp/MFyWQSgndg7e6bgqI9TiuCyHYJGL8XoDlRVfmN8ICtvlfVJqod32FQmCDwGh+wqbaPSsK/CnG2gLUtsLWq41p9zFxm5U27b/WZ822mRgcG/++jKas22dBpSGpTXK6QQYWOOk5/L9bS0u7HaICMsTMZekn+FML5UtBtdR3TxNMqrpjBgJHxEf/67r8V3J8go8d6YuSF9Y1eRYdHDuvuqO1+vaDGXj9izw0A8BeTBZuNZ��:                  |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   ----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    �  �      ��8    ��8    @�8    �8                            Y       Y       8�8            �8    H�8    ��8    H�8         �p
 	Y�madmin2.获取附近绘本所在柜子列表eNqlVE1vEkEYPnd+xXjxQFxgu4UtePViYqLx42SMLAupmwJb3W0gcZtA09ZS2i4mFfmytREJidUtEUsKRP4MM7uc+AsOzLIpoCfnMvO+z/s8M+/OswMhhMDlMn+krXoG67rVvxz1yi4XBICB1nEb6YVhacfqvze7RVy9wNk0qjbwWRV9z6P9j9Z5AxC2ZbRxc/vZ4wc2lYEh+EpVN4IeTzKZdEspSZBjm3JYdoty3JOKhT1hWV73pMRYCEy2pwK4cI16+kSDSDx6+OQpHKsjfRt/cE6l0RDljzTU3x2ms5rZ7KLTnGYZLVw81oAWZMggbcHJioYM1Bg7TSqkCNRw0SBrKaFCjbZ2/x4FY3JibQ7WUadug4I6i3UuHEyV16OJKaqob6SxjlnqDkt7g27NzB5OygAk7fZPUOXUrHUGv3OkVxAKhSB4C5Zuv96U1buiHInSVRCyd6bZeFRRhDUHoLP93fbz6ODsFk05hIigCtPq50TcTisbghh9KUVmhVgf69DtwoWalYWKhBCfOxC61K38J3RURbvNQefb4LpOvOLlkN4m8wI/ElXE/+JLiiokxLkz+AKr/gDLujl+2etd9fHcAm98xXP9s343t8Lz/LIvwPGLBEGdrecC7oCf93Ecy3ltfbC09QJsje/yxh1Ts1Jrztv3r75lbNsS404N+69BKGOrUCeS0Dy4wumM+Tkz6h2y5Hehthj1Kl4SoFrTan2dkGwnOR4lyeFJyTIMfLWPM8bUpKj2Dv9s2C8BrrRQrUx7osWD7heyFTGgWc0N64Xh+S+zvHMToo8JAOAPS+Pfzg==Z��    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<!                  |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理    img\/reduce_5185.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}, {
			&quot;id&quot;: &quot;1011&quot;,
			&quot;name&quot;: &quot;登登在哪里&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_4683.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}, {
			&quot;id&quot;: &quot;604&quot;,
			&quot;name&quot;: &quot;森林里的秘密(Secrets in the Woods)&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_5288.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}, {
			&quot;id&quot;: &quot;6869&quot;,
			&quot;name&quot;: &quot;小蝌蚪乌卡买飞机&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_413518lt.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}]
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z� �   uot;name&quot;: &quot;我讨厌书&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_huandengpian1QIn.JPG.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}, {
			&quot;id&quot;: &quot;524&quot;,
			&quot;name&quot;: &quot;猪先生去野餐&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_1025637585.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}, {
			&quot;id&quot;: &quot;4497&quot;,
			&quot;name&quot;: &quot;小红帽.江西高校&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_xiaohongmao.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}, {
			&quot;id&quot;: &quot;5167&quot;,
			&quot;name&quot;: &quot;小家大爱绘本系列第二辑(共4册)&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_tupian1.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}, {
			&quot;id&quot;: &quot;2434&quot;,
			&quot;name&quot;: &quot;中国神话绘本:神农尝百草&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/   &quot;: &quot;\/xlb\/public\/book\/img\/reduce_8502.jpg&quot;,
		&quot;score&quot;: &quot;4分&quot;,
		&quot;theme&quot;: [{
			&quot;bc_id&quot;: &quot;1&quot;,
			&quot;bc_name&quot;: &quot;趣味类&quot;
		}, {
			&quot;bc_id&quot;: &quot;4&quot;,
			&quot;bc_name&quot;: &quot;启蒙类&quot;
		}, {
			&quot;bc_id&quot;: &quot;16&quot;,
			&quot;bc_name&quot;: &quot;益智类&quot;
		}],
		&quot;comment&quot;: null,
		&quot;coment_count&quot;: &quot;0&quot;,
		&quot;iswish&quot;: false,
		&quot;like&quot;: [{
			&quot;id&quot;: &quot;4098&quot;,
			&quot;name&quot;: &quot;小恐龙幼儿园.我的南瓜哥哥&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_2351.jpg&quot;,
			&quot;number&quot;: &quot;2&quot;
		}, {
			&quot;id&quot;: &quot;765&quot;,
			&quot;name&quot;: &quot;小狐狸童书绘本&quot;,
			&quot;picture&quot;: &quot;\/xlb\/public\/book\/img\/reduce_tu20130121140312.jpg&quot;,
			&quot;number&quot;: &quot;0&quot;
		}, {
			&quot;id&quot;: &quot;903&quot;,
			&q    ��数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |int |绘本ID   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;id&quot;: &quot;3&quot;,
		&quot;name&quot;: &quot;世界有多大&quot;,
		&quot;age_reading&quot;: &quot;3岁-6岁&quot;,
		&quot;author&quot;: &quot;布里塔.泰肯徳普&quot;,
		&quot;press&quot;: &quot;北京科学技术出版社&quot;,
		&quot;press_data&quot;: &quot;2003年01月&quot;,
		&quot;languages&quot;: &quot;中文绘本&quot;,
		&quot;describe&quot;: &quot;小鼹鼠问爸爸世界有多大，爸爸鼓励他走出鼹鼠丘自己去寻找答案。 小鼹鼠碰到了蜘蛛、老鼠、马儿，看到了越来越大的世界。海鸥带着他飞到海边，鲸鱼又带着他游遍了世界的各个角落。 回到家后，爸爸问小鼹鼠是否找到了答案。 小鼹鼠说：“你想有多大就有多大。”&quot;,
		&quot;picture   #p://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)   $     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�    ��：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


W:��                                                      �  �                                    �                                                                                             �p	 	Y�madmin2.获取附件绘本所在柜子列表eNqlVE1vEkEYPnd+xXjxQFxgu4UtePViYqLx42SMLAupmwJbZRtI3CbQtAql7XKoyJetjUhIrFIiQsoS+TPM7O6pf8GBWTYF9ORcZt73eZ9n5t15diCEELhcxo+M2cxiTTNHl9fDqssFAWCgedxHWsmq7I31nqGXcf0C5zOo3sJndfS9iHIfzfMWIGyz3ced3WePH9hUBobgK0XZCno8qVTKLaUlQY5ty2HZLcpxTzoW9oRledOTFmMhMN2eCuDSFRpqUw0i8ejhk6dwoo60XfzBOZVKQ1Q8UtFo38rkVaOjo9OCara7uHysAjXIkEHagtMVDRmoMnaaVEgRqOJym6ylhAJV2tr9exSMyYmNBVhDg6YNCso8NrhwMEXejCZmaFJ5I010jIpuVd6N9YaRP5yWAUjaHZ2g2qnRGIx/F0ivIBQKQfAWrNx+vS0rd0U5EqWrIGTvzLLxaDIpbDgAne3vliuig7NbNOUQIoIizKqfE3E7ndwSxOhLKTIvxPpYh24XLtWsLVUkhPjCgdClZhY/oaM62u+MB9/GV03iFS+HtD6Zl/iRaFL8L76UVISEuHAGX2DdH2BZN8ever3rPp5b4k2ueKF/1u/m1nieX/UFOH6ZICjz9VzAHfDzPo5jOa+tD1Z2XoCdyV3euGNqVmrNRfv+1beMbVti3Jlh/zUIZWIV6kQSGgc9nMkan7PXw0OW/C7UFtfDmpcEqNExu1+nJNtJjkdJ0jqpmO027uVwtj0zKWq8xz9b9kuAa13UqNKeaPFY/0K2IgY06gWrWbLOfxnVvZsQfUwAAH8Axobf6w==Z��    bo.com/xlb/book/xcl`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |int |绘本ID   |
|long |是  |int |经度   |
|lat |是  |int |纬度   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: [{
		&quot;space_id&quot;: &quot;151&quot;,
		&quot;_id&quot;: &quot;4&quot;,
		&quot;_name&quot;: &quot;小萝卜共享书柜03号柜&quot;,
		&quot;_desc&quot;: &quot;小萝卜共享书柜03号柜&quot;,
		&quot;_distance&quot;: &quot;5986911.372008573&quot;,
		&quot;_long&quot;: &quot;116.3477725937&quot;,
		&quot;_lat&quot;: &quot;39.9675331303&quot;
	}]
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z�_   (��求URL：** 
- ` http://www.ixiaoluobo.com/xlb/book/gec`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |int |柜子ID   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;casps&quot;: [{
			&quot;cs_id&quot;: &quot;1&quot;,
			&quot;cs_no&quot;: &quot;100100&quot;
		}, {
			&quot;cs_id&quot;: &quot;2&quot;,
			&quot;cs_no&quot;: &quot;100101&quot;
		}, {
			&quot;cs_id&quot;: &quot;3&quot;,
			&quot;cs_no&quot;: &quot;100102&quot;
		}, {
			&quot;cs_id&quot;: &quot;4&quot;,
			&quot;cs_no&quot;: &quot;100103&quot;
		}, {
			&quot;cs_id&quot;: &quot;5&quot;,
			&quot;cs_no&quot;: &quot;100104&quot;
		}, {
			&quot;cs_id&quot;: &quot;6&quot;,
			&quot;cs_no&quot;: &quot;100105&quot;
		}, {
			&quot;cs_id&quot;: &quot;7&quot;,
			&quot;cs_no&quot;: &quot;100106&quot;
		}, {
			&quot;cs_id&quot;: &quot;8&quot;,
			   )&quot;cs_no&quot;: &quot;100107&quot;
		}, {
			&quot;cs_id&quot;: &quot;9&quot;,
			&quot;cs_no&quot;: &quot;100108&quot;
		}, {
			&quot;cs_id&quot;: &quot;10&quot;,
			&quot;cs_no&quot;: &quot;100109&quot;
		}, {
			&quot;cs_id&quot;: &quot;11&quot;,
			&quot;cs_no&quot;: &quot;1001010&quot;
		}, {
			&quot;cs_id&quot;: &quot;12&quot;,
			&quot;cs_no&quot;: &quot;1001011&quot;
		}, {
			&quot;cs_id&quot;: &quot;13&quot;,
			&quot;cs_no&quot;: &quot;1001012&quot;
		}, {
			&quot;cs_id&quot;: &quot;14&quot;,
			&quot;cs_no&quot;: &quot;1001013&quot;
		}, {
			&quot;cs_id&quot;: &quot;15&quot;,
			&quot;cs_no&quot;: &quot;1001014&quot;
		}, {
			&quot;cs_id&quot;: &quot;16&quot;,
			&quot;cs_no&quot;: &quot;1001015&quot;
		}, {
			&quot;cs_id&quot;: &quot;17&quot;,
			&quot;cs_no&quot;: &quot;1001016&quot;
		}, {
			&quot;cs_id&quot;: &quot;18&quot;,
			&quot;cs_no&quot;: &quot;1001017&quot;
		}, {
			&quot;cs_id&quot;: &quot;19&quot;,
			&quot;cs_no&quot;: &quot;1001018&quot;
		}, {
			&quot;cs_id&quot;:   * &quot;20&quot;,
			&quot;cs_no&quot;: &quot;1001019&quot;
		}, {
			&quot;cs_id&quot;: &quot;21&quot;,
			&quot;cs_no&quot;: &quot;1001020&quot;
		}, {
			&quot;cs_id&quot;: &quot;22&quot;,
			&quot;cs_no&quot;: &quot;1001021&quot;
		}, {
			&quot;cs_id&quot;: &quot;23&quot;,
			&quot;cs_no&quot;: &quot;1001022&quot;
		}, {
			&quot;cs_id&quot;: &quot;24&quot;,
			&quot;cs_no&quot;: &quot;1001023&quot;
		}, {
			&quot;cs_id&quot;: &quot;25&quot;,
			&quot;cs_no&quot;: &quot;1001024&quot;
		}, {
			&quot;cs_id&quot;: &quot;26&quot;,
			&quot;cs_no&quot;: &quot;1001025&quot;
		}, {
			&quot;cs_id&quot;: &quot;27&quot;,
			&quot;cs_no&quot;: &quot;1001026&quot;
		}, {
			&quot;cs_id&quot;: &quot;28&quot;,
			&quot;cs_no&quot;: &quot;1001027&quot;
		}, {
			&quot;cs_id&quot;: &quot;29&quot;,
			&quot;cs_no&quot;: &quot;1001028&quot;
		}, {
			&quot;cs_id&quot;: &quot;30&quot;,
			&quot;cs_no&quot;: &quot;1001029&quot;
		}, {
			&quot;cs_id&quot;: &quot;31&quot;,
			&quot;cs_no&quot;: &quot;1001030&quot;
		},   + {
			&quot;cs_id&quot;: &quot;32&quot;,
			&quot;cs_no&quot;: &quot;1001031&quot;
		}, {
			&quot;cs_id&quot;: &quot;33&quot;,
			&quot;cs_no&quot;: &quot;1001032&quot;
		}, {
			&quot;cs_id&quot;: &quot;34&quot;,
			&quot;cs_no&quot;: &quot;1001033&quot;
		}, {
			&quot;cs_id&quot;: &quot;35&quot;,
			&quot;cs_no&quot;: &quot;1001034&quot;
		}, {
			&quot;cs_id&quot;: &quot;36&quot;,
			&quot;cs_no&quot;: &quot;1001035&quot;
		}, {
			&quot;cs_id&quot;: &quot;37&quot;,
			&quot;cs_no&quot;: &quot;1001036&quot;
		}, {
			&quot;cs_id&quot;: &quot;38&quot;,
			&quot;cs_no&quot;: &quot;1001037&quot;
		}, {
			&quot;cs_id&quot;: &quot;39&quot;,
			&quot;cs_no&quot;: &quot;1001038&quot;
		}, {
			&quot;cs_id&quot;: &quot;40&quot;,
			&quot;cs_no&quot;: &quot;1001039&quot;
		}, {
			&quot;cs_id&quot;: &quot;41&quot;,
			&quot;cs_no&quot;: &quot;1001040&quot;
		}, {
			&quot;cs_id&quot;: &quot;42&quot;,
			&quot;cs_no&quot;: &quot;1001041&quot;
		}, {
			&quot;cs_id&quot;: &quot;43&quot;,
			&quot;cs_no&quot;:     &quot;1001042&quot;
		}, {
			&quot;cs_id&quot;: &quot;44&quot;,
			&quot;cs_no&quot;: &quot;1001043&quot;
		}, {
			&quot;cs_id&quot;: &quot;45&quot;,
			&quot;cs_no&quot;: &quot;1001044&quot;
		}, {
			&quot;cs_id&quot;: &quot;46&quot;,
			&quot;cs_no&quot;: &quot;1001045&quot;
		}, {
			&quot;cs_id&quot;: &quot;47&quot;,
			&quot;cs_no&quot;: &quot;1001046&quot;
		}, {
			&quot;cs_id&quot;: &quot;48&quot;,
			&quot;cs_no&quot;: &quot;1001047&quot;
		}, {
			&quot;cs_id&quot;: &quot;49&quot;,
			&quot;cs_no&quot;: &quot;1001048&quot;
		}, {
			&quot;cs_id&quot;: &quot;50&quot;,
			&quot;cs_no&quot;: &quot;1001049&quot;
		}]
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z�>;       R  x�;                                                           �  ��:    |   �      &://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<   6               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   X码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**     t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<   0----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in   3               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   4员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   5码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    1

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   7员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   8码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    F

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<   ;               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   <员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   >码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**     ��|
|:----    |:---|:----- |-----   |
|page |是  |int |当前页   |
|pagenum |是  |int |每页数量  默认20   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;pages&quot;: 1,
		&quot;rows&quot;: [{
			&quot;mwl_id&quot;: &quot;2&quot;,
			&quot;wl_id&quot;: &quot;2&quot;,
			&quot;wl_target_num&quot;: &quot;20&quot;,
			&quot;wl_now_num&quot;: &quot;1&quot;,
			&quot;wl_status&quot;: &quot;0&quot;,
			&quot;b_id&quot;: &quot;1&quot;,
			&quot;b_name&quot;: &quot;格里兹伍德找家Grizzwold&quot;,
			&quot;b_picture&quot;: &quot;/xlb/public/book/img/reduce_7767.jpg&quot;,
			&quot;percen&quot;: 5
		}]
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z���   ?

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   9----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<   @----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in   A

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   B码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    C员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   D               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   G----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<   � �    �                    �                                            �      �                      +                    08                    �                                                   �      x���W  �                                                 0�    ��@            @�@    N�@                                       X�    ��           �j 	/�	admin1.添加心愿单eNp1UrlOw0AQrdmvmIrCwpi0oaVBQgJx1DiXwAJiIEZBYpFiCFcChAJQDsQhDKJAmIhABI7wz2R37Sq/wMabRIhjG++beftm5nkAAJAksaeMd2/SQsFzn1uNsiQBQjLQukNy18TdplmXHJ0hTvTsOq1uzUyOdVgyqDBvGMthRUmn04PauhbRF9f0qD4Y05eU9cWoktZS80okHgcVBaWEAj1/J41CIMI1JsanpqEtTwpb9KzXARaQnBxh4u74mQPMqg65zGPPrtHiMUY4LPPDR4DgJqAMWO6EOSM6q8UB06LNUcpY1ZJzgJlTpBePoyOCYegLieQvSsnxS7tNx2IHhwENAW/dPSWVS2Z9ND/zvG+kqiqgDdTXv7KmG8MxPZ4QtzCEBrrRpUQqFZnrJcT3h7F0/4TkrkQKbbZlv5UTHoiJf7rypx1yxw3uR9eH/w5/0u4asJY02pDl3mjGZNdmq3EY4n9BNNZqVIY4IFbVq90FjzpD9eziQf+05Nk2fdunpt31i1h79OWhu0yVGrHKYiZBbjq3vBTfB3aR9+/P/ZtXVs5+T4l9RAh9AeOpNcM=Z���    �  � 	5�#admin2.添加编辑孩子    
**简要描述：** 

- 添加编辑孩子

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/children-add `
  
�Q 	;�Madmin3.获取心愿单列表eNqNlMtu2kAUhteZp5huukAFh0otEn2Abiq16mVVVcEYi7gBm9pjOUqNBGnSQICQRUIDVGmi0iirUFQKSkHwMszYXvEKHXwTASp1NvY5881/ztj/DIQQgkDAuMmZV3lSrZrjn9NhIxCAAAShedTH1RoefyJ7Y1w5xYUv5uU1oLjZ7pPO7puXz1w2CGNwE6FMlGE0TQsJ2wIrpVQpLoU4Kc1sp+KMJiibTJJHMAbsgo4Cqd3iYdUWoRovnr96DWfyuLpLTv0+dCfExxUdj/etXFE3OgN8XtLNdpecHelAjwbpoBuB9psTBqEedNOUQNIWL0KdnLVpqCBZEJNQN+oDq/55MmgZxbKNAUgbG5/g5rnR+jMZlWhXIBaLQfARrN3/oEroCScleOctCsMPvGyaVxQ26U84T3eHhWN8+O2ek/IXJFjEejTVdrMZqqHMq7t5WdL89NsZ7pXVUhtC4m7Vh34lj/pfCLEy/T8boppegNdX0aKkLaPhVaSCWKQqd8FlyfhSk+EVjMimF74yuRhaB2W8fzsZVvCoT4ojfNN7Kgs7O5qUSqyQyAgcUuUFFduiGTWeEjgmLklbjJBOMjKfUDl+IxJ5HAm9zySXtDK8zPGiJ/SITmTfgbUsyM48M+clx76OWRcNvdLJQdfI1Mqehf816JKZJaEuiGgWGoc9kssbF/npsBymB8ix33TYXKcBbnXM7g97ketY/yzQpHVSN9tt0iuQfNs7DLh1QH5du7cBaXZxq+HsyYEng++0FDW68bVkXdWsy99GY29+yrlQAAB/ATgoyWk=Z��~    i = i    ����            2   H`a     ����                   =       2   A �a             �= 	5�1	admin1.获取绘本详情    
**简要描述：** 

- 获取绘本详情

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/book/getinfo `
  
**请求方式：**
- POST 

**参数：** 

|�   !�@ 	)�Aadmin	2.删除评论    
**简要描述：** 

- 删除评论

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/comment/del `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|b_id |是  |int |绘本ID   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;删除成功&quot;
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��L    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<   K----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in   L

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   O               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   P员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   M码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**     t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<
   Q----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in   R

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   S码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    T员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   U               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理    �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<�                                                     Y

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   Z----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<    �  �quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;id&quot;: &quot;1&quot;
	}
}
```

 **迎b 	5�yadmin	3.获取评论列表    
**简要描述：** 

- 获取评论列表

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/comment/get `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|b_id |是  |int |绘本ID   |
|page |是  |int |当前页   |
|pagenum |是  |int |每页数量  默认20   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;pages&quot;: 1,
		&quot;rows&quot;: [{
			&quot;c_id&quot;: &quot;3&quot;,
			&quot;c_comment_time&quot;: &quot;2018年03月02日&quot;,
			&quot;c_content&quot;: &quot;这本书真好看&quot;,
			&quot;u_id&quot;: &quot;1&quot;,
			&quot;u_nickname&quot;: &quot;&quot;,
			&quot;u_picture&quot;: &quot;\/xlb\/public\/uploa   �    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<$    �  �$�H�l � � "        �)[ 	!�ertgtd4fv4data    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http   o�)Z 	!�ertgtd4fv4data    
**简要描迶 H !#�{ertgtd4fv4data-副本    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----               �   W    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�          $   #   "   #   $��方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	    ^://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    8 8                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      q      8�ٹ�  8�ٹ�          Q      �ٹ�  �ٹ�  �9 			%�3saedfedfc默认页面### ShowDoc介绍
关于ShowDoc的介绍，请访问：[http://blog.star7th.com/2015/11/1816.html](http://blog.star7th.com/2015/11/1816.html)

### 环境依赖

#### 1、必需环境

- PHP5.3以上版本

#### 2、可选环境

- php-mysql模块、php-pdo模块、mysql数据库

- ShowDoc默认使用Sqlite数据库，数据库文件在/Sqlite目录下。PHP环境默认支持Sqlite，无需额外安装其他数�   �   a��库。如果想使用Mysql数据库，则需要安装环境并参考下文的数据库配置说明做相应配置。


##安装和配置

	
#### 1、全新安装

- 克隆或者下载代码：
[https://github.com/star7th/showdoc](https://github.com/star7th/showdoc)

- 文件夹权限
	请确保/Application/Runtime 、 /Public/Uploads 、 /Sqlite 有可写权限

#### 2、升级安装

- 下载新代码后，覆盖原来的代码。请注意保留/Public/Uploads里的文件。此目录保存着你上传的图片文件。如果你没有上传过图片，则可忽略之。
- 先备份数据库。然后在浏览器访问http://xxxx.com/index.php?s=/home/update/db ，以升级数据库结构


### 数据库

####1、Sqlite数据库 or Mysql数据库？

 ShowDoc默认使用Sqlite数据库，并且自动集成到/Sqlite目录下。用户下载代码后即可使用，无需再安装其他数据库环境（PHP环境便可支持Sqlite数据库）。
使用Sqlite数据库是为了方便，尤其对非web开发人    �  �

- 获取短信验证码

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/index/sendsms `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|userMobile |是  |str� 	)�Wadmin
4.获取钱包    
**简要描述：** 

- 获取钱包

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/getwallet`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;deposit&quot;: &quot;0&quot;,
		&quot;balance&quot;: &quot;0.00&quot;
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z�B   q q                                                                                                                                                                                                                                                                                                                                                                       � 	)�Uadmin
4.获取钱包eNp1kt1O2zAUx6/xU5zd7KJamnJbXmES08buk5aoRISGEVdFmpFaND7bEYSgoi1ioGVoVwsVBQSt1pep7eSqrzA3TiJAzDf2Of6fr58NAIAyGf6nFlzVmesGo+vJsJPJAEIKBAf31G2FRz3a3EJCFfj3rLf5+eP7WKKABksYr+ZVtVqtZs11U7etil2ws0V7RV23CmrFMdbUkoGrumUZWENRMZmGtR7o0I0yiUQf5j8twLQGdTfZSdoDkSY9/E7oaCus7RHeG9DzBgn8Pjs9IIjkFbHEEBCdpKkAUWK3UGB72SgDYae+MB28ZpZLQHh7ELa3xwOP7zUjGQLR2OiYds+59zj+2xBdIU3TAH1FM2+/VGw8V7QXDXnKw+y7xLtiOI5eSi/kHk+4e0j3f7yRrjRgUcd6oha5E6+xajsmfp4ml4bGqoJu6eXii2K5bC4WopkNtDHt+sk0EqDE9RLpqyyVGKWAmUD83xIhUyhAzDKemnz/jtXq/KI+GTZnxRNKAJNhNycM6vWC/q8oKGaWvoZwhsftwPfZ3S6r+8lzUG+H3fyO/yLr9qnXkTNJ8XjwU5QSqPlZI7xqhZe3vPPt6ZX8zgihf7e7QbU=Z�
)   d    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   e://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    c    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�    �  �                                                                                                                                       �d 	5�}admin2.获取热搜列表    
**简要描述：** 

- 获取热搜列表

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/book/ghs `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|token |否  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: [{
		&quot;sn_id&quot;: &quot;6&quot;,
		&quot;sn_name&quot;: &quot;1&quot;,
		&quot;number&quot;: &quot;2&quot;
	}, {
		&quot;sn_id&quot;: &quot;1&quot;,
		&quot;sn_name&quot;: &quot;黄军品&quot;,
		&quot;number&quot;: &quot;1&quot;
	}, {
		&quot;sn_id&quot;: &quot;2&quot;,
		&quot;sn_name&quot;: &quot;1322&quot;,
		&quot;number&quot;: &quot;1&quot;
	}, {
		&quot;sn_id&quot;: &quot;3&quot;,
		&quot;sn_name&quot;: &quot;123123&quot;,
		&quot;n   �    �  �                                                                                                                                         �j 	M�madmin2.获取绘本所在柜子列表eNqlVE1vEkEYPnd+xXjxQFxgu4UtePViYqLx42SMLAupmwJb3W0gcZtA09ZS2i4mFfmytREJidUtEUsKRP4MM7uc+AsOzLIpoCfnMvO+z/s8M+/OswMhhMDlMn+krXoG67rVvxz1yi4XBICB1nEb6YVhacfqvze7RVy9wNk0qjbwWRV9z6P9j9Z5AxC2ZbRxc/vZ4wc2lYEh+EpVN4IeTzKZdEspSZBjm3JYdoty3JOKhT1hWV73pMRYCEy2pwK4cI16+kSDSDx6+OQpHKsjfRt/cE6l0RDljzTU3x2ms5rZ7KLTnGYZLVw81oAWZMggbcHJioYM1Bg7TSqkCNRw0SBrKaFCjbZ2/x4FY3JibQ7WUadug4I6i3UuHEyV16OJKaqob6SxjlnqDkt7g27NzB5OygAk7fZPUOXUrHUGv3OkVxAKhSB4C5Zuv96U1buiHInSVRCyd6bZeFRRhDUHoLP93fbz6ODsFk05hIigCtPq50TcTisbghh9KUVmhVgf69DtwoWalYWKhBCfOxC61K38J3RURbvNQefb4LpOvOLlkN4m8wI/ElXE/+JLiiokxLkz+AKr/gDLujl+2etd9fHcAm98xXP9s343t8Lz/LIvwPGLBEGdrecC7oCf93Ecy3ltfbC09QJsje/yxh1Ts1Jrztv3r75lbNsS404N+69BKGOrUCeS0Dy4wumM+Tkz6h2y5Hehthj1Kl4SoFrTan2dkGwnOR4lyeFJyTIMfLWPM8bUpKj2Dv9s2C8BrrRQrUx7osWD7heyFTGgWc0N64Xh+S+zvHMToo8JAOAPS+Pfzg==Z�R   i    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   j://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    q://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<���用户  |

 **备注** 

- 更多返回错误代   m    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   n://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    � �                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              k            �= 	M�	admin1.获取首页显示绘本列表eNq9l21P21YUx1/Xn+L2zbQhQp5ISNnbSpumSese+mKqqsZ5UPBKbC9xFKQZKalWCJBiqlESCCUgElaJUQNj5SEkSPsqy73XftWvsONcJwO6Vc6CakXxPcfnnHt/99rXfyOEEDc0RF/njJ080TTjYv/t+drQEOI4FzIWj7G2Yu6smFt/kHKL1s5oo0zWf8OFkrH1ioM8Qz8mB0/uf/OlneRCYTShKPK4253NZkeEKYGXJjNSRBqJSkn31GTEHZGkx+6piIDCXKdn   �   u    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�    �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<  ȇ    (                        �	         r    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   s://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<�|
|:-----  |:-----|-----                              �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<�                     code        x�                x  x      .   =0�a     @���                          .   j�f                      ���         � 	5�W� 	)�Kadmin
3.获取详情    
**简要描述：** 

- 获取详情

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/getinfo`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;uid&quot;: &quot;1&quot;,
		&quot;nickname&quot;: &quot;123456&quot;,
		&quot;mobile&quot;: &quot;15517113739&quot;,
		&quot;picture&quot;: &quot;/xlb/public/upload/user/5a9908ae51472.png&quot;
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z�
2    �  �                                                                                                                                                                                                                                           	)��  	)�Aadmin
5.获取统计    
**简要描述：** 

- 获取统计

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/xul`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;borrow&quot;: 0,
		&quot;love&quot;: 1,
		&quot;comment&quot;: 0
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z�
�    7                                  @                    r                     	�            H�=                          &�             
                            3                     <                                                    �j 	5�admin
3.获取用户详情eNp1k01z0kAYx8/dT7FePDCGNKWRgl/BGR1f7oQQaaYhiZAMnTGdgWqVltr0gEwBp+oYmZ6MjFhGYeTLsJvkxFdwyYZMzehedp9nf8/L7n8XQghBKuV9bfjDJrZtf/5tOeunUhAABvpnE2R3vc4Vbk18d4hfHgHC+u4Ejw6fProfgQwswF3D0PMsW6/X0/K+LGiKqRW1tKhV2H2lyJo1qcqWJUNWn2kFEBakSXD3J5rZYR6S5uGDx0/gqgKyD/G7uA+Lmuj8rYXmR0Hj2PJGU3TZtnx3jC/OLGDlGTLIQWC4oiYDLSZyE8LQ9iQVWvjCJWbNqMpqGVpebxr0Xi+mjnd8GmIAksbmHTS49Jxfi99t0hUoFAoQvAAbt5+bmnFP1EoSXeUhd2ftrUi1mlCON+gcnbB1jk4+3KKuOKAkGMKaJrkjrymX/k7BxWERocrinipUEpW4rcw2fzfJVrSirCRJnueyHJfJZnJJXJdFw6wm+FA93SwqssiauqIJJaolL+RymzuCxHPb2a20rpYpDjYOwMHqxm7cJBWPSpWU8586MpGMRMi1gP8bJGQlCLRk1ViZ3sk1bjS9j83l7JQjz4de/nI22CQGckb++EsYFOkVvwTiDDo933XxdQs33fVTQM4b/P0q+gt4MEZOn56JwovpZ1KKyOy9bwfDbvDph9d/dXOLficAwB+TJWxOZ�	�   y    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   z://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    v    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   x://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<x|
|:-----  |:-----|-----                             ~    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   ://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    �://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    �    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�    �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<z                                                      �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<�cW<                                                �    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�    �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<w                                                     �    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   �://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<u��用户  |

 **备注** 

- 更多返回错误代    ah9UEBRtGD5M5y9PPkXOssBFLERYrrZLDtzZr45czl8ixBClEolHgalYkhIJKRm+bKxqVIhilIjIbktVn+0zos4siHl9ikwlEo1oTL39tWzjpUamdEUx3kmtNpAIKBhZhgL6/SzVlZjY13aGadVa2XZae2M1YfMVDsUQRDWz3Ej0QYBjJcvXr9BCjxOzAlrvR3wRMTJRR43w3IwyouVOt6J8VKpKqSXeIqfUMMFKaD2GxHViFd31GDhsThoxAvpEkiMm0M8vljF0UU5d0LW3RZX/zpJGmLigw24hcOTth3HTtNu8E4WQfRxXsbtQLyYqcuZr616XozG23AUggSbKby1I+Z/t/7EIDvKbDYj6jP14NEnP8s9tbF2mrxNIP1YV+uifT7YaHeB/HYqFUnihexDouo52C2cpWsN2B2tkqyvqzaM9fReNtBTv1PMO3rG3h/RoNP14nRtlAL1W8mNXVxO4EYWr8Rx/qdUyeHVAtwDrh7Gxvm9N7zbQ+HxW52MjcwG43JovbTdb6MnjY+NJs1Hj2MACfKa9NIWO1S9H82Ij0LqcXgMuvi5Kdbbb906OxAqWZyOiqnagAM3RV9lSqrUWbHaJm9WSn/N/cpqsFbS6R5ePoaxJaJiPjuG7gA3DQmOkyVpJTMiuN4w7NaXariwDqd/JPRh9y6uheVUsH/v76mrELcP6LjJZBpiQslUCqcROX2El9P4bA2XU/cfT72Vef4/xxNOlVRo4sgvKRe/33g+GbILwpewMJ8duQvjJsMQXWidBXG+Snpx/+IDs7gdToZjPtBuh16nG60ROqURxmEbIV5sCN/LGlyr4nDsjk60ywWPWWpW+au/RgGEvQhX3eSzW4lM3eExYLIug/3rAheFSQhngSgunArBkLgbumzE9cCfhDUuG1s6EHC+IlULbacO0fQoDJRyKiOVSnBYhFCpy2E4/0043u9+BmxBEzdJTsS4Vd+DUMBP4nZMLq4DmYqb89eXyJcERVF/AVlGQzA=Z���             ame&quot;: &quot;畅销类&quot;
			}]
		}, {
			&quot;id&quot;: &quot;6444&quot;,
			&quot;name&quot;: &quot;大象消防员帕尔&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_1biN.jpg&quot;,
			&quot;age_reading&quot;: &quot;3岁-6岁&quot;,
			&quot;author&quot;: &quot;小西利行&quot;,
			&quot;theme&quot;: [{
				&quot;bc_id&quot;: &quot;8&quot;,
				&quot;bc_name&quot;: &quot;情感类&quot;
			}]
		}, {
			&quot;id&quot;: &quot;6642&quot;,
			&quot;name&quot;: &quot;一头大象&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_xianglitifeng100.jpg&quot;,
			&quot;age_reading&quot;: &quot;0岁-3岁&quot;,
			&quot;author&quot;: &quot;罗杰.巴克&quot;,
			&quot;theme&quot;: []
		}]
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��   �
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|page |是  |int |当前页   |
|name |是  |int |搜索名字字段  |
|token |否  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;pages&quot;: 2,
		&quot;rows&quot;: [{
			&quot;id&quot;: &quot;200&quot;,
			&quot;name&quot;: &quot;鼠小弟和大象哥哥&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_3734.jpg&quot;,
			&quot;age_reading&quot;: &quot;3岁-6岁&quot;,
			&quot;author&quot;: &quot;中江嘉男&quot;,
			&quot;theme&quot;: [{
				&quot;bc_id&quot;: &quot;1&quot;,
				&quot;bc_name&quot;: &quot;趣味类&quot;
			}, {
				&quot;bc_id&quot;: &quot;4&quot;,
				&quot;bc_name&quot;: &quot;启蒙类&quot;
			}, {
				&quot;bc_id&quot;: &quot;12&quot;,
				&quot;bc_name&quot;: &quot;获奖书&quot;
			}, {
				&quot;bc_id&quot;: &quot;14&quot;,
				&quot;bc_n    F  F                                                            �7 	5�#admin2.添加编辑孩子    
**简要描述：** 

- 添加编辑孩子

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/children-add `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|nickname |是  |string |孩子昵称   |
|brithday |是  |string |孩子生日2014-05-06   |
|sex |是  |int |孩子性别   |
|id |否  |int |添加的时候为空，编辑的时候需要传入id   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;id&quot;: &quot;1&quot;
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z���    reduce_20850438-1_w.jpg&quot;,
			&quot;space_id&quot;: &quot;151&quot;
		}, {
			&quot;id&quot;: &quot;7&quot;,
			&quot;name&quot;: &quot;一群老鼠的童话&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_huandengpian1niY.JPG.jpg&quot;,
			&quot;space_id&quot;: &quot;152&quot;
		}, {
			&quot;id&quot;: &quot;25&quot;,
			&quot;name&quot;: &quot;Drip, Drop, Drip&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_drip01.jpg&quot;,
			&quot;space_id&quot;: &quot;153&quot;
		}, {
			&quot;id&quot;: &quot;58&quot;,
			&quot;name&quot;: &quot;戴高帽子的猫又来了&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_2358QHU.jpg&quot;,
			&quot;space_id&quot;: &quot;154&quot;
		}]
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z���    VoGsnOJzrVMEatz76tvvkFUea0/Ii96AVGbipWcqvnhq5uZUetDAGwuqoR+R8qLKqeMuOIAIdVrMdCHVZbshQuYTcaSSsg6WICpIxc1f8NwzAPznuphJXgkhumZNwIt9cxaGWDQbZeN1zedhCWmFVzLpqyUrrfbpDp1/Q3J55IXRY03HuepfubzPMo4PwcCzZyxfkR7HRchZ2gEzraQEMYFUutowV2fajRqdK3bCOAQzdbGMKxuwCO3WAkwTFw6HEfcTd+ujHzOS8mlUisVZaxx5h7veZDydBqLuBXa2p7ywhOert5mrlxDjFb4bDbVtrzUr6cvVbX9KyvbcD6xw2y/ErvYY7PXSjRD55LVR4dqv8DO2isOk8Lx9WoWWi5yu4GLpnWRZiCqZ1LX8zt0lZyKTQpTdZEIy4U7FY5lo/JHPEwp4Rv0hl/dRduQHOfFOxbTMQ9j1YXsDXtaAwOlh9B7AMQeA7ZMcbdWMXN4836RrP9PduqG/HJxtIsOLsbiYkAVe9IrC9yNf3PusL0afQ0ZfwAHk3ZQgD6O7KanzL8iD88WgisfbF5HfIVEg5ICIFI7M3TI+aeK9JWvZirtYK5CX9fbZzA3cmP5A6OvP7/dFN+qQLuh3QlfaxHsl2K7+PIanz9xeHJypv7UKOKUZ7Y/G3N4g62cfmibolCbQH4312tsrfWiaMYc0Pe73b/D1plm/gEcI72t0tUln5j+mh61PbgDKNzrmueP3d099MYacMgY9Thi1sjF3aJ5UB6eKwH6ejosgoDxw9MV0xzGTky0Cl6vwGxyoX4zuhDvAcPI04UqTLi7Q5SotPb2RvXsCXroRkGuT/2OJgpeExUPu1jQ3bcm5SzKPSV0mbK+L339VvS5b9ILs7crd/zogxVKLTK2CyZQq3cyDuLXkKlOGb88rHkuu1g6Mo3onyRaTPZkKTnN51dB18qZA8npXp+LaLPn9lf0JQSpHuLbGmFhwu7ENXYEGpesL7NMCtoTLl9hXCMdxfwNSI8HeZ���   �    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   �数据库。如果想使用Mysql数据库，则需要安装环境并参考下文的数据库配置说明做相应配置。


##安装和配置

	
### 1、全新安装

- 克隆或者下载代码：
[https://github.com/star7th/showdoc](https://github.com/star7th/showdoc)

- 文件夹权限
	请确保/Application/Runtime 、 /Public/Uploads 、 /Sqlite 有可写权限

### 2、升级安装

- 下载新代码后，覆盖原来的代码。请注意保留/Public/Uploads里的文件。此目录保存着你上传的图片文件。如果你没有上传过图片，则可忽略之。
- 先备份数据库。然后在浏览器访问http://xxxx.com/index.php?s=/home/update/db ，以升级数据库结构


### 数据库

###1、Sqlite数据库 or Mysql数据库？

 ShowDoc默认使用Sqlite数据库，并且自动集成到/Sqlite目录下。用户下载代码后即可使用，无需再安装其他数据库环境（PHP环境便可支持Sqlite数据库）。
使用Sqlite数据库是为了方便，尤其对非web开发�    
		&quot;bc_id&quot;: &quot;9&quot;,
		&quot;bc_name&quot;: &quot;认知类&quot;
	}, {
		&quot;bc_id&quot;: &quot;10&quot;,
		&quot;bc_name&quot;: &quot;亲情类&quot;
	}, {
		&quot;bc_id&quot;: &quot;12&quot;,
		&quot;bc_name&quot;: &quot;获奖书&quot;
	}, {
		&quot;bc_id&quot;: &quot;13&quot;,
		&quot;bc_name&quot;: &quot;中华传统&quot;
	}, {
		&quot;bc_id&quot;: &quot;14&quot;,
		&quot;bc_name&quot;: &quot;畅销类&quot;
	}, {
		&quot;bc_id&quot;: &quot;15&quot;,
		&quot;bc_name&quot;: &quot;游戏类&quot;
	}, {
		&quot;bc_id&quot;: &quot;16&quot;,
		&quot;bc_name&quot;: &quot;益智类&quot;
	}]
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z���                                                                                                                              �* 
- ` http://www.ixiaoluobo.com/xlb/book/xbc `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|token |否  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: [{
		&quot;bc_id&quot;: &quot;1&quot;,
		&quot;bc_name&quot;: &quot;趣味类&quot;
	}, {
		&quot;bc_id&quot;: &quot;2&quot;,
		&quot;bc_name&quot;: &quot;创意类&quot;
	}, {
		&quot;bc_id&quot;: &quot;3&quot;,
		&quot;bc_name&quot;: &quot;手工类&quot;
	}, {
		&quot;bc_id&quot;: &quot;4&quot;,
		&quot;bc_name&quot;: &quot;启蒙类&quot;
	}, {
		&quot;bc_id&quot;: &quot;5&quot;,
		&quot;bc_name&quot;: &quot;科普类&quot;
	}, {
		&quot;bc_id&quot;: &quot;6&quot;,
		&quot;bc_name&quot;: &quot;艺术类&quot;
	}, {
		&quot;bc_id&quot;: &quot;7&quot;,
		&quot;bc_name&quot;: &quot;生活习惯&quot;
	}, {
		&quot;bc_id&quot;: &quot;8&quot;,
		&quot;bc_name&quot;: &quot;情感类&quot;
	}, {   �   |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注    �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<�  �    (                        �	          ：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<ʵ称    |

 **返回示例**

``` 
  {
    &quot;er    tance&quot;: &quot;5986911.372008573&quot;,
		&quot;_long&quot;: &quot;116.3477725937&quot;,
		&quot;_lat&quot;: &quot;39.9675331303&quot;
	}, {
		&quot;_id&quot;: &quot;4&quot;,
		&quot;_name&quot;: &quot;小萝卜共享书柜03号柜&quot;,
		&quot;_desc&quot;: &quot;小萝卜共享书柜03号柜&quot;,
		&quot;_distance&quot;: &quot;5986911.372008573&quot;,
		&quot;_long&quot;: &quot;116.3477725937&quot;,
		&quot;_lat&quot;: &quot;39.9675331303&quot;
	}, {
		&quot;_id&quot;: &quot;5&quot;,
		&quot;_name&quot;: &quot;皂君庙东路甲4号院&quot;,
		&quot;_desc&quot;: &quot;12312&quot;,
		&quot;_distance&quot;: &quot;7902509.5998753905&quot;,
		&quot;_long&quot;: &quot;12.554&quot;,
		&quot;_lat&quot;: &quot;125.12&quot;
	}]
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��   ���|类型|说明|
|:----    |:---|:----- |-----   |
|long |是  |int |经度   |
|lat |是  |int |纬度   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: [{
		&quot;_id&quot;: &quot;6&quot;,
		&quot;_name&quot;: &quot;皂君庙东路甲4号院001&quot;,
		&quot;_desc&quot;: &quot;12312&quot;,
		&quot;_distance&quot;: &quot;5083305.8053850485&quot;,
		&quot;_long&quot;: &quot;123.12&quot;,
		&quot;_lat&quot;: &quot;123.214&quot;
	}, {
		&quot;_id&quot;: &quot;1&quot;,
		&quot;_name&quot;: &quot;小萝卜共享书柜&quot;,
		&quot;_desc&quot;: &quot;霍营地铁站共享绘本书柜&quot;,
		&quot;_distance&quot;: &quot;5986911.372008573&quot;,
		&quot;_long&quot;: &quot;116.3477725937&quot;,
		&quot;_lat&quot;: &quot;39.9675331303&quot;
	}, {
		&quot;_id&quot;: &quot;2&quot;,
		&quot;_name&quot;: &quot;小萝卜共享书柜1号柜&quot;,
		&quot;_desc&quot;: &quot;育新小区&quot;,
		&quot;_disT � `l�                                  ��    ��D    حD               E  � E     �@            ��@    �(A    ��@    0�@         �j 	5�	admin1.获取孩子列表    
**简要描述：** 

- 获取孩子列表

**请求URL：** 
- `    ��C 	)�I	admin1.公司信息    
**简要描述：** 

- 登陆

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/index/gci `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |--�m 	A�admin4.获取柜子空格列表    
**简要描述：** 

- 获取柜子空格列表

**�   '�Y 	A�[admin3.获取附近柜子列表    
**简要描述：** 

- 获取附近柜子列表

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/book/gcl`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必�   �       � � 	A�Sadmin2.获取绘本所在柜子    
**简要描述：** 

- 获取附近绘本所在柜子列表

**请求URL：** 
- ` http://www.ixiaoluo   &   �    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   �://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    �://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    �    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�    �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<�                     code        �                �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)    �    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�    �：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<{ 
  {
    &quot;error_code&quot;: 0,
    &quot;dat   |://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     r84zV3GuerqI+H9e64cFi63UeQEl+H0Pi7D/BLKTn/Svj2U1+GjvfagI8g6aWeQVmCbXoZtHoufBV6KsrPAw3jY9vEGgloNqdeYNH2kiezT6RXg7ZP1LbbxjTKJbj76O3fxFpdU/EUaJpbah67V4M3TqzOqyJExBbBJUgZujFZY/Q0enJstbgss/4rdX/uATVo9SZpMGC+lBK+cfSGu7cDcLr9VgKU8XL9sH6tBp9UpAKnVyNkM+RNY2uPLu7Bw8AgmE6i4L8SiHTh0hj5FTkQrx9MJ+U1he1nMbqJYpH2Een2vwexScrq0co7XYydtc1lA4/U5w3ikB0xewXRYegpbh/hu3wSyt7dPCX6jnB1xs8ddpPBJ48oRuJ5Fs1ODA0ND34LBAbP5+fCTJ18/7ARuo0EJbpMc3MljOPsnX1youTV4HcV2wMMjHPmxx2gf8afDT1+z7DNzz8hLs16jGVGAXqeR59y4Si0IorMSKp2g6CZMdSCUD3z13bM+p+t/wZbjk+HBBjrd4GNxPhFBh9lOBBCTUQlIrQyQr5wUeE35fwaDQa8Dvx5bApTfR7vdFn8HtrKRVOKUdXKypWEn5adADfYw7bbjAk5uWTCAZWJkHk5fwcglf5ypBcP1Q5yvd2DVe7WkkoxPzqpjqEJiD4MUC2lxa6Z9kDigKEpL5aw0ir6B03H4JoF3McwswPkZcWUXHXTANeuNBiUuTi8rWC+kUHhSLO/XPv3VLoodS7l/+2h1BkVrq5fjG14wLE19zIJhi9ul4otzYjmDUhtceQPO49Q/y+/nO5BlGJXEb72sJOPoBCWPMfMQ31c7sLA4RN9F+APxYIKYqLHQD9ipxKcl9nyfYf8jtVY1mDXm1k1O/W8X7lIjuRKJxlVh9pwPTwrvJm+rCRIzeonQ3lbXNLgCc0foNF/v1ODALXaNheLCCioW+fMoP1ls0muYi/AnO43fE/zaKWahkk2SMlfJ4qkwdRbW4zVPkDmruYQPmqQ/HARB/AXO5l4ZZ��   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   \----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    d\%user\\5a614c6dc356f.jpg&quot;
		}, {
			&quot;c_id&quot;: &quot;2&quot;,
			&quot;c_comment_time&quot;: &quot;2018年03月02日&quot;,
			&quot;c_content&quot;: &quot;这本书真好看&quot;,
			&quot;u_id&quot;: &quot;1&quot;,
			&quot;u_nickname&quot;: &quot;&quot;,
			&quot;u_picture&quot;: &quot;\/xlb\/public\/upload\%user\\5a614c6dc356f.jpg&quot;
		}, {
			&quot;c_id&quot;: &quot;1&quot;,
			&quot;c_comment_time&quot;: &quot;1970年01月14日&quot;,
			&quot;c_content&quot;: &quot;妈妈最爱听我讲故事了&quot;,
			&quot;u_id&quot;: &quot;1&quot;,
			&quot;u_nickname&quot;: &quot;&quot;,
			&quot;u_picture&quot;: &quot;\/xlb\/public\/upload\%user\\5a614c6dc356f.jpg&quot;
		}],
		&quot;count&quot;: &quot;3&quot;
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z���    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<%   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    �  �                                                                                                                                                                                                                        � 	)�y	admin	1.添加评论    
**简要描述：** 

- 添加评论

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/comment/add `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|b_id |是  |int |绘本ID   |
|content |是  |string |评论   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;评论成功&quot;,
	&quot;data&quot;: {
		&quot;id&quot;: &quot;2&quot;
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<'   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in   � �                                                                                                                                                                                                                                                                                                                                                                                                        �k 	/�admin2.删除心愿单eNp1UstOwkAUXTtfcVcuiLW6xa0bExONj7UVIdiIVKUGE8cEfKKgsEDDK6ixGhfGSkSNltifYWbaFb/g0CnE+JhN59x75tx7Ty8AAAoE2GPKuUvTfN6xnzqtSiAACElAMldu2SD2Ht23yek54kTHfKON3fmZSZ8lgQLLur4WlOVkMjmsbqmLWmxTC2nDS9qqvBULyUk1sSyHIzFQkFdKKNCLd9LKeyJcY3pqdg668iS/S8/7HWABSeEUE/vATR1j1rBIPYsds0lLZxjhoMQPHwG8m4ASYMkPc0ZoQQ0DpiWTo4S+ocajgJlVorWHiXHB0LWVSPwXpWy55cO2ZbDjnEdDwFu3i6RaZ8ZH+zPL+0aKogDaRgOD65uaPrakhSPiFoTRoV50NZJILEb7CfH9YSzNFMjJpUihna7st3LCAzHxT1f+tEPy3eB+9Hz47/An3a4Bq3G9C9nJK02l2VW608qN8r8gGuu0qiMcEKPhNG+9R/5Qfbt40C2WHdOkrxmaNnt+EeOIPt/7y0SrTWJUxEyC3LZueCm+D6yWde8u3OsXVtn/nhL7iBD6Aj0KNWc=Z��    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<(   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in   2 2           ��~�  � �     P�                    ��     ��                    V �     ��    �    .�    J �     ��    �    +�         -�           ��~�  h �   � ��    '�    +�                                                                                     �K 	/�S	admin1.添加心愿单    
**简要描述：** 

- 添加心愿单

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/wish/add `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|b_id |是  |int |绘本ID   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;添加心愿单成功&quot;
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z���    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<*   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    �  �                                                                                                                                                                                                                                     � 	/�U	admin1.添加心愿单eNqNlE1v0zAYx8/zpzAXDtW8Ji3jUK5ckJBAvJwQomlTrdHWBJZMLcKT2jGgaze6wzb1TWOIMCGEyMrKBqSiX6Z2klO/Am6dRlvG1PkSP4//z2P/rZ8DIYQgEnG+F93DEq3V3P7RsNeMRCAACNJTm1QOSP81Xe+TrV3AhK51Sjtrjx/c9VUIJmHWMJ4notF8Pj+nFBRJW1rRUtpcWstFC0upaF7Rs1FJlmESjLfiHejeb9KrjZuwHvfvPXwER+1JbY3uBifAPCTbW5j033jFDex0bLJfxa7VpfX3GOAEYoNZgOMZDxHEyE8zReqZIkNM6xaLdGNZURcgduw6bX+7c5srDG0xo16QNGyv8XZgm87G5lgGIDt6f4e09h3zz+BvlZ0bJJNJCF6BmesvVjTjVlqTM3yWgOLsJJvL6Lq0ECzwr38H5W1S+XCNp4ICWTKkifoJa+6nFfl8CzEo8wWqkl5UpVxoJ3JUYzcV1qaWFSMrSy/Pa2OCGEeCiIR4WK9nClN2v2BxnvwoiYNfX2m7zBNgZnUWXu4ndmU/buX4yn5uIGEeCTen+olN9RMf+RFChp6C1REEZ+DgxHI+wwz/F17ks8vonVB72WAlI8YgVlRjFDqVE1osOQelYW9TZG+G8zTstQQWELPjdj+Pi3wEA7hZ0ttpuJZFT8q0ZE3oJuY7evxl8vRbXWI2uScuHtif2FaMXKdd9Q73vI8/neb62SX+9wAA/AO3n8RhZ���    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<2   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    �  �                                                                                                                                                                                       � B !#�{ertgtd4fv4data-副本    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----               �    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<3   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in   7 78    ��8    �z8    x{8                            Y       Y       �{8            �{8    �8     {8    �{8                            Y       Y       |8            �{8    H�8    x{8    (|8                            Y       Y       p|8            @|8    x�8    �{8    �|8           �F 	)�O	admin
1.修改昵称    
**简要描述：** 

- 修改昵称

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/xum`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|nickname |是  |string |用户昵称   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;评论成功&quot;
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z�&    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<5   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    �  �                                                                                                                                   �p 	)�!admin
2.修改头像    
**简要描述：** 

- 修改头像

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/xup`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;type&quot;: &quot;image/png&quot;,
		&quot;name&quot;: &quot;back.png&quot;,
		&quot;size&quot;: 1483,
		&quot;path&quot;: &quot;/xlb/public/upload/user/5a9908ae51472.png&quot;
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<7   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---     ~    1       1       ؀<                          1       1       �<                          1       1        � 	/�5	admin1.添加心愿单    
**简要描述：** 

- 添加心愿单

**请求URL：** 
- ` http://www.ixiaoluobo.co   �p
 	;�	admin1.获取首页书列表    
**简要描述：** 

- 获取首页书列表

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/book/xbi `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|page |是  |int |当前页   |
|pagenum |是  |每页数量 默认20  |
|status |是  |int |书状态 1：可借、2：已借出  |
|token |否  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;pages&quot;: 1,
		&quot;rows&quot;: [{
			&quot;id&quot;: &quot;6&quot;,
			&quot;name&quot;: &quot;大大行,我也行-湖北&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/   �    =1 =                            Y       Y       �~8 �f 	;�{admin3.获取心愿单列表    
**简要描述：** 

- 获取心愿单列表

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/wish/get `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说�   =  �L 	/�Sadmin2.删除心愿单    
**简要描述：** 

- 删除心愿单

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/wish/del `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|b_id |是  |int |绘本ID   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;删除心愿单成功&quot;
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<9   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    �  �                                                                                                                                                                                       � F !#�{ertgtd4fv4data-副本    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----               �    t(11)     |否   | 0  |   注册时间  |

- 备注：无


    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


cW<:   �               |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代   �码请看首页的错误代码描述



    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


    
**简要描述：**    �

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:---   �----    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |in    �  �                                                                                                                                                                                       � G !#�{ertgtd4fv4data-副本    
**简要描述：** 

- 用户注册接口

**请求URL：** 
- ` http://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----               �       �   f   /   ]   ~   S   �   �   4   �   .   3   �   �   �   e   a   }   b      �   |   �   K   2   1   0   �   A   @   �   �   �   �   g   -   ?   >   <   ;   �   �   5   6   7   8   9   :   B   C   D   E   F   G   T   \   R   Z   Y   X               �   �   L   M   N   O   P   Q   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   �   ^   q   �   �   �   �   ,   �   �   {   z   �   �   �   r   �   �   �   �   j   v   o   n   `   k   l   m   s   t   u   U   V   W   f   c   d   y   x   w   �   �   h   &   h   g   �   �   �      &   %   �   �   �   �   �   �      !   J   �   =   I   [   �   �   �   �   �   �   �   �   �   �   �   �   �   �   p      �   �   �   �   �   �   �   �   �   �      a   a   a   �   �-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理   �    |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备注：无



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     |否	|	 |	           |
|username |varchar(20) |否	|    |	 用户名	|
|password |varchar(50) |否   |    |	 密码		 |
|name     |varchar(15) |是   |    |    昵称     |
|reg_time |int(11)     |否   | 0  |   注册时间  |

- 备�   �://xx.com/api/user/register `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|username |是  |string |用户名   |
|password |是  |string | 密码    |
|name     |否  |string | 昵称    |

 **返回示例**

``` 
  {
    &quot;error_code&quot;: 0,
    &quot;data&quot;: {
      &quot;uid&quot;: &quot;1&quot;,
      &quot;username&quot;: &quot;12154545&quot;,
      &quot;name&quot;: &quot;吴系挂&quot;,
      &quot;groupid&quot;: 2 ,
      &quot;reg_time&quot;: &quot;1436864169&quot;,
      &quot;last_login_time&quot;: &quot;0&quot;,
    }
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|groupid |int   |用户组id，1：超级管理员；2：普通用户  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述



    
-  用户表，储存用户信息

|字段|类型|空|默认|注释|
|:----    |:-------    |:--- |-- -|------      |
|uid	  |int(10)     umber&quot;: &quot;1&quot;
	}, {
		&quot;sn_id&quot;: &quot;4&quot;,
		&quot;sn_name&quot;: &quot;12312&quot;,
		&quot;number&quot;: &quot;1&quot;
	}, {
		&quot;sn_id&quot;: &quot;5&quot;,
		&quot;sn_name&quot;: &quot;12312344&quot;,
		&quot;number&quot;: &quot;1&quot;
	}, {
		&quot;sn_id&quot;: &quot;7&quot;,
		&quot;sn_name&quot;: &quot;2&quot;,
		&quot;number&quot;: &quot;1&quot;
	}, {
		&quot;sn_id&quot;: &quot;8&quot;,
		&quot;sn_name&quot;: &quot;3&quot;,
		&quot;number&quot;: &quot;1&quot;
	}, {
		&quot;sn_id&quot;: &quot;9&quot;,
		&quot;sn_name&quot;: &quot;4&quot;,
		&quot;number&quot;: &quot;1&quot;
	}, {
		&quot;sn_id&quot;: &quot;10&quot;,
		&quot;sn_name&quot;: &quot;5&quot;,
		&quot;number&quot;: &quot;1&quot;
	}]
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��    public/book/img/reduce_6022.jpg&quot;
		}, {
			&quot;id&quot;: &quot;44&quot;,
			&quot;name&quot;: &quot;舒克和贝塔历险记&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_5877.jpg&quot;
		}, {
			&quot;id&quot;: &quot;50&quot;,
			&quot;name&quot;: &quot;唐老鸭的彩色世界&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_3722.jpg&quot;
		}, {
			&quot;id&quot;: &quot;51&quot;,
			&quot;name&quot;: &quot;Rosie's Walk-母鸡萝丝去散步&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_785.jpg&quot;
		}, {
			&quot;id&quot;: &quot;53&quot;,
			&quot;name&quot;: &quot;米菲装鬼&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_3144.jpg&quot;
		}]
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��   �quot;: &quot;29&quot;,
			&quot;name&quot;: &quot;史努比,我很快就回家&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_+WGVssJL._SL500_.jpg&quot;
		}, {
			&quot;id&quot;: &quot;30&quot;,
			&quot;name&quot;: &quot;我们一起跳舞吧&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_AMZJ6hkL._SL500_.jpg&quot;
		}, {
			&quot;id&quot;: &quot;31&quot;,
			&quot;name&quot;: &quot;宝贝手指谣&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_2098.jpg&quot;
		}, {
			&quot;id&quot;: &quot;32&quot;,
			&quot;name&quot;: &quot;The Very Hungry Caterpillar&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_1813.jpg&quot;
		}, {
			&quot;id&quot;: &quot;34&quot;,
			&quot;name&quot;: &quot;Where The Wild Things Are 野兽出没的地方&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_2421.jpg&quot;
		}, {
			&quot;id&quot;: &quot;42&quot;,
			&quot;name&quot;: &quot;野猫的首领&quot;,
			&quot;picture&quot;: &quot;/xlb/    � 8 �    Y       h�8            8�8    ��8    Ȩ8    x�8                            Y       Y       ��8            ��8    ��8     �8    Щ8                            Y       Y       ��Z 	/�m		admin1.搜索书列表eNq1VltPGlEQfu7+itOXPhC5E9vYv9C0TS9PTSO3LW4FlsISTLomYKUFQUFFBbUiF   ��= 	;�%admin2.获取分类书列表eNqtWFtTIkcUft75Fb0vycaIMCAC5slsttZskay1u1krSaWUyxRMuAxhoDQVrEITBQSFbBTv7iIXNa7iHRTUPzM90/PkX0jDALWaS80EpqZmuk+f7v5OT/c55xsAACC6uoSDMCpM8skkujm8ra52dQGCUAE0X4LJNIzOCEcV7qIAo0sos0NgdVQs8UdT37wwN3RVYBQ4AwFfv1o9NjbWQ4/TFsYdZKxMj43xqMfdVrWVYVzqcSsNRon6hNIIfPoCVpP1QfAYQ89fvgK14WFyil9s4QhJVZiaC8GbaTEcC2E4cDMeQsVTfnk+RIT6VfjChoB6SaqqQEjVEGMNn8VBgRC/XMQ12hsAIXj1B4zNiZkzqd1qG6HtdxXqVn/5Rb05wLgoL5alCrjKBvy01wFCwkpFXJnhKjkhlqiPQgBs180CXNsUcpfcdRwbRYyOjgLiF+LBRz8FmcBnNsZOSaV+QHY3pR6KZTG+ZoP0bixQNAVn3z6URK0OdkvA0tTGYzekNRvZpthg7G41+Jmxlvz7mn5DTtvvTqlrTdPU8Fo892Bx5bSwmODXYzC3CnPbf+vho22BoP9ep/oO8AWtbtombQTa41D7KXvQRo0Y9Rptz48+h6SJB5roBv+BsVcGRphLC+8WhNw1V76C2UM+XkXFC   �            7   E��a     ��G                   =       7   A �b             �G    ����          7   c`a    �~ 	�Iadmin2.登陆    
**简要描述：** 

- 登陆

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/index/login `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|userMobile |是  |string |用手机号   |
|smsCode |是  |string |短信验证码   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;登录成功!&quot;,
	&quot;data&quot;: {
		&quot;token&quot;: &quot;WGgwTTVuWVVlQ0k9&quot;,
		&quot;firstlogin&quot;: false,
		&quot;logo&quot;: &quot;/xlb/public/upload/user/5a614c6dc356f.jpg&quot;
	}
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Zw�%   8 8 R    X                                   d     h                 � 	M�E	admin1.获取首页显示绘本列表    
**简要描述：** 

- 获取首页显示绘本列表

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/book/xbi `
  
**请求方式：**
- POST 

**参数：** 

   ��E 	)�Kadmin3.删除孩子    
**简要描述：** 

- 删除孩子

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/children-del `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |int |孩子id   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��R   �e&quot;: &quot;我的家Lala布书&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_9251199-1_e.jpg&quot;
		}, {
			&quot;id&quot;: &quot;15&quot;,
			&quot;name&quot;: &quot;雨天梦工场&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_7323.jpg&quot;
		}, {
			&quot;id&quot;: &quot;20&quot;,
			&quot;name&quot;: &quot;女巫温妮(双语版)&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_7602.jpg&quot;
		}, {
			&quot;id&quot;: &quot;23&quot;,
			&quot;name&quot;: &quot;神秘飞艇&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_5547Lk5.jpg&quot;
		}, {
			&quot;id&quot;: &quot;26&quot;,
			&quot;name&quot;: &quot;Chicka Chicka Boom Boom 叽喀叽喀碰碰&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_1446.jpg&quot;
		}, {
			&quot;id&quot;: &quot;28&quot;,
			&quot;name&quot;: &quot;快乐的万圣节HAPPY HALLOWEEN!&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_1487.jpg&quot;
		}, {
			&quot;id&   �|是  |int |分类ID  |
|token |否  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: {
		&quot;pages&quot;: 78,
		&quot;rows&quot;: [{
			&quot;id&quot;: &quot;3&quot;,
			&quot;name&quot;: &quot;世界有多大&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_8502.jpg&quot;
		}, {
			&quot;id&quot;: &quot;4&quot;,
			&quot;name&quot;: &quot;外研社丽声拼读故事会(第一级至第六级套装)&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_engpindugushihui.jpg&quot;
		}, {
			&quot;id&quot;: &quot;5&quot;,
			&quot;name&quot;: &quot;mars needs moms&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_tu20150906191635.jpg&quot;
		}, {
			&quot;id&quot;: &quot;6&quot;,
			&quot;name&quot;: &quot;大大行,我也行-湖北&quot;,
			&quot;picture&quot;: &quot;/xlb/public/book/img/reduce_20850438-1_w.jpg&quot;
		}, {
			&quot;id&quot;: &quot;11&quot;,
			&quot;nam    http://www.ixiaoluobo.com/xlb/user/children-list `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|token |是  |string |登陆令牌   |

 **返回示例**

``` 
{
	&quot;code&quot;: 1,
	&quot;message&quot;: &quot;请求成功!&quot;,
	&quot;data&quot;: [{
		&quot;id&quot;: &quot;1&quot;,
		&quot;nickname&quot;: &quot;小明&quot;,
		&quot;brithday&quot;: &quot;2013-01-03&quot;,
		&quot;sex&quot;: &quot;1&quot;,
		&quot;age&quot;: &quot;5岁1个月&quot;
	}, {
		&quot;id&quot;: &quot;2&quot;,
		&quot;nickname&quot;: &quot;小芳&quot;,
		&quot;brithday&quot;: &quot;2014-05-06&quot;,
		&quot;sex&quot;: &quot;2&quot;,
		&quot;age&quot;: &quot;3岁10个月&quot;
	}]
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |int   |状态码，1：成功；0：失败  |
|message |string   |错误消息  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


Z��   � U��          Ȏ@    ��@    ��@    8�?                  �7 	5�#admin2.添加编辑孩子    
**简要描述：** 

- 添加编辑孩子

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/user/children-add `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|nickname |是  |string |孩子昵称   |
|brithday |是  |string |孩子生日2014-05-06   |
|sex�	 	/�M	admin1.搜索书列表    
**简要描述：** 

- 搜索书列表

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/book/xbs `   ��& 	;�{admin2.获取分类书列表    
**简要描述：** 

- 获取分类书列表

**请求URL：** 
- ` http://www.ixiaoluobo.com/xlb/book/xb `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|page |是  |int |当前页   |
|bc_id    ��d 	5�	admin1.获取分类列表    
**简要描述：** 

- 获取分类列表

**请求URL：*   �