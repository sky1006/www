<{config_load file="sns.conf" section="index"}>

<{* <{$smarty.get.username}><br>

 <{$smarty.session.hello}><br> *}>
<{$var}><br>
<{strtoupper($var)}><br>
<{ucwords($var)}><br>
-----------------------------<br>
<{* 变量调节器
<{$var|函数名:参数2:参数3:参数4}><br>
*}>
<{$var|upper}><br>
<{$var|upper|truncate:"30"}><br>
<{$var|capitalize}><br>
<{$var|cat:"demo test!!"}><br>
<{$var|count_words}><br>

<{$smarty.now}><br>
<{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}><br>

<{$var2|default:"数据库中没有数据"}><br>
<{$var|regex_replace:"/\d/":"#"}><br>
<{$var|spacify:"@"}><br>
<{$var|truncate:33:"...":true}><br>
<{$var3|truncate:11:true}><br>

<{*<{fontstyle($var)}><br>
<{fontstyle($var,5,"red")}><br>*}>

<{$var|mystyle:7}><br>
<{$var|mystyle:7:"blue"}><br>

<{$var|myucword}><br>
<{$var|zzreplace:'/\d/':"#"}><br>

<{*<input type="text" name="username" value="this is a demo" size="10" />
<{funname args="" args1="" args2=""}><br>


<font color="red" font-size="7">
    this is a demo
</font>

<{funname args="",args1=""}>
    this is a demo
<{/funname}>*}>

<{html_select_date start_year="2000" end_year="2020"}><br>

<{html_table loop=$data}><br>
<{html_table loop=$data cols="4"}><br>
<{html_table loop=$data cols="4" table_attr='border="0"'}><br>
<{html_table loop=$data cols="first,second,third,fourth" tr_attr=$tr }><br>

