<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    img{
        cursor: pointer;
    }
    .buttons{
        background-size: 21px;
        background-position: 40% 50%;     
        background-color: red;
        border-radius: 50%;
        padding: 20px;
    }
</style>
<body>
    <div class="container">
        <h1 class="pt-4">User ID : <span class="font-weight-normal">
            @if($selectedUser->user_role === 1)
            <title>Employer ID</title>
            EPLR-{{ $selectedUser->user_id }}
            @else
            ADM-0{{ $selectedUser->user_id }}
            <title>Barangay ID</title>
            @endif
        </span></h1>
        <h1>Employer Name : <span class="font-weight-normal">{{ $selectedUser->name }}</span></h1><br>
        
        <div id="demo" class="carousel slide" data-ride="carousel" style="width: 1000px; height: 600px; margin: auto; border-radius: 5px; border-style: solid">
          <!-- Indicators -->
            <ul class="carousel-indicators">
              @foreach($selectedUser->ID as $file)
                @if($loop->index == 0)
                <li data-target="#demo" data-slide-to="0" class="bg-danger active"></li>
                @else
                <li data-target="#demo" data-slide-to="{{$loop->index}}" class="bg-danger"></li>
                @endif
                @endforeach
            </ul>
          <!-- The slideshow -->
            <div class="carousel-inner">
                @foreach($selectedUser->ID as $file)
                  @if($loop->index == 0)
                      <div class="carousel-item active">
                          <img src="{{ asset('id/'. $file->file_name) }}" class="p-5 img-corousel" width="1000" height="600">
                      </div>
                      @else
                      <div class="carousel-item">
                          <img src="{{ asset('id/'. $file->file_name) }}" class="p-5 img-corousel" width="1000" height="600">
                      </div>
                  @endif
                @endforeach
            </div>
          
          <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class=" buttons carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span style="background-position: 60% 50%; "class="buttons carousel-control-next-icon"></span>
            </a>
        </div>
        
    </div>
    
    
</body>
<script>
    $(document).ready( function() {
        $(".img-corousel").click( function() {
            this.requestFullscreen();
        });
   });
  
</script>
</html>
