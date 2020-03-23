@extends('layouts.app')
@section('content')


あなたはどのホテル？

<form action="/hotels/resevartion" name="name" method="post" >
  @csrf
    <select name="name" required>
        <option value="">選択してください</option>
        <option value="hotelA">hotelA</option>
        <option value="hotelB">hotelB</option>   
        <option value="hotelC">hotelC</option>
        <option value="hotelD">hotelD</option>
        <option value="hotelE">hotelE</option>
    </select>
    <button type="submit">決定</button>
</form>


    @foreach($reservations as $reservation)
        <table>
             <tr>
                <td>{{$reservation->id}}</td>
                <td>{{$reservation->name}}</td>
                <td>{{$reservation->start_date}}</td>
                <td>{{$reservation->end_date}}</td>
                <td>
                    <form action="{{ url('hotels/' . $reservation->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i> 削除
                    </button>
                    </form>
                </td>
            </tr>
        </table>
    @endforeach

@endsection