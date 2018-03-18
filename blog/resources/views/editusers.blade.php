<html>
  <head>
    <title>Edit</title>
  </head>
  <body>
    @foreach ($users as $user)
    <form method="POST" action="/user/edit/<?php echo $users[0]->id; ?>">
      {{ csrf_field() }}
      <table>
        <tr>
          <td>Name</td>
          <td><input type='text' name='name' value='<?php echo $users[0]->name; ?>'></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type='text' name='email' value='<?php echo $users[0]->email; ?>'></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type='text' name='password' value='<?php echo $users[0]->password; ?>'</td>
          <td colspan='2'>
            <input type='submit' value='Update'>
        </tr>
      </table>
    </form>
    @endforeach
  </body>
</html>
