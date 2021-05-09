<div>
    @if ($roles->count())
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{ $role->name }}</th>
                    <td>
                        <button type="button" class="btn btn-primary">Members</button>
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-primary">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-center">No Roles have been created yet.</p>
    @endif
</div>