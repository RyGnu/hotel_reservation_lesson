@extends('layouts.app')
@section('content')

<p>あなたはどのホテル？</p>

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

@if (count($reservations))
    <div class="panel panel-default">
        <div class="panel-heading">
            予約中のホテル
        </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ホテル名</th>
                    <th>期日</th>
                    <th></th>
                </tr>    
            </thead>
        
            <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->id}}</td>
                <td>{{$reservation->name}}</td>
                <td>{{$reservation->start_date}} ~ {{$reservation->end_date}}</td>
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
            @endforeach
            </tbody>
         </table>
    </div>
@endif

@endsection