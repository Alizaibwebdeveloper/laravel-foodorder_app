<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        table{
            border: 1px solid skyblue;
            margin: auto;
            width: 800px;

        }
        th{
            background: skyblue;
            color: white;
            padding: 10px;
            margin: 10px;
        }
        td{
            color: white;
            padding: 10px;
        }
    </style>
  </head>
  <body>
   
    @include('admin.header')

    @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Food title</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>

                    @foreach ($data as $data)
                        
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->details}}</td>
                        <td>{{$data->price}}</td>
                        <td>
                            <img src="food_img/{{$data->image}}" width="150" alt="">
                        </td>
                        <td><a href="{{url('delete_food', $data->id)}}" class="btn btn-danger" onclick="return confirm('Are you  sure to delete this.')">Delete</a></td>

                        <td><a href="{{url('update_food', $data->id)}}" class="btn btn-warning" >Update</a></td>

                    </tr>

                    @endforeach

                </table>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>