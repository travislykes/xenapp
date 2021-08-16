@extends('layouts.main')

@section('content')
    <div class="mnmd-block mnmd-block--fullwidth mnmd-contact">
        <div class="container">
            <div class="block-heading block-heading--center">
                <h4 class="block-heading__title">Login Page</h4>
            </div>
        </div>
        <div class="mnmd-block" style="margin-left: 40px; margin-right: 40px;">
            <div class="container">
                <form action="#">
                    <label for="email">Name:</label>
                    <input type="email" id="email" name="email" required><br><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br><br>

                    <button class="btn btn-primary contactform-submit" type="submit" id="contactform-submit" name="submit" value="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
