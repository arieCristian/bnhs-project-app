@extends('layouts.app')
@section('title','dashboard')
@push('style')
<link
rel="shortcut icon"
href="assets/images/logo/favicon.svg"
type="image/x-icon"
/>
<link
rel="shortcut icon"
href="assets/images/logo/favicon.png"
type="image/png"
/>

<link rel="stylesheet" href="assets/css/shared/iconly.css" />
@endpush
@section('content')
<script src="assets/js/initTheme.js"></script>
<div class="page-heading">
    <h3>Owner Dashboard</h3>
  </div>
  <div class="page-content">
    <section class="row">
     
    </section>
  </div>
@endsection

@push('script')
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.js"></script>
@endpush
