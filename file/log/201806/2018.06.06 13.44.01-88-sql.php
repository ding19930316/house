<?php exit;?>
<sql>
	<time>2018-06-06 13:44:01</time>
	<ip>127.0.0.1</ip>
	<user>text88</user>
	<php>/company/list.php</php>
	<querystring></querystring>
	<message>		<query>select userid as id,company as title,company,telephone,areaid,comaddress as address,'aijiacms_company' as modtype from aijiacms_company WHERE 1 order by level desc union all select userid as id,truename as title,company,mobile as telephone,areaid,address,'aijiacms_member' as modtype  from aijiacms_member WHERE 1 union all select itemid as id,title,company,telephone,areaid,address,'aijiacms_newhouse_6' as modtype  from aijiacms_newhouse_6 WHERE status=3  union all select itemid as id,title,company,telephone,areaid,address,'aijiacms_rent_7' as modtype  from aijiacms_rent_7 WHERE 1 union all select itemid as id,title,company,telephone,areaid,address,'aijiacms_sale_5' as modtype  from aijiacms_sale_5 WHERE 1 LIMIT 0,10</query>
		<errno>0</errno>
		<error>Incorrect usage of UNION and ORDER BY</error>
		<errmsg>MySQL Query Error</errmsg>
</message>
</sql>