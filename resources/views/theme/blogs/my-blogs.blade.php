@extends('theme.master')

@section('page name', 'My Blogs')

@section('categories active', 'active')

@section('content')

  @include('theme.partials.hero', ['title' => 'My Blogs'])

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            @session('delete-status')
                <div class="alert alert-success">{{ session('delete-status') }}</div>
            @endsession
            <table class="table w-100">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($blogs))
                        @foreach ($blogs as $blog)
                        <tr>
                            <td><a href="{{ route('blogs.show', ['blog'=> $blog]) }}">{{$blog->name}}</a></td>
                            <td class="d-flex">
                                <a href="{{ route('blogs.edit', ['blog'=> $blog]) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <form action="{{ route('blogs.destroy', ['blog'=> $blog]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger mr-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-lg-12">
                {{ $blogs->render('pagination::bootstrap-5') }}
            </div>
          </div>
        </div>
      </div>
  </section>
  <!--================ End Blog Post Area =================-->
@endsection