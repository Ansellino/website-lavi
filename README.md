# Ini untuk membuat super admin

```bash
use App\Models\User;
use Spatie\Permission\Models\Role; // Correct class name

$user = User::find(2); // Replace 1 with the ID of your super admin user
$role = Role::findOrCreate('super_admin'); // Corrected line: Use Role, not role
$user->assignRole($role); // Assign the role to the user
$user->save();
exit;
```
