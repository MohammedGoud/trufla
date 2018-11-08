<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trufla Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>{{$page_title}}</h2>
  <div class="row">
      <div class="col-md-4 col-sm-12">
      <?php $selectedCat = request('category_id', -1) ?>
       <select class="form-control" name="category" id="" onchange='location="movies?category_id="+this.value'>
       <option value="0"> Filter By Category </option>
         @foreach($categories as $cat)
         <option value="{{$cat->category_id}}" {{ $selectedCat == $cat->category_id ? 'selected' : '' }}> {{$cat->category_name}} </option>
         @endforeach
       </select>
      </div>
      <div class="col-md-4 col-sm-12">
      <select class="form-control" name="popular" id="" onchange='location="movies?popular="+this.value'>
       <option value="0"> Sort By Popular </option>
         
         <option value="asc"  {{request('popular') == 'asc'?'selected':''}} > ASC </option>
         <option value="desc" {{request('popular') == 'desc'?'selected':''}}> DESC </option>
       </select>
      </div>
      <div class="col-md-4 col-sm-12">
      <select class="form-control" name="popular" id="" onchange='location="movies?rated="+this.value'>
       <option value="0"> Sort By Rated </option>
         
         <option value="asc"  {{request('rated') == 'asc'?'selected':''}}> ASC </option>
         <option value="desc" {{request('rated') == 'desc'?'selected':''}}> DESC </option>
       </select>
      </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Movie #</th>
        <th>Name</th>
        <th>Status</th>
        <th>Popularity</th>
        <th>Voting</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
    @foreach($movies as $movie)
      <tr>
        <td>{{$movie->movie_id}}</td>
        <td>{{$movie->title}}</td>
        <td>{{$movie->status}}</td>
        <td>{{$movie->popularity}}</td>
        <td>{{$movie->vote_count}}</td>
        <td>{{$movie->getcategory['category_name']}}</td>
      </tr>
    @endforeach  
     