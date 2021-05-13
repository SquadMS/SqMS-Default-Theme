<tr>
    <th scope="row">{{ $role->name }}</th>
    <td>
        <livewire:sqms-default-theme.admin.rbac.members-role :role="$role"></livewire:sqms-default-theme.admin.rbac.members-role/>
        <livewire:sqms-default-theme.admin.rbac.edit-role :role="$role"></livewire:sqms-default-theme.admin.admin.rbac.edit-role/>
        <livewire:sqms-default-theme.admin.rbac.delete-role :role="$role"></livewire:sqms-default-theme.admin.admin.rbac.delete-role/>
    </td>
</tr>