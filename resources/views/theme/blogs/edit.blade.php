@extends('theme.master')

@section('page name', $blog->name)

@section('content')

@include('theme.partials.hero', ['title' => $blog->name])

<!-- ================ register section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
        <div class="col-12">
            @session('blog-status')
                <div class="alert alert-success">{{ session('blog-status') }}</div>
            @endsession
            <form action="{{ route('blogs.update', ['blog'=> $blog]) }}" class="form-contact" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input value="{{$blog->name}}" class="form-control border" name="name" id="name" type="text" placeholder="Enter blog name">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control border" name="image" id="image" type="file" value="{{$blog->image}}">
                        </div>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <select class="form-control border" name="category_id" id="category_id">
                                <option value="" DISABLED selected>--Choose Category</option>
                                @if (count($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected( $category->id == $blog->category_id)>{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="w-100 border" name="description" id="description" row="10">{{ $blog->description }}</textarea>
                        </div>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-contactForm">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
<!-- ================ register section end ================= -->

@endsection