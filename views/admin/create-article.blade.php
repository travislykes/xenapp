@extends('layouts.main')

@section('content')
    <div class="mnmd-block mnmd-block--fullwidth mnmd-contact">
        <div class="container">
            <div class="block-heading block-heading--center">
                <h4 class="block-heading__title">Create Article</h4>
            </div>
        </div>
        <div class="mnmd-block" style="margin-left: 40px; margin-right: 40px;">
            <div class="container">
                @php
                    if(empty($errors) === false){
                           echo '<p>' . implode('</p><p>', $errors) . '</p>';
                    }
                @endphp
                <form action="/register" method="post">
                    <label for="name">Title:</label>
                    <input type="text" id="name" name="title" required><br><br>
                    <label for="body">Body:</label>
                    <textarea type="text" name="body" id="body" rows="10" cols="80">
                    </textarea><br><br>
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image"><br><br>

                    <button class="btn btn-primary contactform-submit" type="submit"  name="submit" value="submit">Save Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
