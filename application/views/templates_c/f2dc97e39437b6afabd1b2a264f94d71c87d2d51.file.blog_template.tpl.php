<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-01-16 12:54:53
         compiled from "/users/a999998/public_html/exame/application/views/templates/blog_template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8150622655c3dce127d0cb4-05824994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2dc97e39437b6afabd1b2a264f94d71c87d2d51' => 
    array (
      0 => '/users/a999998/public_html/exame/application/views/templates/blog_template.tpl',
      1 => 1547642334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8150622655c3dce127d0cb4-05824994',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c3dce1282ef30_24479523',
  'variables' => 
  array (
    'image_url' => 0,
    'menu1' => 0,
    'menu2' => 0,
    'form_validation' => 0,
    'post_url' => 0,
    'blog_id' => 0,
    'content' => 0,
    'index_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3dce1282ef30_24479523')) {function content_5c3dce1282ef30_24479523($_smarty_tpl) {?><!DOCTYPE html>
<html>
<title>Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<body class="w3-container">

<div class="w3-image">
  <img src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
" > 
</div>

<header class="w3-topnav w3-blue">

	<div class="w3-half" style="text-align:left;">
	 <?php echo $_smarty_tpl->tpl_vars['menu1']->value;?>

	</div>
	<div class="w3-half" style="text-align:right;">
	<?php echo $_smarty_tpl->tpl_vars['menu2']->value;?>

	</div>

</header>

<div class="w3-red" style="text-align:center;">

    <h3><?php echo $_smarty_tpl->tpl_vars['form_validation']->value;?>
</h3>

</div>

</br>


<form class="w3-form w3-card-4" method="post" action="<?php echo $_smarty_tpl->tpl_vars['post_url']->value;
echo $_smarty_tpl->tpl_vars['blog_id']->value;?>
">

 <div  style="text-align:center;"> 
   <textarea name="blog"   rows="5" cols=60"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
	</textarea>
</div>

  <h3 style="text-align:center;">
  <input class="w3-btn w3-green w3-round-large" name="submit" type="submit" value="Go" />
<a href="<?php echo $_smarty_tpl->tpl_vars['index_url']->value;?>
">
  <input class="w3-btn w3-red w3-round-large"type="button" value="Cancel" />
</a>
</h3>

</form>


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
<?php }} ?>
