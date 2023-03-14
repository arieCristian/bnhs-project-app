@extends('layouts.app')
@section('title','Data Loker')
@push('style')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}"/>
<livewire:styles />
@endpush
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Loker</h1>
  </div>
          @livewire('locker.locker-data')
</div>
@endsection

@push('script')
<livewire:scripts />
<script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/page/locker-data.js') }}"></script>
@endpush

