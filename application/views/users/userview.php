<table>
<tr>
  <td>ID</td>
  <td>Name</td>
  <td>Email</td>
</tr>

<?php foreach ($users as $user): ?>
<tr>
  <td><?php echo $user->user_id ?></td>
  <td><?php echo $user->user_fname . " " . $user->user_lname ; ?></td>
  <td><?php echo $user->user_email ; ?></td>
</tr>
<?php endforeach; ?>
</table>