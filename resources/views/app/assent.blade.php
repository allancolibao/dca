<div class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12">                   
                <div class="card-header py-3 d-flex flex-row align-items-center ">
                    <h6 class="m-0 font-weight-bold text-gray-800">Assent Form</h6>
                    <div style="position:absolute; right:0; top:0;" class="pt-2 pr-3">
                        <ul id="pagin"><span class="mr-2">Translate</span></ul>        
                    </div>
                </div>
                <div class="line-content">
                    <img src="{{ asset("/img/assent/en/en_01.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/en/en_02.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/en/en_03.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/en/en_04.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/en/en_05.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/en/en_06.jpg")}}" alt="" class="my-3" style="width:100%;">
                </div>
                <div class="line-content">
                    <img src="{{ asset("/img/assent/fn/fn_01.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/fn/fn_02.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/fn/fn_03.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/fn/fn_04.jpg")}}" alt="" class="my-3" style="width:100%;">
                    <img src="{{ asset("/img/assent/fn/fn_05.jpg")}}" alt="" class="my-3" style="width:100%;">
                </div>
                <button type="button" onclick="toggleStatusAssent()" data-dismiss="modal" aria-label="Close" class="btn btn-primary mt-4">Agree to take part in this research</button>
            </div>
        </div>
    </div>             
</div>
<script type="text/javascript" src="{{ asset('js/pagination.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/assent.js') }}"></script>