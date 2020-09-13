{{-- extend the main layout --}}
@extends('layouts.blogWrap')

{{-- get the category section in the layout --}}
@section('categorySlider')
<category-slider></category-slider>
@endsection
{{-- end of category section  --}}

{{-- get the main body content  --}}
@section('bodyContent')
<home-main></home-main>
@endsection
{{-- end of the main body contents --}}
{{-- end of the main layout --}}
