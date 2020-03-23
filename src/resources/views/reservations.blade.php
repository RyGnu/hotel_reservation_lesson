@extends('layouts.app')
@section('content')

<p>選択中のホテル:{{$name}}</p>

<form action="/hotels" method="POST">
  @csrf
  <input type="hidden" name="name" value="{{$name}}">
  <p>
    <label for="start_date">宿泊開始日</label>
    <input type="date" name="start_date" id="start_date" 
     value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>">
  </p>
  <p>
    <label for="end_date">宿泊終了日</label>
    <input type="date" name="end_date" id="end_date"
     value="<?php echo date("Y-m-d",strtotime('+1 day')) ?>" min="<?php echo date("Y-m-d",strtotime('+1 day')) ?>">
  </p>
    <input type="submit" value="予約決定">
  </form>

@endsection
