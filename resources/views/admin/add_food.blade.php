<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')


    <style>

        label{
            display: inline-block;
            width:200px;
            color: white !important;
        }
        .div_design{
            padding: 
        }
    </style>
  </head>
  <body>
   
    @include('admin.header')

    @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form action="{{url('upload_food')}}" method="POST" enctype="multipart/form-data" >

                @csrf

                <div class="div_design">
                    <label for="">Food Title</label>
                    <input type="text" name="title">
                </div>

                
                <div class="div_design">
                    <label for="">Food details</label>
                    <textarea name="details" cols="50" rows="10"></textarea>
                </div>


                
                <div class="div_design">
                    <label for="">Price</label>
                    <input type="text" name="price">
                </div>


        
                <div class="div_design">
                    <label for="">Image</label>
                    <input type="file" name="img">
                </div>


                <div class="div_design">
                    <input type="submit" class="btn  btn-warning" value="Add Food">
                </div>

            </form>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>