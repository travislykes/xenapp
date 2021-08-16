@extends('layouts.main')

@section('content')
    <div class="mnmd-block mnmd-block--fullwidth mnmd-contact">
        <div class="container">
            <div class="block-heading block-heading--center">
                <h4 class="block-heading__title">Update Article</h4>
            </div>
        </div>
        <div class="mnmd-block" style="margin-left: 40px; margin-right: 40px;">
            <div class="container">
                @php
                    if(empty($errors) === false){
                           echo '<p>' . implode('</p><p>', $errors) . '</p>';
                    }
                @endphp
                <form action="/update/{{$article['slug']}}" method="post" enctype="multipart/form-data">
                    <label for="name">Title:</label>
                    <input type="text" id="name" name="title" required value="{{ $article['title'] }}"><br><br>
                    <label for="body">Body:</label>
                    <textarea type="text" name="body" id="body" rows="10" cols="80">
                        {!! $article['body'] !!}
                    </textarea><br><br>
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image"><br><br>
                    <input type="hidden" value="{{$article['images']}}" readonly name="old_image">
                    <small>Do not add image if you do not want to replace current</small><br>
                    <button class="btn btn-primary" type="submit"  name="submit" value="submit">Update Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
       CKEDITOR.replace( 'body' );
    </script>
@endsection
