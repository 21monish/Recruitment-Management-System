<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT u.*,uc.status_label FROM users u inner join user_category uc on uc.id = u.type where u.id =".$_GET['id']);
//SELECT  a.*,v.position FROM application a inner join vacancy v on v.id = a.position_id where a.id=".$_GET['id']
foreach($user->fetch_array() as $k =>$v){
	$$k = $v;
}
}
$rs = $conn->query("SELECT * FROM user_category where status = 1 ");
	while($row=$rs->fetch_assoc()){
		$stat[$row['id']] = $row['status_label'];
	}
?>
<div class="container-fluid">
	
	<form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($name) ? $name: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($username) ? $username: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="<?php echo isset($password) ? $password: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="type">User Type</label>
			<select name="type" id="type" class="custom-select">
					<?php foreach($stat as $k => $v): ?>
						<option value="<?php echo $k ?>" <?php echo isset($type) && $type == $k ? "selected" : '' ?>><?php echo $v ?></option>
					<?php endforeach; ?>
				<!-- <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option>
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>>Staff</option> -->
			</select>
		</div>
	</form>
</div>
<script>
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},2500)
				}
				else
				{
					alert_toast("User Already Exest",'danger');
					setTimeout(function(){
						location.reload()
					},2500)
				}
			}
		})
	})
</script>