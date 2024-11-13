@extends('dashboard.layouts.app')

@section('title', 'WBTB')

@section('pageTitle', 'Edit WBTB')

@section('pageContent')
<li>
    <a href="{{ route('wbtb.index') }}" class="text-decoration-none">
        <span class="fw-semibold fs-14 heading-font dot ms-2">List WBTB</span>
    </a>
</li>
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Edit WBTB {{ $wbtb->nama_wbtb }}</span>
@endsection

@section('content')

@endsection