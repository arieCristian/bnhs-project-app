@extends('layouts.app')
@section('title','dashboard')
@push('style')
{{-- <link
rel="shortcut icon"
href="assets/images/logo/favicon.svg"
type="image/x-icon"
/>
<link
rel="shortcut icon"
href="assets/images/logo/favicon.png"
type="image/png"
/> --}}
{{-- <link rel="stylesheet" href="assets/css/shared/iconly.css" /> --}}
<link rel="stylesheet"href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}"/>
<livewire:styles/>
@endpush
@section('content')
<script src="{{ asset('assets/js/initTheme.js') }}"></script>
<div class="page-heading">
    <h3>Ticket</h3>
  </div>
  <div class="page-content">
    <section class="row">
      @livewire('ticket.ticket-data')
    </section>
  </div>
@endsection

@push('script')
<livewire:scripts/>
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/page/ticket-data.js') }}"></script>
@endpush
