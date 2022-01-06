@php 
$category=DB::table('sports')->orderBy('id','ASC')->limit(8)->get();
@endphp
<ul class="sidebar navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="{{route('home')}}">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>

            <li class="nav-item">
               @foreach($category as $item)
               <a class="nav-link" href="{{URL::to('catpost/'.$item->id.'/'.$item->sports_category_title)}}">
               <span>{{$item->sports_category_title}}</span>
               </a>
               @endforeach()
            </li>
         </ul>