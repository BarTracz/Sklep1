@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    @if(session('message'))
                    <h2 class="alert alert-succes">{{ session('message')}}</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>