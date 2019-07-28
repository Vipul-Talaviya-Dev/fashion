<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Birth Date</th>
        <th>Anniversary Date</th>
        <th>Member Ship Code</th>
        <th>Create Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->mobile }}</td>
            <td>{{ $user->birth_date ? App\Helper\Helper::dateFormat($user->birth_date) : 'N/A' }}</td>
            <td>{{ $user->anniversary_date ? App\Helper\Helper::dateFormat($user->anniversary_date) : 'N/A' }}</td>
            <td>
                @if($user->member_ship_code)
                    {{ $user->member_ship_code }}
                @else
                    -
                @endif
            </td>
            <td>{{ App\Helper\Helper::dateFormat($user->created_at) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>