<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>baramous</title>

    @yield('styles')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/Capp.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Cstyle.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('/storage/img/favicon.png') }}">
    
</head>
<body>
    <div id="app">

      
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2 col-sm-4 col-4">

            <ul class="nav flex-column">
                
                <li class="nav-item">
                    <a class="nav-link {{request()->is('https://www.baramous.com/index')  ? 'active' : null }}" href="{{ URL::to('https://www.baramous.com/index') }}">الذهاب الى الموقع</a>
                </li>
                
                <li class="nav-item {{request()->is('admin/mangehagz')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.mangehagz') }}"  style="color:#FFF; border-top: 40px solid;">إدارة الحجز</a>
                </li>
                <li class="nav-item {{request()->is('admin/showhagz')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.showhagz') }}">قائمة المقبولين</a>
                </li>
                <li class="nav-item {{request()->is('admin/showhagztwo')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.showhagztwo') }}">قائمة المرفوضين</a>
                </li>
                <li class="nav-item {{request()->is('admin/homepage')  ? 'active' : null }}" style="color:#FFF; border-top: 40px solid;">
                    <a class="nav-link" href="{{ route('admin.homepage') }}">مقالة الصفحة الرئيسية</a>
                </li>
                <li class="nav-item {{request()->is('admin/aya')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.aya') }}">أية الصفحة الرئيسية</a>
                </li>
                <li class="nav-item {{request()->is('admin/alarm')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.alarm') }}">تنبيه الصفحة الرئيسية </a>
                </li>
                <li class="nav-item {{request()->is('admin/hsystem')  ? 'active' : null }}" style="color:#FFF; border-top: 40px solid;">
                    <a class="nav-link" href="{{ route('admin.hsystem') }}">نظام بيت الخلوة</a>
                </li>
                <li class="nav-item {{request()->is('admin/tablehgz')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.tablehgz') }}">جدول بيت الخلوة</a>
                </li>
                <li class="nav-item {{request()->is('admin/post')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.post') }}">قراءات مختارة</a>
                </li>
                <li class="nav-item {{request()->is('admin/users')  ? 'active' : null }}" style="color:#FFF; border-top: 40px solid;">
                    <a class="nav-link" href="{{ route('admin.users') }}"> جميع المستخدمين</a>
                </li>
                <li class="nav-item {{request()->is('admin/daterange')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.daterange') }}">البريد</a>
                </li>
                <li class="nav-item {{request()->is('admin/note')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.note') }}">اتصل بنا</a>
                </li>
                
                 <li class="nav-item {{request()->is('admin/allUserMas')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.allUserMas') }}"> رسائل لكل المستخدمين</a>
                </li>
                
                 <li class="nav-item {{request()->is('admin/dayof')  ? 'active' : null }}" style="color:#FFF; border-top: 40px solid;">
                    <a class="nav-link" href="{{ route('admin.dayof') }}">أيام الإغلاق</a>
                </li>
                
                <li class="nav-item {{request()->is('admin/downlooods')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.downlooods') }}" style="color:#FFF; border-top: 40px solid;">التحميلات</a>
                </li>


                <li class="nav-item {{request()->is('admin/pagestart')  ? 'active' : null }}" style="color:#FFF; border-top: 40px solid;">
                    <a class="nav-link" href="{{ route('admin.pagestart') }}"> صفحة البداية</a>
                </li>
                <li class="nav-item {{request()->is('admin/ayastart')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.ayastart') }}">اية البداية</a>
                </li>
                <li class="nav-item {{request()->is('admin/alarmstart')  ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.alarmstart') }}">تنبيه البداية</a>
                </li>
               
            </ul> 
            
            </div>
            <div class="col-lg-10 col-sm-8 col-8">
               @yield('content')
            </div>
          </div>
        </div>

        
        </div>
    </div>
    @yield('scripts')
</body>
</html>
