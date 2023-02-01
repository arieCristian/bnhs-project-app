@extends('layouts.app')
@section('title','Pembatalan Transaksi Tiket')
@push('style')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}"/>
<livewire:styles />
@endpush
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Pembatalan Transaksi Tiket</h1>
  </div>
  @livewire('ticket.transaction-cencelled')
</div>
@endsection

@push('script')
<livewire:scripts />
<script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/page/ticket-transactions-cencelled.js') }}"></script>
@endpush


