@extends('layouts.app')
@section('title','Loker Transaction')
@push('style')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('vendor/choices.js/public/assets/styles/choices.css') }}"/>
<livewire:styles />
@endpush
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Transaksi Bar & Restaurant</h1>
  </div>
          @livewire('bar.transaction-page')
</div>
@endsection

@push('script')
<livewire:scripts />
<script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('vendor/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('js/page/bar-transactions.js') }}"></script>
@endpush
