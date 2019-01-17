<!DOCTYPE html>
<html>
<head>
	<title>Friends</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="w3-container">

<div class="w3-image">
  <img src="{$image_url}" >
</div>


<header class="w3-topnav w3-blue">

<div class="w3-half" style="text-align:left;">
 {$menu1}
</div>
<div class="w3-half" style="text-align:right;">
 {$menu4} {$menu2}  {$welcome} 
</div>

</header>


</br>

<div class="w3-container">
  <h2>Friends</h2>
</div>

<div class="w3-row">
  <div class="w3-container w3-half ">
    <div class="w3-card-4">
	    <header class="w3-container w3-blue">
          <h3>Friends (click to unfriend!)</h3>
       </header>
	       {foreach $friends as $friend}
					<p><a href="{$base_url}blog/unfriend/$friend.friend_user_id">{$friend.name} ({$friend.email})</a></p>
        {/foreach}
			</div>
  </div>
  <div class="w3-container w3-half ">
	<div class="w3-card-4">
	   <header class="w3-container w3-blue">
			<h3>Users (click to make friend!)</h3> 
       </header>
       {foreach $users as $user}
          <p><a href="{$base_url}blog/makefriend/$user.id">{$user.name} ({$user.email})</a></p>
        {/foreach}
    	</div>
  </div>
</div>


<br />
<br />

<footer class="w3-padding-large">

<div class="w3-half"  style="text-align:left;">
 &copy; 2019 Desenvolvimento de Aplica&ccedil;&otilde;es Web
</div>
<div class="w3-half" style="text-align:right;">
 Designed by <a href="#">Aluno</a>
</div>

</footer>




</body>
</html>
