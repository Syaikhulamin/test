@extends('layout')
@section('body')
<div class="body">
    <table>
        @foreach ($data as $item)
            <tr>
                <td><p>Saya Murid nama saya : {{$item}}</p></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
