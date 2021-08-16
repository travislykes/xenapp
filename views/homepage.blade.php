@extends('layouts.main')

@section('content')
    <div class="mnmd-block  mnmd-block--fullwidth mnmd-post--grid-b">
        <div class="container">
            <div class="block-heading">
                <h4 class="block-heading__title">Aritlces</h4>
            </div>
            <div class="mnmd-block__inner">
                <div class="post-list">
                    @forelse($articles as $article)
                        <div class="list-item col-md-4">
                            <article class="post post--vertical post--vertical-3i-large post__thumb-480">
                                <div class="post__thumb atbs-thumb-object-fit">
                                    <a href="/{{$article['slug']}}">
                                        @if(empty($article['images']))
                                        <img src="http://via.placeholder.com/450x400" alt="File not found">
                                        @else
                                            <img src="/images/{{$article['images']}}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="post__text">
                                    <a href="#" class="post__cat">Category</a>
                                    <h3 class="post__title typescale-2_5"><a href="/{{$article['slug']}}">{{ $article['title'] }}</a></h3>
                                    <div class="post__excerpt">{!!substr($article['body'], 0, 50) !!}..
                                    </div>
                                    @if(!empty($_SESSION['id']) && $article['user_id'] == $_SESSION['id'])
                                    <a class="button" href="#">Edit</a>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="block-heading">
                            <h4 class="block-heading__title">No Aritlces Created</h4>
                        </div>
                    @endforelse
                </div>
            </div>

            <nav class="mnmd-pagination pagination-circle">
                <div class="mnmd-pagination__links text-right">
                    <!--                                <a class="mnmd-pagination__item mnmd-pagination__item-prev" href="#"><i class="mdicon mdicon-arrow_back"></i> PREVIOUS</a>-->
                    <a class="mnmd-pagination__item" href="#">1</a>
                    <a class="mnmd-pagination__item" href="#">2</a>
                    <a class="mnmd-pagination__item" href="#">3</a>
                    <a class="mnmd-pagination__item mnmd-pagination__item-next" href="#">NEXT <i
                                class="mdicon mdicon-arrow_forward"></i></a>
                </div>
            </nav>
        </div>
    </div>
@endsection


