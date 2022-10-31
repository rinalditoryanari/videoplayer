@extends('layouts.app')

@section('title', 'Article')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Welcome, {{session('name')}}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                @foreach($videos as $video)
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{url('storage/'.$video->link_thumbnail)}}">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><a href="#">{{$video->category}}</a>
                                    <div class="bullet"></div> <a href="#">{{$video->created_at}}</a>
                                </div>
                                <div class="article-title">
                                    <h2><a href="{{route('playVideo',['id' => $video['id']])}}">{{$video->title}}</a></h2>
                                </div>
                                {{$video->description}}
                                <div class="article-user">
                                    <img alt="image"
                                        src="{{ asset('img/avatar/avatar-1.png') }}">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a href="#">{{$video->name}}</a>
                                        </div>
                                        <div class="text-job">Uploaded By</div>
                                    </div>
                                </div>
                            </div>                            
                        </article>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
