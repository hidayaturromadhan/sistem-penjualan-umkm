@extends('layouts.kasir.main')
@section('title', 'Kasir Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('kasir.dashboard') }}" style="color: #1A5F3C;">Dashboard</a>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
