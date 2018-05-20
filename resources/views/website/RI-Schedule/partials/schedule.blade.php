@forelse($routines as $key => $routine)
    <tr style="{{ ($routine->color != '') ? 'background-color:#eafaf1;' : '' }}">       
        <td>{{ $routine->age }}</td>
        <td>{{ $routine->vaccine }} </td>
        <td>{{ $routine->disease }}</td>
        <td>{{ $routine->date }}</td>
    <tr>
@empty

@endforelse