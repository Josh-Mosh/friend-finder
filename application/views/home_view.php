<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login_register.css">
</head>
<body>
	<div id='container'>
		<div id='header'>
			<?php 
			$logged_user = $this->session->userdata('user');
			$users = $this->session->userdata('users');
			$friends = $this->session->userdata('friends');
			echo "<h3>".$logged_user['first_name']. ' ' .$logged_user['last_name']."</h3>";
			echo "<h3>".$logged_user['email']."</h3>";

			 ?>
			<a href='<?= base_url('login/logout') ?>'>Logout</a>
		</div>
		<div id='content'>
			<h1>List of Friends</h1>
			<?php 
			// var_dump($this->session->all_userdata());
			if(!empty($friends))
			{ 
			?>
			<table>
				<th>Name</th>
				<th>Email</th>
				<tbody>
			<?php 
				
					foreach($friends as $friend)
					{
			?>
						<tr>
							<td><?= $friend['first_name'] . ' ' . $friend['last_name'] ?></td>
							<td><?= $friend['email'] ?></td>
						</tr>
			<?php
					}
			}
			else
			{
				echo "<h4>You should add some friends</h4>";
			}
			 ?>
				</tbody>
			</table>
			<h1>List of Users who subscribed to Friend Finder:</h1>
			
			<table>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
				<tbody>
			<?php 
				
				foreach($users as $user)
				{
						if(!empty($friends) && $user['id'] !== $friend['id'])
						{
?>							<tr>
							<td> <?=  $user['first_name'] . ' ' . $user['last_name'] ?> </td>
							<td> <?=  $user['email'] ?> </td>
							<td>
								<form action='<?= base_url('home/add_friend') ?>' method='post'>
									<input type='hidden' name='friend_id' value='<?= $user['id'] ?>'>
									<input type='hidden' name='user_id' value='<?= $logged_user['id'] ?>'>
									<input type='submit' value='Add as Friend'>
			 					</form>
		 					</td>
							<tr>
<?php  
						}
				}
?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>