@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12">                   
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center ">
                        <a href="{{ url()->previous() }}" class="mr-3">
                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                <i class="fas fa-arrow-left"></i>   
                            </button>
                        </a>
                        <h6 class="m-0 font-weight-bold text-gray-800">Cycle Menu</h6>
                        <a href="{{ asset("/pdf/cycle_menu.pdf")}}" class="nav-link text-primary" download="four_week_cycle_menu">
                            <button type="button" class="d-sm-inline-block btn btn-sm  btn-danger shadow-sm mr-4 mt-3" style="position:absolute;top:0;right:0;">
                                <i class="fas fa-file-pdf"></i> Download
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset("/img/menu/page_1.jpg")}}" alt="" style="width:100%;">
                        <img src="{{ asset("/img/menu/page_2.jpg")}}" alt="" style="width:100%;">
                        <img src="{{ asset("/img/menu/page_3.jpg")}}" alt="" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>             
</div>
@endsection