<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" media="screen" type="text/css" title="SYScss" href="../css/fonts.css" />
<style>
/*body {background-color: powderblue;}*/
h1   {color: blue;}
p    {color: red;}
#rectangle1 { width:11px; height:11px; background: #88AA88; margin-right: 3px; display: inline-block; }
#rectangle2 { width:11px; height:11px; background: #AACCAA; margin-right: 3px; display: inline-block; }
#rectangle3 { width:11px; height:11px; background: #AABBBB; margin-right: 3px; display: inline-block; }
/*#legob1 { width:100px; height:100px; background: #AABBBB; margin-right: 3px; display: inline-block; }*/
#legob1 { width:100px; height:140px; background: white; margin-right: 0px; display: inline-block; opacity: 0.5; }
#legob1 #legobody { position: relative; top: 40px; left:20px; width:100px; height:100px; background: #AABBBB; display: inline-block; border: 0px solid black; }
#legob1 #legostud { position: relative; top: -84px; left: 40px; width: 60px; height: 20px; background: #AABBBB; display: inline-block; border: 0px solid black; }

#customfont { font-family: 'Montserrat', sans-serif; }
p { font-family: 'Oswald', sans-serif; }
h1 { font-family: 'Cardo', serif; }

#righttext { width: 50%; margin-left: 50%; }
#lefttext { float: left; width: 50%; margin-right: 10px; }
#overall { width: 50%; margin-left: 25%; }

</style>
</head>
<body>

<h1>Progress pad github-style test</h1>
<div id="overall">
<div id="lefttext">
<p>
<?php

echo "<span id=\"customfont\">Lego studs:</span><br />";
for($i = 1 ; $i < 3 ; $i++)
{
    $opacity = 1.0;
    echo '<div id="legob1" style="opacity: '.$opacity.';"><span id="legobody"></span><span id="legostud"></span></div>';
    if( !($i % 7) ){ echo '<br />'; }
}
echo "<br />";
echo "Squares:<br />";
for($i = 1 ; $i < 141 ; $i++)
{
    $opacity = (240-$i) / 240;
    echo '<div id="rectangle1" style="opacity: '.$opacity.';"></div>';
    if( !($i % 7) ){ echo '<br />'; }
}
echo "<br />";
for($i = 1 ; $i < 141 ; $i++)
{
    $opacity = (240-$i) / 240;
    echo '<div id="rectangle2" style="opacity: '.$opacity.';"></div>';
    if( !($i % 7) ){ echo '<br />'; }
}
echo "<br />";
for($i = 1 ; $i < 141 ; $i++)
{
    $opacity = (240-$i) / 240;
    echo '<div id="rectangle3" style="opacity: '.$opacity.';"></div>';
    if( !($i % 7) ){ echo '<br />'; }
}


?>
</p>
</div>
<div id="righttext">
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum iaculis ex, ac vulputate sapien dignissim a. Vestibulum fermentum vehicula velit, pulvinar mollis massa mollis et. Duis nunc lectus, viverra nec lorem quis, congue congue orci. Maecenas dignissim nunc viverra nisi convallis, at pulvinar ex vulputate. In porttitor sapien quis justo varius consectetur. Pellentesque id lorem id velit porttitor interdum. Aliquam rhoncus ullamcorper erat, in sagittis purus.
<br />
<br />

Etiam vulputate imperdiet aliquet. Ut cursus aliquet iaculis. Donec maximus, tellus ut consectetur ornare, libero orci luctus ipsum, eu euismod tortor enim quis lectus. Aenean lobortis sem sit amet aliquam tincidunt. Nam elementum ullamcorper nulla rhoncus accumsan. Duis pretium aliquam lacus non euismod. Cras ullamcorper mi massa, ac mollis nisl tempor tincidunt. Mauris non suscipit neque.
<br />
<br />
Quisque a leo nibh. Maecenas viverra dui neque. Nunc ullamcorper turpis turpis. Curabitur ut nisl non erat fringilla volutpat. Sed gravida nunc id efficitur molestie. Cras elementum ligula ac consequat tincidunt. Morbi rhoncus turpis a mi egestas hendrerit. Donec tempor dapibus urna eu tempor. Ut mollis mollis est quis tempus. Donec nibh risus, blandit vel euismod vel, faucibus sed lorem. Duis scelerisque viverra augue sit amet faucibus. Ut euismod dapibus metus, non facilisis sem convallis sit amet. Aliquam vehicula ligula sed mi euismod, nec suscipit risus varius. Etiam bibendum nunc quis eros sollicitudin rutrum.

<br />
<br />
<span id="customfont">
Sed sagittis cursus condimentum. Donec volutpat velit neque, in molestie nunc tempus quis. Aliquam bibendum quam nec leo finibus sagittis. Vestibulum eget efficitur massa, non placerat urna. Fusce velit turpis, dignissim in mauris quis, porttitor sagittis elit. Nunc et lacus vitae libero condimentum eleifend non sit amet nibh. Proin ultrices id urna at commodo. Donec gravida lorem vel elementum viverra. Proin ex sapien, vestibulum eget efficitur et, sollicitudin et tellus. Vestibulum ut ex dui. Vestibulum sit amet ligula sed augue dapibus viverra. Fusce sodales, augue quis scelerisque malesuada, nunc quam iaculis diam, vulputate pretium tellus orci at tellus. Duis viverra tortor augue, iaculis malesuada odio sollicitudin vitae. Nullam pretium rhoncus tincidunt. Aenean in mollis enim, a efficitur mi.
<br />
<br />
Integer vel nisl in est cursus ultricies non vel eros. Nulla sagittis dictum libero nec vestibulum. Integer lobortis, neque id tempor fermentum, risus nibh ultricies eros, ut porttitor velit orci in augue. Maecenas accumsan, tellus eu commodo dictum, mauris felis tincidunt lacus, a euismod ligula sapien ac eros. Curabitur condimentum velit in tellus sagittis, non rutrum dui ultrices. Duis non sagittis erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In et semper orci. Donec id mauris sed massa laoreet cursus ac ac erat. Cras vitae imperdiet lorem. Aenean congue consequat dictum. Nulla id sem tempor enim lacinia sollicitudin.
</span>

</p>
</div>
</div>
</body>
</html> 

