<div class="menu-right">
    <div class="logo_bg edge-shadow">

        @php $selectHomePage = \App\HomePageSelect::find(1) @endphp
        @if ($selectHomePage->selected_value==1)
            <a href="{{route('all-pizza')}}">
        @elseif($selectHomePage->selected_value==2)
            <a href="{{route('all-pasta')}}">
        @elseif($selectHomePage->selected_value==3)
            <a href="{{route('all-appetisers')}}">
        @elseif($selectHomePage->selected_value==4)
            <a href="{{route('all-deals')}}">
        @elseif($selectHomePage->selected_value==5) 
            <a href="{{route('all-drinks')}}"> 
        @endif
            <img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt="">
        </a>
    </div>
    <div class="profile-icon" style="width: 80px;">
        @if(Session::has('CustomerId'))
            <span style="float: right;">
                    <a href="{{route('track_order')}}">
                    <img src="{{asset('/')}}front/assets/imgs/user-01.png" width="24px" height="24px">
                </a>
                </span>
        @else
            <span style="float: right;">
                    <a href="{{route('login-customer')}}">
                    <img src="{{asset('/')}}front/assets/imgs/user-01.png" width="24px" height="24px">
                </a>
                </span>
        @endif
    </div>
</div>