@extends('layouts.front')
@section('css')
<style>
.about-us-section {
    padding: 250px 120px;
}
.section-title {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 10px;
}
.section-subtitle {
    font-size: 18px;
    color: #777;
    margin-bottom: 30px;
}
.about-icon {
    font-size: 50px;
    color: #007bff;
    margin-bottom: 10px;
}
.text-center {
    text-align: center;
}
.rounded {
    border-radius: 10px;
}
.mt-5 {
    margin-top: 50px;
}
</style>
@endsection

@section('content')
<div class="about-us-section">
    <div class="container">
        
        <div class="row">
          
            @php
                $about = App\Models\Page::where('type',1)->first();
            @endphp
            <div class="col-md-6">
                <h2>{{ $about->title}}</h2>
                <p>
                    {!! $about->content !!}
                </p>
               
            </div>
        </div>
      
    </div>
</div>
@endsection


