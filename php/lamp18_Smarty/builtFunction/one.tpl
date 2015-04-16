<{$var}><br>

<{assign var="one" value="hello PHP"}><br>

<{$one}><br>
<{$one}><br>
<{$one}><br>

<{assign var="two" value="hello Java"}><br>
<{$two}><br>
<{$two}><br>

<{$three="aaaaaaa"}><br>
<{$three}><br>

<{$four[]=1}><br>
<{$four[]=2}><br>

<{$four[0]}><br>
<{$four[1]}><br>

<{$four.aa.bb=10}><br>
<{$four.aa.bb}><br>

<{append var="four" value="5555" index="cc"}><br>
<{$four.cc}><br>

<{$five=$four[1]+10}><br>
<{$five}><br>

<{$five++}><br>
<{$five++}><br>
<{$five++}><br>
<{$five++}><br>

