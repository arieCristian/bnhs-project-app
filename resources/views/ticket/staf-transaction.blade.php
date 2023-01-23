@extends('layouts.app')
@section('title','Ticket Transaction')
@push('style')
<link rel="stylesheet"href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}"/>
<livewire:styles/>
@endpush
@section('content')
<script src="{{ asset('assets/js/initTheme.js') }}"></script>
<div class="page-heading">
    <h3>Transaksi Tiket</h3>
  </div>
  <div class="page-content">
    <section class="row">
      @livewire('ticket.transaction-page')
    </section>
  </div>
@endsection

@push('script')
<livewire:scripts/>
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/page/ticket-transactions.js') }}"></script>
@endpush
