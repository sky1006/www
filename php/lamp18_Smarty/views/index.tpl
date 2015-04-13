<{$var}><br>

title:<{$title}><br>
author:<{$author}><br>
content:<{$content}><br>

<{$yz->name}> <br>
<{$yz->sex}> <br>

<{$yz->say()->eat()}><br>

<{$arr1[0]}> <br>
<{$arr1[1]}> <br>
<{$arr1[2]}> <br>

<{$arr2['hello'][0]}> <br>
<{$arr2['hello'][1]}> <br>
<{$arr2['hello'][2]}> <br>

<{* 如果是使用数组中的关联数组，可以和PHP的访问方式相同，但建议使用Smarty中的格式 $arrname.key *}>
<{$arr2.hello[0]}> <br>
<{$arr2.hello[1]}> <br>
<{$arr2.hello[2]}> <br>