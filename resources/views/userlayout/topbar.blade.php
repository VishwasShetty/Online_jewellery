<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>#nav {
                background-color: #222;
                
                position: relative;
                width: 100%;
                top: 0px;
              }
              #nav-wrapper {
                /* width: 90%; */
                margin-left:600px;
                text-align: left;
              }
              #nav ul {
                list-style-type: none;
                padding: 0px;
                margin: 0px;
              }
              #nav ul li {
                display: inline-block;
              }
              #nav ul li:hover {
                background-color: #333;
              }
              #nav ul li a,
              visited {
                display: block;
                padding: 10px;
                color: #CCC;
                text-decoration: none;
              }
              #search-bar {
    width: 20em;
}

.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 5px;
  margin-top: 0%;
  font-size: 16px;
  border: none;
height:2.7em;
  float:left;
  
}

.dropdown {
  position: absolute;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position:absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 16px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;

}

.dropdown:hover .dropdown-content {display: block;
  
}

.dropdown:hover .dropbtn {background-color: #3e8e41;

}
#logo
{
    font-style: normal;
    color:gold;
}
</style>
            
</head>
<body>
<form  action="{{route('search')}}" method="GET" enctype="multipart/form-data">
        <div id="nav">
                
                      <div class="dropdown">
                          <button class="dropbtn">{{{_('jwellary shop')}}}</button>
                          <div class="dropdown-content">
                              @if (Route::has('login'))
                              @auth
                            <a href="{{route('mybookings')}}">My Bookings</a>
                            <a href="{{route('myprofile')}}">My Profile</a>
                            <a href="{{route('mywishlist')}}">My Wishlist</a>
                            <a href="{{route('mycart')}}">My Cart</a>
                            <a href="{{route('logout')}} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout</a>
                            <form id='logout-form' action=" {{route('logout')}} " method="POST" style="display: none;">
                            {{ csrf_field() }}</form>
                            @else
                            <a href="{{route('login')}}">My Bookings</a>
                            <a href="{{route('login')}}">My Profile</a>
                            <a href="{{route('login')}}">My Wishlist</a>
                            <a href="{{route('login')}}">My Cart</a>
                            <a href="{{route('login')}}">
                                Login</a>
                    @endauth
                    @endif
                          </div>
                        </div>

                <div id="nav-wrapper">
                  
                  <ul>
                        <li>
                               
                                <select id="type" name="type"  style="width:320px;" >
                                    <option value="" selected>Select Category</option>
                                  <option value="Earrings">Earrings</option>
                                  <option value="Necklace">Necklace</option>
                                  <option value="Pendent">Pendent</option>
                                  <option value="Bangle">Bangle</option>
                                  <option value="Bracelet">Bracelet</option>
                                  <option value="Cuff links">Cuff links</option>
                                  <option value="Ring">Ring</option>
                                  <option value="Anklet">Anklet</option>
                                </select>
                                </li>
                                <li>
                                <input id="search-button" name="search_submit" type="submit" value="Search!">
                                </li>
                                @if (Route::has('login'))
                                @auth
                              <li><a href="{{route('/')}}">Home</a>
                                </li>
                              <li> <a href="{{route('logout')}} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  Logout</a>
                              <form id='logout-form' action=" {{route('logout')}} " method="POST" style="display: none;">
                              {{ csrf_field() }}</form>
                                </li>
                              <li><a href="{{route('myprofile')}}">{!!Session::get('username')!!}</a>
                                </li>
                                <li><a href="{{route('contactus')}}">Contact Us</a>
                                </li>
                    @else
                    <li><a href="{{route('/')}}">Home</a>
                    </li>
                  <li><a href="{{route('login')}}">Login</a>
                    </li>
                   {{-- <li><a href="{{route('register')}}">Register</a>
                    </li> --}}
                  <li><a href="{{route('contactus')}}">Contact Us</a>
                    </li>
                    @endauth
                    @endif
                  </ul>
                </div>
                </div>  
              </form>  
</body>
</html>


