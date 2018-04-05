<?php
    if(isset($users) )
    {


?>

<h2>Voici les utilisateurs enregistrés : </h2>
<hr/>
<table class="users-table">
   <tr class="users-tr">
    <th class="users-th">Firstname</th>
    <th class="users-th">Lastname</th>
    <th class="users-th">Email</th>
    <th class="users-th">Address</th>  
    <th class="users-th">City</th>
    <th class="users-th">Postal Code</th>
    <th class="users-th">Country</th>
    <th class="users-th">Admin</th>

  </tr>
  <?php
        foreach ($users as $user)
        {?>
            <tr class="users-tr">
              <td class="users-td"><?php echo $user['firstName']?></td>
              <td class="users-td"><?php echo $user['lastName']?></td>
              <td class="users-td"><?php echo $user['email']?></td>
              <td class="users-td"><?php echo $user['address']?></td>
              <td class="users-td"><?php echo $user['city']?></td>
              <td class="users-td"><?php echo $user['postalCode']?></td>
              <td class="users-td"><?php echo $user['country']?></td>
              <td class="users-td"><?php echo $user['admin']==1 ?  'Admin' : 'User'?></td>

            </tr>
            <?php
        }
        ?>
</table>
<?php }