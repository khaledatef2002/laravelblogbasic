@extends('theme.master')

@section('page name', 'Add New Blog')

@section('content')

@include('theme.partials.hero', ['title' => 'Add New Blog'])

<!-- ================ register section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
        <div class="col-12">
            @session('blog-status')
                <div class="alert alert-success">{{ session('blog-status') }}</div>
            @endsession
            <form action="{{ route('blogs.store') }}" class="form-contact" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input value="{{old('name')}}" class="form-control border" name="name" id="name" type="text" placeholder="Enter blog name">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control border" name="image" id="image" type="file">
                        </div>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <select class="form-control border" name="category_id" id="category_id">
                                <option value="" DISABLED selected>--Choose Category</option>
                                @if (count($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="w-100 border" name="description" id="description" row="10">{{ old('description') }}</textarea>
                        </div>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-contactForm">Create</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
<!-- ================ register section end ================= -->

@endsection