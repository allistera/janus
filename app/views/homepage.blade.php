@extends('master')

@section('title')
Homepage
@endsection

@section('content')

<div class="row">
    <center>
        <img src="/img/homepage/screenshot.png">
        <h1>Diet Plans Made Simple.</h1>
        <div class="clearfix"><br/></div>
        <a href="/user/register" class="createButton signupBtn">Sign Up</a>
    </center>
</div>

<div class="row homepageRow">
    <div class="columns">
        <div class="row">
            <div class="small-3 columns">
                <a href="/img/homepage/items_large.png" class="fancybox th radius"><img src="/img/homepage/items.png"></a>
            </div>
            <div class="small-9 columns">
                <h3 class="subheader">Create your own items</h3>
                <p>
                    Your Diet Planner doesn't contain a large database of food items; rather you create your own custom items filling in it's nutritional information: weight, calories, protein, carbs and fat content. You can then use them on any diet plans you create, this gives complete custom control over the plans you create.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row homepageRow">
    <div class="twelve columns">
        <div class="row">
            <div class="small-9 columns">
                <h3 class="subheader">Set your own goals</h3>
                <p>
                    Set your personal nutritional goals so you can easily see if you have matched your targets when creating new diet plans.
                </p>
            </div>
            <div class="small-3 columns">
                <a href="/img/homepage/goals_large.png" class="fancybox th radius"><img src="/img/homepage/goals.png"></a>
            </div>
        </div>
    </div>
</div>

<div class="row homepageRow">
    <div class="twelve columns">
        <div class="row">
            <div class="small-3 columns">
                <a href="/img/homepage/pdf_large.png" class="fancybox th radius"><img src="/img/homepage/pdf.png"></a>
            </div>
            <div class="small-9 columns">
                <h3 class="subheader">Share to the world</h3>
                <p>
                    Want to print off your daily plans? Or share with your friends? Your Diet Planner allows you to easily export generated plans to PDF format as well as generating valid Reddit markdown or BBCode for forums.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row homepageRow">
    <div class="twelve columns">
        <center>
            <h3 class="subheader">Problems? </h3>
            <p>
                If you encounter any issues with Your Diet Planner or just want to provide feedback feel free to get in touch. Just click the Contact button at the bottom right of any page or <a href="http://www.allisterantosik.com/contact" target="_blank">click here</a>.
            </p>
        </center>
    </div>
</div>

@endsection
