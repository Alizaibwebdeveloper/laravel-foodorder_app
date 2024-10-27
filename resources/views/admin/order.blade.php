<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style>
        table {
            border: 1px solid skyblue;
            margin: auto;
            width: 1000px;
        }
        th {
            color: white;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            background-color: red;
            padding: 10px;
        }
        td {
            color: white;
            text-align: center;
            padding: 10px;
        }
        /* Added styling to handle the overflow */
        .table-container {
            overflow-x: auto;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <!-- Wrap the table in a div to control horizontal scroll -->
          <div class="table-container">
            <table>
              <tr>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Food Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
              </tr>
              @foreach ($data as $data)
              <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->price}}</td>
                <td>
                  <img width="150" src="/food_img/{{$data->image}}" alt=""> 
                </td>
                <td>{{$data->delivery_status}}</td>
                <td>
                  <a href="{{url('on_the_way',$data->id)}}" class="btn btn-info">On the Way</a>
                  <a href="{{url('delivered',$data->id)}}" class="btn btn-warning">Delivered</a>
                  <a href="{{url('canceled',$data->id)}}" class="btn btn-danger">Cancel</a>
                </td>
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
