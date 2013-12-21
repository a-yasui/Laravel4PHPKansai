<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>

	<div><?php echo Auth::user()->name; ?>さん</div>
	<div><a href="/logout">ログアウト</a></div>

<h1>ようこそBLog</h1>


<?php foreach ($errors->all('<li>:message</li>') as $message): ?>
	<?php echo $message;?><br />
<?php endforeach ?>

<?php if (Blog::where("user_id", $user->id)->count() == 0): ?>
<p>新規にBlogをつくりませう</p>
<?php else: ?>
<?php endif ?>

<form action="" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<input type="text" name="title" value="" />
	<button type="submit">作成!!</button>
</form>

</body>
</html>
