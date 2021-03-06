@extends('layouts.admin')

@section('script')
<script>
    $(document).ready(function(){
        $("#attributes").change(function(){
            if($(this).val() == 'add'){
                $("#newattributeDiv").slideDown();
            } else {
                $("#newattributeDiv").slideUp();
            }
        })
        $("#attributes").change(function(){
            if($(this).val() == 'Department'){
                $("#officecategoryDiv").slideDown();
            } else {
                $("#officecategoryDiv").slideUp();
            }
        })
    })
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
<h1>Insert Site static data</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="/laravelEMS/public/sitedata" accept-charset="UTF-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Site Category</label>
                    <select id="attributes" class="form-control" name="attribute" >
                        <option value="">Select Category</option>
                        @foreach ($attributes as $attribute)
                            <option>{{$attribute->attribute}}</option>
                        @endforeach
                        <option value="add">Add New</option>
                    </select>
                </div>
                <div class="form-group" style='display:none' id="newattributeDiv">
                    <label for="exampleInputEmail1">Site Category name</label>
                    <input type="text" name="newattribute" class="form-control" id="newattribute" placeholder="Enter Site category name">
                </div>
                 <div class="form-group" style='display:none' id="officecategoryDiv">
                    <label for="exampleInputEmail1">Office Category name</label>
                    <select id="officecategory" class="form-control" name="officecategory" >
                        <option value="">Select Office Category</option>
                        @foreach ($offCats as $offCat)
                            <option value="{{ $offCat->id }}">{{$offCat->value}}</option>
                        @endforeach
                        
                    </select>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Site category value">
                    @csrf
                </div>
                <div class="form-group">
                    <label for="exampleInputNamet">NameT</label>
                    <input type="text" name="namet" class="form-control" id="exampleInputNamet" aria-describedby="emailHelp" placeholder="Enter Site category value in Tibetan">
                    
                </div>
                <input type="hidden" name="entity" value="sitedata" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
