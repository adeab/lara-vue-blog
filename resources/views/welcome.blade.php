{{-- extend the main layout --}}
@extends('layouts.blogWrap')

{{-- get the category section in the layout --}}
@section('categorySlider')
@include('includes.frontEnd.categorySlider')
@endsection
{{-- end of category section  --}}

{{-- get the main body content  --}}
@section('bodyContent')
@include('includes.frontEnd.featuredSlider')
@include('includes.frontEnd.allBlogs')
@endsection
{{-- end of the main body contents --}}
{{-- end of the main layout --}}
