<?php
$title = 'Tablet ' . $table->id;
?>

@extends('layouts.tablet')
@section('title', $title)


@section('content')

<div id="app">

    @php
        $jsonData =json_encode($table);
    @endphp

    <table-sale :table="{{ $jsonData }}"></table-sale>
</div>
@endsection
