<?php exit;?>
<sql>
	<time>2018-06-06 13:48:59</time>
	<ip>127.0.0.1</ip>
	<user>text88</user>
	<php>/company/list.php</php>
	<querystring></querystring>
	<message>		<query>select userid as id,company as title,company,telephone,areaid,comaddress as address,'aijiacms_company' as modtype ,level from aijiacms_company WHERE 1 union all select userid as id,truename as title,company,mobile as telephone,areaid,address,'aijiacms_member' as modtype , '1000' as level from aijiacms_member WHERE 1 union all select itemid as id,title,company,telephone,areaid,address,'aijiacms_newhouse_6' as modtype ,'1000' as level from aijiacms_newhouse_6 WHERE status=3  union all select itemid as id,title,company,telephone,areaid,address,'aijiacms_rent_7' as modtype ,'1000' as level from aijiacms_rent_7 WHERE 1 union all select itemid as id,title,company,telephone,areaid,address,'aijiacms_sale_5' as modtype ,'1000' as level from aijiacms_sale_5 WHERE 1order by level asc  LIMIT 0,10</query>
		<errno>0</errno>
		<error>You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'by level asc  LIMIT 0,10' at line 1</error>
		<errmsg>MySQL Query Error</errmsg>
</message>
</sql>