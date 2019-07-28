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
            <td style="width: 20%;">{{ $user->name }}</td>
            <td style="width: 40%;">{{ $user->email }}</td>
            <td style="width: 20%;">{{ $user->mobile }}</td>
            <td style="width: 30%;">{{ $user->birth_date ? App\Helper\Helper::dateFormat($user->birth_date) : 'N/A' }}</td>
            <td style="width: 18%;">{{ $user->anniversary_date ? App\Helper\Helper::dateFormat($user->anniversary_date) : 'N/A' }}</td>
            <td style="width: 18%;">
                @if($user->member_ship_code)
                    {{ $user->member_ship_code }}
                @else
                    -
                @endif
            </td>
            <td style="width: 18%;">{{ App\Helper\Helper::dateFormat($user->created_at) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>